<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class OrderDetailsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$order_details = OrderDetail::paginate(30);
		return view('tables.order_details', compact('order_details'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$order_ids = Order::all()->pluck('order_id');
		$product_ids = Product::all()->pluck('product_id');

		return view('forms.order_detail', compact(['order_ids', 'product_ids']));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$query = 'INSERT INTO order_details VALUE(\''
			.$request->order_id.'\', \''
			.$request->product_id.'\', \''
			.$request->unit_price.'\', \''
			.$request->quantity.'\', \''
			.$request->discount.'\');';

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
			OrderDetail::where('order_id', $request->order_id)->where('product_id', $request->product_id)->update($request->except(['_method', '_token']));
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
	public function destroy($order_id, $product_id)
	{
		OrderDetail::where('order_id', $order_id)->where('product_id', $product_id)->delete();
		return back()->with('success', "Berhasil menghapus");
	}
}
/**
 * CREATE TABLE order_details
(
	order_id int,
	product_id int,
	unit_price int,
	quantity int,
	discount int,
	CONSTRAINT fk_od_to_orders 
		FOREIGN KEY (order_id) 
		REFERENCES orders(order_id),
	CONSTRAINT fk_od_to_products 
		FOREIGN KEY (product_id) 
		REFERENCES products(product_id)
);
 */