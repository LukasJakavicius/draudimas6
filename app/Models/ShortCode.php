<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortCode extends Model
{
    protected $table = 'shortcode';
	protected $fillable = [
		'replace',
		'shortcode',
	];
}
