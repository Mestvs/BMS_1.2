<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = 
	[
        'reciever_id', 'content', 'sender_id','reciever_name','sender_name','message_status'  
    ];
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
