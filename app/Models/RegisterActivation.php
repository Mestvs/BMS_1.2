<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterActivation extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'status', 'end_date' 
    ];
}
