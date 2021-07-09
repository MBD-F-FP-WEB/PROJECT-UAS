<?php

namespace App\Http\Controllers;

use App\Models\CustomerDemographic;
use Illuminate\Http\Request;
use Exception;

class CustomerDemographicsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$customer_demographics = CustomerDemographic::paginate(30);
		return view('tables.customer_demographics', compact('customer_demographics'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('forms.customer_demographics');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'INSERT INTO customer_demographics VALUES(\''
			.$request->customer_type_id.'\', \''
			.$request->customer_desc.'\');';
			
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
			CustomerDemographic::where('customer_type_id', $id)->update($request->except(['_method', '_token']));
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
		CustomerDemographic::findOrFail($id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}
/*
CREATE TABLE customer_demographics
(
	customer_type_id varchar(255),
	customer_desc varchar(255),
	PRIMARY KEY (customer_type_id)
);
 */