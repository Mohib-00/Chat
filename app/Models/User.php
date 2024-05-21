<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function messages() {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    public function messagecomments() {
        return $this->hasMany(MessageComment::class, 'user_id', 'id');
    }
    
    public function lastMessageComments() {
        return $this->hasOne(MessageComment::class, 'user_id', 'id')
        ->latest();
    }

    public function messagesender() {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    public function messagereceiver() {
        return $this->hasMany(Message::class, 'receiver_id', 'id');
    }

     
}
