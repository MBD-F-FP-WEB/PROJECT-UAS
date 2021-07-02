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
		$categories = Category::paginate(30);
		return view('tables.category', compact(['categories']));
	}

	public function create()
	{
		$is_editing = false;
		return view('forms.category', compact(['is_editing']));
	}

	public function store(StoreCategoryRequest $request)
	{
		$pics = addslashes($request->picture);
		$query = 'CALL insert_categories(\''
			.$request->category_name.'\', \''
			.$request->description.'\', \''
			.$pics.'\');';

		return $this->callProcedure($query);
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$category = Category::findOrFail($id);
		return view('forms.category', compact('category'));
	}

	public function update(Request $request, $id)
	{
		try {
			Category::where('category_id', $id)->update($request->except(['_method', '_token']));
			return back()->with('success', "Berhasil update data");
		} catch (Exception $e) {
			return back()->with('error', "Gagal update data");
		}
	}

	public function destroy($id)
	{
		//
	}
}
