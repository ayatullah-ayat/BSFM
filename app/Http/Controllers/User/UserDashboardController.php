<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Cookie;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishListProducts = null;
        $wishLists = Cookie::get('wishLists'. auth()->user()->id ?? null);
        if (!is_null($wishLists)) {
            $wishLists      = unserialize($wishLists);
            $uniqueProducts = array_unique($wishLists);
            $wishListProducts= Product::whereIn('id', $uniqueProducts)->get();

        }


        $orders = Order::where('customer_id', auth()->guard('web')->user()->id ?? null )
                ->with('orderDetails')
                ->get();


        $pendingOrders = Order::where('customer_id', auth()->guard('web')->user()->id ?? null)
                ->where('status', 'pending')
                ->count();

        $completedOrders = Order::where('customer_id', auth()->guard('web')->user()->id ?? null)
                ->where('status', 'completed')
                ->count();


        return view('frontend.dashboard', compact('wishListProducts', 'orders', 'pendingOrders', 'completedOrders'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
