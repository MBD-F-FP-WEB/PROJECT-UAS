<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
	public function index()
	{
	}

	public function create()
	{
		return view('forms.category');
	}

	public function store(StoreCategoryRequest $request)
	{
		$query = 'CALL insert_categories(\''
			.$request->category_name.'\', \''
			.$request->description.'\', \''
			.$request->picture.'\');';

		return $this->callProcedure($query);
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}
}
