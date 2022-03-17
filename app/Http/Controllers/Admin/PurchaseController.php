<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;

use App\Models\Variant;
use App\Models\Currency;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::select('supplier_name', 'id')->where('is_active', 1)->get();
        $units      = Unit::select('unit_name', 'id')->where('is_active', 1)->get();
        $currencies = Currency::select('currency_name', 'id')->where('is_active', 1)->get();
        $colors     = Variant::select('variant_name', 'id')->where([['is_active', 1], ['variant_type', 'color']])->get();
        $sizes      = Variant::select('variant_name', 'id')->where([['is_active', 1], ['variant_type', 'size']])->get();

        return view('backend.pages.purchase.addpurchase', compact('suppliers','units', 'currencies', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
