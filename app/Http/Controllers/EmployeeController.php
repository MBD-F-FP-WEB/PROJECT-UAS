<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$reports_tos = Employee::all()->modelKeys();
		$employees = Employee::paginate(30);
		$stats = DB::select('select e.last_name, count(o.employee_id) as juml
		from orders o
		join employees e
		on (e.employee_id = o.employee_id)
		group by o.employee_id, e.last_name
		order by juml desc
		limit 3');
		// dd($stat);
		return view('tables.employee', compact(['employees', 'reports_tos', 'stats']));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		$reports_tos = Employee::all()->modelKeys();
		return view('forms.employee', compact('reports_tos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'CALL insert_employees(\''
			. $request->last_name . '\', \''
			. $request->first_name . '\', \''
			. $request->title . '\', \''
			. $request->title_of_courtesy . '\', \''
			. $request->birth_date . '\', \''
			. $request->hire_date . '\', \''
			. $request->address . '\', \''
			. $request->city . '\', \''
			. $request->region . '\', \''
			. $request->postal_code . '\', \''
			. $request->country . '\', \''
			. $request->home_phone . '\', \''
			. $request->extension . '\', \''
			. $request->photo . '\', \''
			. $request->notes . '\', \''
			. $request->reports_to . '\', \''
			. $request->photo_path . '\');';

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
			Employee::where('employee_id', $id)->update($request->except(['_method', '_token']));

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
