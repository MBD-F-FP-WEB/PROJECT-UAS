<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerCustomerDemoController;
use App\Http\Controllers\CustomerDemographicsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeeController;
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
	Route::get('employee', [EmployeeController::class, 'index'])->name('table.employee');
	Route::get('customer', [ViewController::class, 'viewCustomer'])->name('table.customer');
	Route::get('order', [ViewController::class, 'viewOrder'])->name('table.order');
	Route::get('product', [ViewController::class, 'viewProduct'])->name('table.product');
});

Route::group(['prefix' => 'form'], function () {
	Route::get('category', [CategoryController::class, 'create'])->name('form.category');
	Route::get('customer_customer_demo', [CustomerCustomerDemoController::class, 'create'])->name('form.customer_customer_demo');
	Route::get('customer_demographics', [CustomerDemographicsController::class, 'create'])->name('form.customer_demographics');
	Route::get('customer', [CustomersController::class, 'create'])->name('form.customer');
	Route::get('employee_territories', [EmployeeTerritoriesController::class, 'create'])->name('form.employee_territories');
	Route::get('employee', [EmployeeController::class, 'create'])->name('form.employee');
	Route::get('order_detail', [OrderDetailsController::class, 'create'])->name('form.order_detail');
	Route::get('order', [OrderController::class, 'create'])->name('form.order');
	Route::get('product', [ProductController::class, 'create'])->name('form.product');
	Route::get('region', [RegionController::class, 'create'])->name('form.region');
	Route::get('shipper', [ShippersController::class, 'create'])->name('form.shipper');
	Route::get('supplier', [SupplierController::class, 'create'])->name('form.supplier');
	Route::get('territory', [TerritoryController::class, 'create'])->name('form.territory');
	Route::get('us_states', [UsStatesController::class, 'create'])->name('form.us_states');

	Route::post('category', [CategoryController::class, 'store'])->name('form.category.store');
	Route::post('customer_customer_demo', [CustomerCustomerDemoController::class, 'store'])->name('form.customer_customer_demo.store');
	Route::post('customer_demographics', [CustomerDemographicsController::class, 'store'])->name('form.customer_demographics.store');
	Route::post('customer', [CustomersController::class, 'store'])->name('form.customer.store');
	Route::post('employee_territories', [EmployeeTerritoriesController::class, 'store'])->name('form.employee_territories.store');
	Route::post('employee', [EmployeeController::class, 'store'])->name('form.employee.store');
	Route::post('order_detail', [OrderDetailsController::class, 'store'])->name('form.order_detail.store');
	Route::post('order', [OrderController::class, 'store'])->name('form.order.store');
	Route::post('product', [ProductController::class, 'store'])->name('form.product.store');
	Route::post('region', [RegionController::class, 'store'])->name('form.region.store');
	Route::post('shipper', [ShippersController::class, 'store'])->name('form.shipper.store');
	Route::post('supplier', [SupplierController::class, 'store'])->name('form.supplier.store');
	Route::post('territory', [TerritoryController::class, 'store'])->name('form.territory.store');
	Route::post('us_states', [UsStatesController::class, 'store'])->name('form.us_states.store');

	Route::put('employee/update/{id}', [EmployeeController::class, 'update'])->name('form.employee.update');
});
