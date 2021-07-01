<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ViewController extends Controller
{
	public function view()
	{
		return view('welcome');
	}

	public function viewEmployee()
	{
		$employees = Employee::paginate(30);
		return view('tables.employee', compact(['employees']));
	}

	public function viewCustomer()
	{
		$customers = Customer::paginate(30);
		return view('tables.customer', compact(['customers']));
	}

	public function viewOrder()
	{
		$orders = Order::paginate(30);
		return view('tables.order', compact(['orders']));
	}

	public function viewProduct()
	{
		$products = Product::paginate(30);
		return view('tables.product', compact(['products']));
	}
}
