<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::paginate(30);
		$stats = DB::select('
			select ca.category_name, count(order_id) as jml
			from products pr
			join order_details od on pr.product_id = od.product_id
			join categories ca on pr.category_id = ca.category_id
			group by ca.category_name
			order by jml desc;
		');
			
		return view('tables.category', compact(['categories', 'stats']));
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
			. $request->category_name . '\', \''
			. $request->description . '\', \''
			. $pics . '\');';

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
		Category::findOrFail($id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}

/*
CREATE TABLE categories
(
	category_id int,
	category_name varchar(255),
	description varchar(255),
	picture bytea,
	PRIMARY KEY (category_id)
);
*/