<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Shipper;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = Order::paginate(30);
		return view('tables.order', compact(['orders']));
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
		try {
			Order::where('order_id', $id)->update($request->except(['_method', '_token']));
			return back()->with('success', "Berhasil update data");
		} catch (Exception $e) {
			return back()->with('error', "Gagal update data");
		}
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
/**
 * CREATE TABLE orders
(
	order_id int,
	customer_id varchar(255),
	employee_id int,
	order_date date,
	required_date date,
	shipped_date date,
	ship_via int,
	freight int,
	ship_name varchar(255),
	ship_address varchar(255),
	ship_city varchar(255),
	ship_region varchar(255),
	ship_postal_code varchar(255),
	ship_country varchar(255),
	PRIMARY KEY (order_id),
	CONSTRAINT fk_o_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_o_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employees(employee_id),
	CONSTRAINT fk_o_to_shippers 
		FOREIGN KEY (ship_via) 
		REFERENCES shippers(shipper_id)
);
 */