<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCustomerDemo extends Model
{
	use HasFactory;

	protected $table = 'customer_customer_demo';
	protected $fillable = [
		'id',
		'customer_id',
		'customer_type_id'
	];
	public $timestamps = false;
}
