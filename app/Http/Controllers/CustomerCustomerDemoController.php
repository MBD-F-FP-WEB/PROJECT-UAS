<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerCustomerDemo;
use App\Models\CustomerDemographic;
use Illuminate\Http\Request;
use Exception;

class CustomerCustomerDemoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$customer_customer_demos = CustomerCustomerDemo::paginate(30);
		return view('tables.customer_customer_demo', compact('customer_customer_demos'));
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
		$query = 'INSERT INTO customer_customer_demo VALUES('
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
		try {
			CustomerCustomerDemo::where('customer_id', $request->customer_id)->where('customer_type_id', $request->customer_type_id)->update($request->except(['_method', '_token']));
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
	public function destroy($customer_id, $customer_type_id)
	{
		CustomerCustomerDemo::where('customer_id', $customer_id)->where('customer_type_id', $customer_type_id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}
/*
CREATE TABLE customer_customer_demo
(
  id int,
	customer_id varchar(255),
	customer_type_id varchar(255),
  PRIMARY KEY (id),
	CONSTRAINT fk_ccd_to_customers 
		FOREIGN KEY (customer_id) 
		REFERENCES customers(customer_id),
	CONSTRAINT fk_ccd_to_customer_demographics 
		FOREIGN KEY (customer_type_id) 
		REFERENCES customer_demographics(customer_type_id)
);
 */