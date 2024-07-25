<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupChat extends Model
{
    use HasFactory;

    protected $fillable = ['group_name', 'user_ids'];

    
    public function messages()
    {
        return $this->hasMany(MessageComment::class, 'group_chat_id', 'id');
    }

    
    public function lastMessageComments()
{
    return $this->hasOne(MessageComment::class)->latest();
}

     
    public function isUserMember($userId)
    {
        $userIds = json_decode($this->user_ids, true);
        return in_array($userId, $userIds);
    }
}
