<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAuthorizeDetail extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'request_id','authorizer_name','authorized_date', 'signature', 
    ];
}
