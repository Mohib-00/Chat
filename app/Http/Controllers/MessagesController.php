<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageComment;
use App\Models\User;
use Illuminate\Http\Request;
 
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
       return view('messages', compact('user_messages', 'conversations', 'message_info',));

    }
 
public function getConversations(Request $request)
{
    $messageId = $request->input('id');  
    $lastCheckedUniqueTimestamp = $request->input('lastCheckedUniqueTimestamp');

    if (!is_numeric($lastCheckedUniqueTimestamp)) {
        return response()->json(['error' => 'Invalid timestamp'], 400);
    }

    $conversations = MessageComment::with('user')
        ->where('message_id', $messageId)
        ->where('uniquetimestamp', '>', $lastCheckedUniqueTimestamp)
        ->where(function ($query) {
             
        })
        ->get();

        $updatedConversations = MessageComment::with('user')
        ->where('message_id', $messageId)
        ->where('updatedtimestamp', '>', $lastCheckedUniqueTimestamp)
        ->where(function ($query) {
              
        })
        ->get();
        
    return response()->json(['conversations' => $conversations,'updatedConversations' => $updatedConversations]);
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

public function update(Request $request)
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

}
 