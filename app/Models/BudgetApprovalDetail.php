<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetApprovalDetail extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'b_request_id','approver_name','approved_date', 'signature', 
    ];
}
