<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
	use HasFactory;

	protected $table = 'shippers';

	protected $primaryKey = 'shipper_id';

	protected $fillable = [
		'company_name',
		'phone'
	];
	public $timestamps = false;
}
