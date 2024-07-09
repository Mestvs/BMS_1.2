<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'category_id','directorate_id', 'zerfe_id', 'title','amount','description','requester_name','request_date','signature'
        ,'approval','pay_status'
    ];
}
