<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('backend.dashboard');
});

Route::get('/tables', function () {
    return view('backend.demo.table');
});

Route::get('/charts', function () {
    return view('backend.demo.chart');
});

Route::get('/category', function(){
    return view('backend.Category.categorylist');
});

Route::get('/add-category', function (){
    return view('backend.Category.addcategory');
});
