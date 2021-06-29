<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CreateController;

Route::group(['prefix' => ''], function () {
    Route::get('', [ViewController::class, 'view'])->name('home');
});

Route::group(['prefix' => 'form'], function () {
    Route::view('category', 'forms.category')->name('form.category');
});

Route::get('/form', [CreateController::class, 'view'])->name('form');
