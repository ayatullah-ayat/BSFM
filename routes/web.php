<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::redirect('/', '/admin/dashboard', 301);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route::view('/dashboard', 'backend.dashboard');

    Route::get('/tables', function () {
        return view('backend.demo.table');
    });

    Route::get('/charts', function () {
        return view('backend.demo.chart');
    });

    Route::view('/category', 'backend.pages.category.categorylist')->name('category');

    Route::get('/add-category', function () {
        return view('backend.pages.category.addcategory');
    });

    Route::get('/subcategory', function () {
        return view('backend.pages.category.subcategory');
    })->name('subcategory');

    Route::get('/brand', function () {
        return view('backend.pages.brand.brandListing');
    })->name('brand');

    Route::get('/variant', function () {
        return view('backend.pages.variant.variantlist');
    })->name('variant');

    Route::get('/unit', function () {
        return view('backend.pages.unit.unitlist');
    })->name('unit');

    Route::get('/tax', function () {
        return view('backend.pages.tax.taxlist');
    })->name('tax');

    Route::get('/currency', function () {
        return view('backend.pages.currency.currencylist');
    })->name('currency');

    Route::get('/image-gallery', function () {
        return view('backend.pages.imagegallery.imagegallerylist');
    })->name('image-gallery');

    Route::get('/add-image-gallery', function () {
        return view('backend.pages.imagegallery.addgallery');
    })->name('add-image-gallery');

    Route::get('/manage-supplier', function () {
        return view('backend.pages.supplier.supplierlist');
    })->name('manage-supplier');

    Route::get('/manage-customer', function () {
        return view('backend.pages.customer.managecustomer');
    })->name('manage-customer');

    Route::get('/add-purchase', function () {
        return view('backend.pages.purchase.addpurchase');
    })->name('add-purchase');

    Route::get('/manage-purchase', function () {
        return view('backend.pages.purchase.managepurchase');
    })->name('manage-purchase');

    Route::get('/add-product', function () {
        return view('backend.pages.product.addproduct');
    })->name('add_product');

    Route::get('/manage-product', function () {
        return view('backend.pages.product.manageproduct');
    })->name('manage_product');

    Route::get('/order-add', function () {
        return view('backend.pages.order.orderadd');
    })->name('order_add');

    Route::get('/order-manage', function () {
        return view('backend.pages.order.ordermanage');
    })->name('order_manage');
});


require __DIR__.'/auth.php';
