<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'plan_type', 'year', 'filename','size' ,'description' ,'sent_date','status'
    ];
}
