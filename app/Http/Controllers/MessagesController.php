<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class MessagesController extends Controller
{
   public function store(Request $request)
    {
        $conversation = new MessageComment;
        $conversation->user_id = auth()->user()->id;

        $uniqueTimestamp = time();

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '-' . $video->getClientOriginalName();       
            $video->move(public_path('videos'), $videoName);      
            $conversation->video = 'videos/' . $videoName;  
        }

        $imagePaths = [];  
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            
           
            foreach ($images as $image) {
                
              $imageName = time() . '-' . $image->getClientOriginalName();       
                $image->move(public_path('images'), $imageName);      
                $imagePaths[] = 'images/' . $imageName;  
           }
        }
        if (!empty($imagePaths)) {     
            $imageString = implode(',', $imagePaths);
            $conversation->image = $imageString;       
            $conversation->message = '';
        } else {
            
            $conversation->message = $request->message ?? 'No message';
        }
       $conversation->message_id = $request->message_id;
       $conversation->uniquetimestamp = $uniqueTimestamp;
    
       $conversation->save();
       return response()->json($conversation);
    }
  
  public function show($user)
    {
        $auth_user = auth()->user()->id;

         
        if(Message::where(['sender_id'=> $auth_user, 'receiver_id'=> $user])->first()){
            $message_info = Message::where(['sender_id'=> $auth_user, 'receiver_id'=> $user])->first();
        }else if(Message::where(['sender_id'=> $user, 'receiver_id'=> $auth_user])->first()){

            $message_info = Message::where(['sender_id'=> $user, 'receiver_id'=> $auth_user])->first();
        }
        else {
            $message_info = Message::create(
                [
                'sender_id' => auth()->user()->id,
                'receiver_id' => $user
                ]
            );
        }

        $user_messages = User::where('id', '!=', auth()->id())
         
        ->with('lastMessageComments')
       ->get();
        
        $user = User::where('id', $user)->first();
        
        

        $conversations =  MessageComment::where(['message_id'=> $message_info->id])->get();
       return view('messages', compact('user_messages', 'conversations', 'message_info','user'));

    }
 

public function getConversations(Request $request)
{
    $updatedTimestamp = time();
    $messageId = $request->input('id');  
    $lastCheckedUniqueTimestamp = $request->input('lastCheckedUniqueTimestamp');

    if (!is_numeric($lastCheckedUniqueTimestamp)) {
        return response()->json(['error' => 'Invalid timestamp'], 400);
    }

    
    MessageComment::where('message_id', $messageId)
        ->where('user_id', '!=', auth()->id())
        ->where('seen_status', 0)
        ->update(['seen_status' => 1, 'updatedTimestamp' => $updatedTimestamp]);

    
    $conversations = MessageComment::with('user')
        ->where('message_id', $messageId)
        ->where('uniquetimestamp', '>', $lastCheckedUniqueTimestamp)
        ->get();

    
    $updatedConversations = MessageComment::with('user')
        ->where('message_id', $messageId)
        ->where('updatedtimestamp', '>', $lastCheckedUniqueTimestamp)
        ->get();
        
    return response()->json(['conversations' => $conversations, 'updatedConversations' => $updatedConversations]);
}
 
public function delete($id)
{
    $message = MessageComment::find($id);
    $updatedTimestamp = time();
    
    if ($message) {
        $deletedMessageId = $message->id;  
       
        $message->updatedtimestamp = $updatedTimestamp;
        $message->status = 'deleted';
        $message->message = '<i>This message has been deleted</i>';

        $message->image = null;
        $message->video = null;
        $message->save();

        return response()->json([
            'success' => true, 
            'deletedMessageId' => $deletedMessageId,
            
        ]);  
    } else {
        return response()->json(['success' => false, 'error' => 'Message not found'], 404);
    }
}

   public function openNewPage()
{
    
    \Log::info('New page request received');

     
    return response()->json(['message' => 'New page opened successfully']);
}


public function updateProfile(Request $request){
    $user = User::where('id', auth()->user()->id)->first();
    $user->name = $request->input('name');
   
    
     
    if ($request->has('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;  
    }

    $user->save();
    return redirect()->back();

}

public function loadChat(Request $request, $userId)
{
    
    $messageInfo = Message::where(function ($query) use ($userId) {
        $query->where('sender_id', auth()->user()->id)
            ->where('receiver_id', $userId);
    })->orWhere(function ($query) use ($userId) {
        $query->where('sender_id', $userId)
            ->where('receiver_id', auth()->user()->id);
    })->first();

    if (!$messageInfo) {
        return response()->json(['message' => 'No conversation found.']);
    }

    $conversations = MessageComment::where('message_id', $messageInfo->id)
        ->whereIn('user_id', [auth()->user()->id, $userId])
        ->orderBy('created_at', 'asc') 
        ->get();

    return response()->json(['conversations' => $conversations,]);
}

/*public function update(Request $request)
{
    $user = auth()->user();
    $typing = filter_var($request->input('typing'), FILTER_VALIDATE_BOOLEAN);  
    $user->typing_status = $typing;
    $user->save();

    return response()->json([
        'success' => true,
        'user_id' => $user->id
    ]);
}

public function checkTypingStatus(Request $request)
{
    $chatUserId = $request->query('chat_user_id');
    $chatUser = User::find($chatUserId);

    return response()->json([
        'typing' => $chatUser->typing_status,
        'user_id' => $chatUserId
    ]);
}*/

public function updateLastSeen(Request $request)
{
    $user = Auth::user();
    if ($user) {
        $user->last_seen = now();
        $user->save();

        return response()->json(['success' => true, 'message' => 'Last seen updated successfully']);
    }

    return response()->json(['success' => false, 'message' => 'User not authenticated'], 401);
}

public function checkLastSeen(Request $request)
{
    $userId = $request->input('user_id');
    $user = User::find($userId);
    if ($user && $user->last_seen) {
        return response()->json(['success' => true, 'last_seen' => $user->last_seen]);
    }
    return response()->json(['success' => false, 'message' => 'Last seen not available']);
}

public function updateBackgroundImage(Request $request, $user_id)
{
    $user = User::find($user_id);

    if ($user) {
       
        if ($request->hasFile('background_image')) {
            $backgroundImage = $request->file('background_image');
            $backgroundImageName = time() . '-' . $backgroundImage->getClientOriginalName();
            $backgroundImage->move(public_path('images'), $backgroundImageName);

            
            $user->background_image = $backgroundImageName;
            $user->save(); 

            return response()->json(['success' => true, 'message' => 'Background image updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'No background image uploaded']);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'User not found']);
    }
}
public function update(Request $request, $id)
{
    $updatedTimestamp = time();

    $messageComment = MessageComment::findOrFail($id);
    $messageComment->message = $request->input('message');
    $messageComment->edit_status = 'Edited';
    $messageComment->updatedtimestamp = $updatedTimestamp;
    $messageComment->save();

    return response()->json(['success' => 'Message updated successfully',]);
}

public function destroy($id)
{
    $messageComment = MessageComment::findOrFail($id);
  
    $messageComment->delete();

    return response()->json(['success' => 'Message deleted successfully']);
}

}
 