<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Route::get('/order/new', [OrderController::class, 'customerStep'])->name('newOrder');
Route::post('/order/new/customer/select-customer', [OrderController::class, 'selectCustomer'])->name('selectCustomer');
Route::post('/order/new/customer/save', [OrderController::class, 'saveCustomer'])->name('saveCustomer');
