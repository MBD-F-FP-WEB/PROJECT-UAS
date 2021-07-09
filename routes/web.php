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
	/* view / read */
	Route::get('employee', [EmployeeController::class, 'index'])->name('table.employee');
	Route::get('customer', [CustomersController::class, 'index'])->name('table.customer');
	Route::get('order', [OrderController::class, 'index'])->name('table.order');
	Route::get('product', [ProductController::class, 'index'])->name('table.product');
	Route::get('category', [CategoryController::class, 'index'])->name('table.category');
	Route::get('customer_customer_demo', [CustomerCustomerDemoController::class, 'index'])->name('table.customer_customer_demo');
	Route::get('customer_demographics', [CustomerDemographicsController::class, 'index'])->name('table.customer_demographics');
	Route::get('employee_territories', [EmployeeTerritoriesController::class, 'index'])->name('table.employee_territories');
	Route::get('order_detail', [OrderDetailsController::class, 'index'])->name('table.order_detail');
	Route::get('region', [RegionController::class, 'index'])->name('table.region');
	Route::get('shipper', [ShippersController::class, 'index'])->name('table.shipper');
	Route::get('territory', [TerritoryController::class, 'index'])->name('table.territory');
	Route::get('us_states', [UsStatesController::class, 'index'])->name('table.us_states');
	
	/* destroy / delete */
	Route::delete('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('form.employee.delete');
	Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('form.category.delete');
	Route::delete('customer_customer_demo/delete/{id}', [CustomerCustomerDemoController::class, 'destroy'])->name('form.customer_customer_demo.delete');
	Route::delete('customer_demographics/delete/{id}', [CustomerDemographicsController::class, 'destroy'])->name('form.customer_demographics.delete');
	Route::delete('customer/delete/{id}', [CustomersController::class, 'destroy'])->name('form.customer.delete');
	Route::delete('employee_territories/delete/{employee_id}/{territory_id}', [EmployeeTerritoriesController::class, 'destroy'])->name('form.employee_territories.delete');
	Route::delete('order_detail/delete/{id}', [OrderDetailsController::class, 'destroy'])->name('form.order_detail.delete');
	Route::delete('order/delete/{id}', [OrderController::class, 'destroy'])->name('form.order.delete');
	Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('form.product.delete');
	Route::delete('region/delete/{id}', [RegionController::class, 'destroy'])->name('form.region.delete');
	Route::delete('shipper/delete/{id}', [ShippersController::class, 'destroy'])->name('form.shipper.delete');
	Route::delete('supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('form.supplier.delete');
	Route::delete('territory/delete/{id}', [TerritoryController::class, 'destroy'])->name('form.territory.delete');
	Route::delete('us_states/delete/{id}', [UsStatesController::class, 'destroy'])->name('form.us_states.delete');
});

Route::group(['prefix' => 'form'], function () {
	/* create */
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

	/* store */
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

	/* update */
	Route::put('employee/update/{id}', [EmployeeController::class, 'update'])->name('form.employee.update');
	Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('form.category.update');
	Route::put('customer_customer_demo/update/{id}', [CustomerCustomerDemoController::class, 'update'])->name('form.customer_customer_demo.update');
	Route::put('customer_demographics/update/{id}', [CustomerDemographicsController::class, 'update'])->name('form.customer_demographics.update');
	Route::put('customer/update/{id}', [CustomersController::class, 'update'])->name('form.customer.update');
	Route::put('employee_territories/update/{id}', [EmployeeTerritoriesController::class, 'update'])->name('form.employee_territories.update');
	Route::put('order_detail/update/{id}', [OrderDetailsController::class, 'update'])->name('form.order_detail.update');
	Route::put('order/update/{id}', [OrderController::class, 'update'])->name('form.order.update');
	Route::put('product/update/{id}', [ProductController::class, 'update'])->name('form.product.update');
	Route::put('region/update/{id}', [RegionController::class, 'update'])->name('form.region.update');
	Route::put('shipper/update/{id}', [ShippersController::class, 'update'])->name('form.shipper.update');
	Route::put('supplier/update/{id}', [SupplierController::class, 'update'])->name('form.supplier.update');
	Route::put('territory/update/{id}', [TerritoryController::class, 'update'])->name('form.territory.update');
	Route::put('us_states/update/{id}', [UsStatesController::class, 'update'])->name('form.us_states.update');
});
// 
//Route::put('employee_territories/update/{employee_id}/{territory_id}', [EmployeeTerritoriesController::class, 'update'])->name('form.employee_territories.update');