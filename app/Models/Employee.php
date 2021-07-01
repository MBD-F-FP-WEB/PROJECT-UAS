<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	use HasFactory;

	protected $table = 'employees';

	protected $primaryKey = 'employee_id';

	public $timestamps = false;

	protected $fillable = [
		'last_name',
		'first_name',
		'title',
		'title_of_courtesy',
		'birt_date',
		'hire_date',
		'address',
		'city',
		'region',
		'postal_code',
		'country',
		'home_phone',
		'extension',
		'photo',
		'notes',
		'reports_to',
		'photo_path'
	];
}
