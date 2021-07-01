<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
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
}
