<?php

namespace App\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ShippersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$shippers = Shipper::paginate(30);
		$stats = DB::select('
			select s.company_name as PT, count(order_id) as jml
			from orders o 
			join shippers s on o.ship_via = s.shipper_id
			group by PT
			order by jml desc;
		');
		return view('tables.shipper', compact(['shippers', 'stats']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('forms.shipper');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'CALL insert_shippers(\''
			. $request->company_name .'\', \''
			. $request->phone .'\');';

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
			Shipper::where('shipper_id', $id)->update(['company_name'=>$request->company_name, 'phone'=>$request->phone]);
			return back()->with('success', "Berhasil update data");
		} catch (Exception $e) {
			return back()->with('error', "Gagal update data" . $e->getMessage());
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
		Shipper::findOrFail($id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}
/**
 * CREATE TABLE shippers
(
	shipper_id int,
	company_name varchar(255),
	phone varchar(255),
	PRIMARY KEY (shipper_id)
);
 */