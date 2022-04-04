<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;


Route::get('order-export', [OrderController::class, 'orderexport'])->name('order_export');
Route::get('orderDataCsv', [OrderController::class, 'orderDataCsv'])->name('orderDataCsv');
Route::get('product-export',[ProductController::class, 'productexport'])->name('product_export');