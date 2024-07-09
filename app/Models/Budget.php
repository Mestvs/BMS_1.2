<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'year','category_id','zerfe_id', 'budget_amount','remain_amount' ,'intial_date','budget_description' ,'final_date','status'
    ];
}
