<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeTerritories;
use App\Models\Territory;
use Illuminate\Http\Request;
use Exception;

class EmployeeTerritoriesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$employee_territories = EmployeeTerritories::paginate(30);
		return view('tables.employee_territories', compact('employee_territories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$employee_ids = Employee::all()->pluck('employee_id');
		$territory_ids = Territory::all()->pluck('territory_id');

		return view('forms.employee_territories', compact(['employee_ids', 'territory_ids']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'INSERT INTO employee_territories VALUE(\''
			.$request->employee_id.'\', \''
			.$request->territory_id.'\');';

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
			EmployeeTerritories::where('employee_id', $request->employee_id)->where('territory_id', $request->territory_id)->update($request->except(['_method', '_token']));
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
	public function destroy($employee_id, $territory_id)
	{
		EmployeeTerritories::where('employee_id', $employee_id)->where('territory_id', $territory_id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}
/**
 * 
CREATE TABLE employee_territories
(
	employee_id int,
	territory_id varchar(255),
	CONSTRAINT fk_et_to_employee 
		FOREIGN KEY (employee_id) 
		REFERENCES employees(employee_id),
	CONSTRAINT fk_et_to_territory 
		FOREIGN KEY (territory_id) 
		REFERENCES territories(territory_id)
);
 */