<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZerfePlan extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'plan_id', 'zerfe_id', 'filename','size','description','status','date'
       
    ];
}
