<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

class ViewController extends Controller
{
	public function view()
	{
		$employee = Employee::count();
		$customer = Customer::count();
		$order = Order::count();
		$product = Product::count();
		$cus_cats = DB::select('
			select cu.contact_name, max(ca.category_name), count(ca.category_name)
			from customers cu
			natural join orders o
			natural join order_details od
			natural join products p
			natural join categories ca
			group by cu.contact_name
			limit 20;
		');
		$order_pm = DB::select('
			select extract(year from order_date) as yyyy,
			to_char(order_date,\'Mon\') as mon,
			count(order_id) as jml
			from orders
			group by mon, yyyy
			order by yyyy;
		');
		return view('welcome', compact(['employee', 'customer', 'order', 'product', 'cus_cats', 'order_pm']));
	}

	public function setDiskon(Request $request)
	{
		// dd($request->min . '|' . $request->disc);
		try {
			DB::statement(
				'
				CALL add_discount(:min, :disc);
				',
				['min' => $request->min, 'disc' => $request->disc]
			);

			return back()->with('success', "Berhasil Set Diskon");
		} catch (Exception $e) {
			return back()->with('error', "Gagal Set Diskon : " . $e->getMessage());
		}
	}
}
