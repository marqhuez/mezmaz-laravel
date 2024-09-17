<?php

use App\Http\Controllers\Order\CustomerController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderInfoController;
use App\Http\Controllers\Order\SummaryController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('welcome');
    }
)->name('home');
Route::get(
    '/orders',
    function () {
        return view('welcome');
    }
)->name('orders');

Route::get('/order/new/customer', [CustomerController::class, 'customerStep'])->name('customerStep');
Route::get('/order/new/order-info', [OrderInfoController::class, 'orderInfoStep'])->name('orderInfoStep');
Route::get('/order/new/summary', [SummaryController::class, 'summaryStep'])->name('summaryStep');

Route::get('/order/new/order-info/new-order-item', [OrderInfoController::class, 'addNewItem'])
    ->name('OrderInfoStep');

Route::post('/order/new/customer/select-customer', [CustomerController::class, 'selectCustomer'])
    ->name('selectCustomer');

Route::post('/order/new/customer/save', [CustomerController::class, 'saveCustomer'])->name('saveCustomer');
Route::post('/order/new/order-info/save', [OrderInfoController::class, 'saveOrderInfo'])->name('saveOrderInfo');
Route::post('/order/new/save', [OrderController::class, 'saveNewOrder'])->name('saveNewOrder');

Route::get('/order/new/success', function () {
    return view('order/success');
})->name('success');
