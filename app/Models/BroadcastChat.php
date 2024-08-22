<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroadcastChat extends Model
{
    use HasFactory;
    protected $table = 'broadcast_chats';

    protected $fillable = [
        'broadcast_name',
        'user_ids',
        'user_id',
    ];

    protected $casts = [
        'user_ids' => 'array',   
    ];

    public function messages()
    {
        return $this->hasMany(MessageComment::class, 'group_chat_id', 'id');
    }

    
    public function lastMessageComments()
{
    return $this->hasOne(MessageComment::class)->latest();
}

     
    
}
