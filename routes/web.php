<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin', 301);

Route::group(['prefix'=> 'admin', 'as'=> 'admin.'],function(){

    Route::view('/', 'backend.dashboard');

    Route::get('/tables', function () {
        return view('backend.demo.table');
    });

    Route::get('/charts', function () {
        return view('backend.demo.chart');
    });

    Route::view('/category', 'backend.pages.category.categorylist')->name('category');

    Route::get('/add-category', function (){
        return view('backend.pages.category.addcategory');
    });

    Route::get('/brand', function (){
        return view('backend.pages.brand.brandListing');
    })->name('brand');

    Route::get('/variant', function(){
        return view('backend.pages.variant.variantlist');
    })->name('variant');

    Route::get('/unit', function(){
        return view('backend.pages.unit.unitlist');
    })->name('unit');

    Route::get('/tax', function(){
        return view('backend.pages.tax.taxlist');
    })->name('tax');

    Route::get('/currency', function (){
        return view('backend.pages.currency.currencylist');
    })->name('currency');
});


