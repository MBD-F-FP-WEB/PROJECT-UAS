<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
	use HasFactory;

	protected $table = 'territories';
	
	protected $primaryKey = 'territory_id';

	protected $fillable = [
		'teritory_description',
		'region_id'
	];
	public $timestamps = false;
}
