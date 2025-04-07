<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    protected $table = 'cars';
	protected $fillable = [
		'model',
		'brand',
		'reg_number',
		'owner_id',
	];
}
