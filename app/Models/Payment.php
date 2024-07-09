<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'request_id','account_id','amount', 'payment_mode', 'reference_no','paid_date','paid_to','debit','credit'
        ,'posted','status'
    ];
}
