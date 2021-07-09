<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDemographic extends Model
{
	use HasFactory;

	protected $table = 'customer_demographics';

	protected $fillable = [
		'customer_type_id',
		'customer_desc'
	];
	public $timestamps = false;
}
