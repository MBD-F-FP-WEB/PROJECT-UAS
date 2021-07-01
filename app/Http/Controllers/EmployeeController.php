<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $query = 'CALL insert_employees(\''
            .$request->last_name.'\', \''
            .$request->first_name.'\', \''
            .$request->title.'\', \''
            .$request->title_of_courtesy.'\', \''
            .$request->birth_date.'\', \''
            .$request->hire_date.'\', \''
            .$request->address.'\', \''
            .$request->city.'\', \''
            .$request->region.'\', \''
            .$request->postal_code.'\', \''
            .$request->country.'\', \''
            .$request->home_phone.'\', \''
            .$request->extension.'\', \''
            .$request->photo.'\', \''
            .$request->notes.'\', \''
            .$request->reports_to.'\', \''
            .$request->photo_path.'\');';

		try {
			\DB::statement($query);

			return back()->with('success', "Berhasil submit data");
		} catch (Exception $e) {
			return back()->with('error', "Gagal submit data");
		}
    }

    /**
     * insert_employees (
            last_name varchar,
            first_name varchar,
            title varchar,
            title_of_courtesy varchar,
            birth_date date,
            hire_date date,
            address varchar,
            city varchar,
            region varchar,
            postal_code varchar,
            country varchar,
            home_phone varchar,
            extension varchar,
            photo bytea,
            notes text,
            reports_to int,
            photo_path varchar
        )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
