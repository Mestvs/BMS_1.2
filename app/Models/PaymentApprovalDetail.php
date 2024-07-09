<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentApprovalDetail extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'request_id','approver_name','approved_date', 'signature_sign', 
    ];
}
