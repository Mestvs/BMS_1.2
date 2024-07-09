<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanApprovalDetail extends Model
{
    use HasFactory;

    protected $fillable = 
	[
        'zerfe_sent_id','signature','approver_name', 'approved_date' 
    ];
}
