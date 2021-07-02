<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Shipper;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = Order::all();
		return view('tables.order', compact('order'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$customer_ids = Customer::all()->pluck('customer_id');
		$shipper_ids = Shipper::all()->pluck('shipper_id');
		$employee_ids = Employee::all()->pluck('employee_id');

		return view('forms.order', compact(['customer_ids', 'shipper_ids', 'employee_ids']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'CALL insert_orders(\''
			. $request->customer_id .'\', \''
			. $request->employee_id .'\', \''
			. $request->required_date .'\', \''
			. $request->shipped_date .'\', \''
			. $request->ship_via .'\', \''
			. $request->freight .'\', \''
			. $request->ship_name .'\', \''
			. $request->ship_address .'\', \''
			. $request->ship_city .'\', \''
			. $request->ship_region .'\', \''
			. $request->ship_postal_code .'\', \''
			. $request->ship_country .'\');';

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
