<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageSent extends Model
{
    use HasFactory;

    protected $fillable = 
	[
        'reciever_id', 'content', 'sender_id','reciever_name','sender_name' 
    ];
}
