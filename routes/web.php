<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerCustomerDemoController;
use App\Http\Controllers\CustomerDemographicsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeTerritoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\UsStatesController;

Route::group(['prefix' => ''], function () {
	Route::get('', [ViewController::class, 'view'])->name('home');
});

Route::group(['prefix' => 'table'], function () {
	Route::get('employee', [ViewController::class, 'viewEmployee'])->name('table.employee');
	Route::get('customer', [ViewController::class, 'viewCustomer'])->name('table.customer');
	Route::get('order', [ViewController::class, 'viewOrder'])->name('table.order');
	Route::get('product', [ViewController::class, 'viewProduct'])->name('table.product');
});

Route::group(['prefix' => 'form'], function () {
	Route::view('category', 'forms.category')->name('form.category');
	Route::view('customer_customer_demo', 'forms.customer_customer_demo')->name('form.customer_customer_demo');
	Route::view('customer_demographics', 'forms.customer_demographics')->name('form.customer_demographics');
	Route::view('customer', 'forms.customer')->name('form.customer');
	Route::view('employee_territories', 'forms.employee_territories')->name('form.employee_territories');
	Route::view('employee', 'forms.employee')->name('form.employee');
	Route::view('order_detail', 'forms.order_detail')->name('form.order_detail');
	Route::view('order', 'forms.order')->name('form.order');
	Route::view('product', 'forms.product')->name('form.product');
	Route::view('region', 'forms.region')->name('form.region');
	Route::view('shipper', 'forms.shipper')->name('form.shipper');
	Route::view('supplier', 'forms.supplier')->name('form.supplier');
	Route::view('territory', 'forms.territory')->name('form.territory');
	Route::view('us_states', 'forms.us_states')->name('form.us_states');

	Route::post('category', [CategoryController::class, 'store'])->name('form.category.store');
	Route::post('customer_customer_demo', [CustomerCustomerDemoController::class, 'store'])->name('form.customer_customer_demo.store');
	Route::post('customer_demographics', [CustomerDemographicsController::class, 'store'])->name('form.customer_demographics.store');
	Route::post('customer', [CustomersController::class, 'store'])->name('form.customer.store');
	Route::post('employee_territories', [EmployeeTerritoriesController::class, 'store'])->name('form.employee_territories.store');
	Route::post('employee', [EmployeesController::class, 'store'])->name('form.employee.store');
	Route::post('order_detail', [OrderDetailsController::class, 'store'])->name('form.order_detail.store');
	Route::post('order', [OrderController::class, 'store'])->name('form.order.store');
	Route::post('product', [ProductController::class, 'store'])->name('form.product.store');
	Route::post('region', [RegionController::class, 'store'])->name('form.region.store');
	Route::post('shipper', [ShippersController::class, 'store'])->name('form.shipper.store');
	Route::post('supplier', [SupplierController::class, 'store'])->name('form.supplier.store');
	Route::post('territory', [TerritoryController::class, 'store'])->name('form.territory.store');
	Route::post('us_states', [UsStatesController::class, 'store'])->name('form.us_states.store');
});
