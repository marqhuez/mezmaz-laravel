<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/', function () {
        return view('welcome');
    }
);

Route::get('/order/new', [OrderController::class, 'index'])->name('newOrder');
