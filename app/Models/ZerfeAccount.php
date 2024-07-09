<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZerfeAccount extends Model
{
    use HasFactory;
    protected $fillable = 
	[
        'zerfe_id', 'account_id' 
    ];


}
