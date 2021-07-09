<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class ViewController extends Controller
{
	public function view()
	{
        $employee = Employee::count();
        $customer = Customer::count();
        $order = Order::count();
        $product = Product::count();
		return view('welcome', compact(['employee', 'customer', 'order', 'product']));
	}
}
