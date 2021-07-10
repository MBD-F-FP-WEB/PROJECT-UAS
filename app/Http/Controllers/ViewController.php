<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;

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
			limit 10;
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

	public function showCusCat() {
		// $cus_cats = DB::select('
		// 	select cu.contact_name, max(ca.category_name), count(ca.category_name)
		// 	from customers cu
		// 	natural join orders o
		// 	natural join order_details od
		// 	natural join products p
		// 	natural join categories ca
		// 	group by cu.contact_name
		// 	limit 10;
		// ');
		$cus_cats = DB::table('customers')
			->select('customers.contact_name', DB::raw('max(categories.category_name)'), DB::raw('count(categories.category_name)'))
			->join('orders', 'customers.customer_id', '=', 'orders.customer_id')
			->join('order_details', 'orders.order_id', '=', 'orders.order_id')
			->join('products', 'order_details.product_id', '=', 'products.product_id')
			->join('categories', 'products.category_id', '=', 'categories.category_id')
			->groupBy('customers.contact_name')
			->paginate(20);
		return view('tables.detail.customer_category', compact(['cus_cats']));
	}
}
