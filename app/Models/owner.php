<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    protected $table = 'owner';
	protected $fillable = [
		'name',
		'surname',
		'phone',
		'email',
		'address',
	];
}
