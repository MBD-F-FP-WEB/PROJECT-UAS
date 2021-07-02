<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCustomerDemo;
use App\Models\CustomerDemographic;
use Illuminate\Http\Request;

class CustomerCustomerDemoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$customer_customer_demo = CustomerCustomerDemo::all();
		return view('tables.customer_customer_demo', compact('customer_customer_demo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$customer_ids = Customer::all()->pluck('customer_id');
		$customer_type_ids = CustomerDemographic::all()->pluck('customer_type_id');
		
		return view('forms.customer_customer_demo', compact(['customer_ids', 'customer_type_ids']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$id = CustomerCustomerDemo::last()->id;
		$query = 'INSERT INTO customer_customer_demo VALUE('
			.$id.', \''
			.$request->customer_id.'\', \''
			.$request->customer_type_id.'\');';
		
		return $this->callProcedure($query);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
