<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
			'company_name' => 'required',
			'contact_name' => 'required',
			'contact_title' => 'required',
			'address' => 'required',
			'city' => 'required',
			'region' => 'required',
			'postal_code' => 'required',
			'country' => 'required',
			'phone' => 'required',
			'fax' => 'required'
		];
	}
}
