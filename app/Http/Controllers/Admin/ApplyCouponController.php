<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplyCoupon;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;

class ApplyCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::with('applycoupons')
                ->where('status', 1)
                ->whereDate('coupon_validity','>=', date('Y-m-d'))
                ->orderByDesc('id')
                ->get();

        // dd( $coupons->applycoupons);

        return view('backend.pages.coupon.applycoupon', compact('coupons'));
    }

    public function searchProduct(){

        $productName = request('term')['term'] ?? null;

        if(!$productName) return;

        $products = Product::where('is_active', 1)
                    ->where('is_publish', 1)
                    ->where('product_name', 'like', "%{$productName}%")
                    ->orderByDesc('id')
                    ->get();

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\ApplyCoupon  $applyCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(ApplyCoupon $applyCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplyCoupon  $applyCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplyCoupon $applyCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplyCoupon  $applyCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplyCoupon $applyCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplyCoupon  $applyCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyCoupon $applyCoupon)
    {
        //
    }
}
