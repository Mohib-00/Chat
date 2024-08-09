<?php

namespace App\Http\Controllers;

use App\Models\GroupChat;
use App\Models\Message;
use App\Models\MessageComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
 
class MessagesController extends Controller
{
   public function store(Request $request)
{
    $conversation = new MessageComment;
    $conversation->user_id = auth()->user()->id;

    $uniqueTimestamp = time();

    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = $uniqueTimestamp . '-' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
        $conversation->video = 'videos/' . $videoName;
    }

    $imagePaths = [];
    if ($request->hasFile('images')) {
        $images = $request->file('images');
        foreach ($images as $image) {
            $imageName = $uniqueTimestamp . '-' . $image->getClientOriginalName();
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

    if ($request->hasFile('pdf')) {
        $pdf = $request->file('pdf');
        $pdfName = $uniqueTimestamp . '-' . $pdf->getClientOriginalName();
        $pdf->move(public_path('pdfs'), $pdfName);
        $conversation->pdf = 'pdfs/' . $pdfName;
    }

    $conversation->message_id = $request->message_id;
    $conversation->uniquetimestamp = $uniqueTimestamp;

    if ($request->has('reply_message_content')) {
        $conversation->reply_message_content = $request->reply_message_content;
    }

    $conversation->save();

    return response()->json($conversation);
}

    
    

    public function replyToStatus(Request $request)
    {
        $loggedInUserId = Auth::id();
        $statusUserId = $request->input('status_user_id');
    
        
        $statusUser = User::findOrFail($statusUserId);
        $replyStatus = $statusUser->user_status;
    
        $messageComment = new MessageComment();
        $uniqueTimestamp = time();
        $messageComment->uniquetimestamp = $uniqueTimestamp;
        $messageComment->message_id = $request->input('message_id');  
        $messageComment->user_id = $loggedInUserId;
        $messageComment->message = $request->input('message');
        $messageComment->reply_status = $replyStatus;
        $messageComment->save();
    
        return response()->json(['success' => true, 'message' => 'Reply saved successfully.']);
    }


  public function show($user)
    {
        $auth_user = auth()->user()->id;

        $groupChats = GroupChat::all()->filter(function($groupChat) use ($auth_user) {
            return $groupChat->isUserMember($auth_user);
        });
    
         
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
        $users=User::all();

        $otherUsers = User::where('id', '!=', auth()->id())->get();

       
        $groupChatIds = $groupChats->pluck('id');
        $groupChatss = GroupChat::whereIn('id', $groupChatIds)->get();

         
        
        //$pdfs = MessageComment::whereNotNull('pdf')->where('pdf', '!=', '')->get();
        $pdfs = MessageComment::all();
        $conversations =  MessageComment::where(['message_id'=> $message_info->id])->get();
       return view('messages', compact('user_messages', 'conversations', 'message_info','user','users','otherUsers','groupChats','groupChatss','pdfs'));

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

public function getGroupConversations(Request $request)
{
    $groupId = $request->chat_group_id;  
    $lastCheckedgrpUniqueTimestamp = $request->input('lastCheckedgrpUniqueTimestamp');

    $groupConversations = MessageComment::where('group_chat_id', $groupId)
        ->where('groupUnixTimestamp', '>', $lastCheckedgrpUniqueTimestamp)
        ->get();

    $updatedgroupConversations = MessageComment::where('group_chat_id', $groupId)
    ->where('groupUpdatedTimestamp', '>', $lastCheckedgrpUniqueTimestamp)
    ->get();    

   

    return response()->json(['groupConversations' => $groupConversations, 'updatedgroupConversations' => $updatedgroupConversations]);
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

    
    return response()->json(['message' => 'New page opened successfully']);
}


public function updateProfile(Request $request){

    $user = User::where('id', auth()->user()->id)->first();
    $user->name = $request->input('name');
    $user->about = $request->input('about');
   
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
    $messageComment = MessageComment::findOrFail($id);
    $updatedMessage = $request->input('message');
    $originalMessage = $messageComment->message;

    if ($updatedMessage !== $originalMessage) {
        $messageComment->message = $updatedMessage;
        $messageComment->edit_status = 'Edited';
        $messageComment->updatedtimestamp = time();
        $messageComment->save();
    }

    return response()->json(['success' => 'Message updated successfully']);
}


public function destroy($id)
{
    $messageComment = MessageComment::findOrFail($id);
  
    $messageComment->delete();

    return response()->json(['success' => 'Message deleted successfully']);
}

public function saveReact(Request $request)
    {
        $updatedTimestamp = time();       

        $messageComment = MessageComment::find($request->conversation_id);

        if (!$messageComment) {
            return response()->json(['error' => 'Message not found'], 404);
        }

        $messageComment->updatedtimestamp = $updatedTimestamp;
        
        $messageComment->react_message = $request->emoji;
        $messageComment->save();

        return response()->json(['message' => 'Reaction saved successfully'], 200);
    }

    public function getLastMessage(Request $request)
    {
        $userId = auth()->user()->id; 
        $message = MessageComment::where('user_id', $userId)
                                 ->orderBy('updatedtimestamp', 'desc')
                                 ->first();
        if ($message) {
            return response()->json([
                'success' => true,
                'lastMessage' => $message
            ]);
        } else {
            return response()->json(['success' => false, 'error' => 'No message found'], 404);
        }
    }


    public function addStatus(Request $request)
    {
        $user = Auth::user();
        $file = $request->file('status');
        $fileName = time() . '-' . $file->getClientOriginalName();

        
        if (strpos($file->getMimeType(), 'image') === 0) {
            $file->move(public_path('images'), $fileName);
            $user->user_status = 'images/' . $fileName;
        } else {
            $file->move(public_path('videos'), $fileName);
            $user->user_status = 'videos/' . $fileName;
        }

        $user->status_date = now();
        $user->save();

        return response()->json(['message' => 'Status uploaded successfully!']);
    }

    public function createGroup(Request $request)
{
    $userNames = $request->input('names');
    $groupChatName = 'Group Chat ' . uniqid();
 
    $creatorId = auth()->id();

  
    $userIds = User::whereIn('name', $userNames)->pluck('id')->toArray();

   
    $userIds[] = $creatorId;

    
    $groupChat = GroupChat::create([
        'group_name' => $groupChatName,
        'user_ids' => json_encode($userIds),
    ]);

    return response()->json([
        'success' => true,
        'group_chat' => $groupChat
    ]);
}


public function saveGroupMessage(Request $request)
{
    

    $validated = $request->validate([
        'group_chat_id' => 'required|exists:group_chats,id',
        'message' => 'required|string',
    ]);

    if (!$validated) {
        return response()->json(['success' => false, 'message' => 'Validation failed.']);
    }

    $messageComment = new MessageComment;
    $messageComment->group_chat_id = $request->input('group_chat_id');
    $messageComment->user_id = auth()->user()->id;
    $messageComment->message = $request->message;
    $messageComment->groupUnixTimestamp = time();

    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = time() . '-' . $video->getClientOriginalName();       
        $video->move(public_path('videos'), $videoName);      
        $messageComment->video = 'videos/' . $videoName;  
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
        $messageComment->image = $imageString;       
        $messageComment->message = '';
    } 

    if ($request->has('reply_message_content')) {
        $messageComment->reply_message_content = $request->reply_message_content;
    }

    $messageComment->save();

    return response()->json(['success' => true]);
}

 

public function loadGroupChatMessages($groupId)
{
    $groupChat = GroupChat::findOrFail($groupId);

    
    $userId = auth()->id();
    if (!in_array($userId, json_decode($groupChat->user_ids))) {
        return response()->json(['success' => false, 'message' => 'You are not a member of this group.'], 403);
    }

  
    $messages = MessageComment::where('group_chat_id', $groupId)->with('user')->get();

    return response()->json(['success' => true, 'messages' => $messages]);
}

public function deletegrp($id)
{
    $message = MessageComment::find($id);
    $groupUpdatedTimestamp = time();
    
    if ($message) {
        $deletedMessageId = $message->id;  
       
        $message->groupUpdatedTimestamp = $groupUpdatedTimestamp;
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

public function destroygrpmsg($id)
{
    $messageComment = MessageComment::findOrFail($id);
  
    $messageComment->delete();

    return response()->json(['success' => 'Message deleted successfully']);
}

public function savegrpReact(Request $request)
    {
        $groupUpdatedTimestamp = time();       

        $messageComment = MessageComment::find($request->conversation_id);

        if (!$messageComment) {
            return response()->json(['error' => 'Message not found'], 404);
        }

        $messageComment->groupUpdatedTimestamp = $groupUpdatedTimestamp;
        
        $messageComment->react_message = $request->emoji;
        $messageComment->save();

        return response()->json(['message' => 'Reaction saved successfully'], 200);
    }

    public function updategrpmessage(Request $request, $id)
{
    $messageComment = MessageComment::findOrFail($id);
    $updatedMessage = $request->input('message');
    $originalMessage = $messageComment->message;

    if ($updatedMessage !== $originalMessage) {
        $messageComment->message = $updatedMessage;
        $messageComment->edit_status = 'Edited';
        $messageComment->groupUpdatedTimestamp = time();
        $messageComment->save();
    }

    return response()->json(['success' => 'Message updated successfully']);
}


   }