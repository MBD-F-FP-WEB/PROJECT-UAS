<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTerritories extends Model
{
	use HasFactory;

	protected $table = 'employee_territories';
	protected $fillable = [
		'employee_id',
		'territory_id'
	];
	public $timestamps = false;
}
