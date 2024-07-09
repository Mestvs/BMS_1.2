<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetRequest extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'account_id','b_request_title','b_request_date','b_request_amount','description','zerfe_name','status'
    ];

}
