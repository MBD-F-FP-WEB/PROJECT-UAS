<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	protected $table = 'products';
	
	protected $primaryKey = 'product_id';

	protected $fillable = [
		'supplier_id',
		'category_id',
		'product_name',
		'quantity_per_unit',
		'unit_price',
		'units_in_stock',
		'units_in_order',
		'recorder_level',
		'discontinued'
	];
	public $timestamps = false;
}
