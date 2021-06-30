<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CreateController;

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
});

Route::get('/form', [CreateController::class, 'view'])->name('form');
