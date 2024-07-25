<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageComment extends Model
{
    use HasFactory;

    protected $fillable = ['message_id', 'user_id', 'message', 'image', 'media', 'group_chat_id'];

     
    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }

     
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

     
    public function groupChat()
    {
        return $this->belongsTo(GroupChat::class, 'group_chat_id', 'id');
    }

    public function lastMessageComments()
{
    return $this->hasOne(MessageComment::class)->latest();
}
}
