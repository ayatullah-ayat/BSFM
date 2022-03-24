<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\CouponChecker;
use App\Models\ApplyCoupon;
use App\Models\Coupon;
use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    use CouponChecker;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {

        $cartProducts = null;
        $productIds = Cookie::get('productIds');
        if (!is_null($productIds)) {
            $productIds     = unserialize($productIds);
            $uniqueProducts = array_unique($productIds);
            $cartProducts   = Product::whereIn('id', $uniqueProducts)->get();
            // dd($cartProducts);
        }

        $coupon = Coupon::where('status', 1)->get();
        // dd($coupon);
        return view('frontend.pages.checkout', compact('product', 'cartProducts','coupon'));
        //checkout
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


    public function checkCoupon(Request $request){

        try {

            $coupon = $request->coupon;      
            $order  = $request->order;

            if(session('coupon')) 
                throw new Exception("{$coupon}, Already applied!", 403);

            $couponResponse = $this->checkCouponValidation($coupon, $order);
            if(!$couponResponse['success'])
                throw new Exception($couponResponse['msg'], $couponResponse['code']);

            $couponData     = $couponResponse['data'] ?? null;
            $couponResponse = $this->checkCouponItemsValidation($couponData, $order);
            if(!$couponResponse['success'])
                throw new Exception($couponResponse['msg'], $couponResponse['code']);

            // dd($couponData, $couponResponse['data']); 

            session()->put('coupon',[
                'coupon_code'           => $coupon,
                'total_discount_price'  => $couponResponse['data']['total_discount_price'],
                'total_discount_amount' => $couponResponse['data']['total_discount_amount'],
            ]);

            return response()->json([
                'success'   => true,
                'msg'       => 'Coupon Applied Successfully!',
                'data'      => $couponResponse['data'] ?? null
            ]);

        } catch (\Exception $th) {
            return response()->json([
                'success'   => false,
                'msg'       => $th->getMessage(),
                'data'      => null
            ]);
        }
    }

    public function removeCoupon(Request $request){

        try {

            $coupon = $request->coupon;     

            if(!session('coupon')) 
                throw new Exception("{$coupon}, Not applied!", 403);

            $total_discount_price = session('coupon')['total_discount_price'] ?? 0;
            $total_discount_amount= session('coupon')['total_discount_amount'] ?? 0;

            if(session('coupon')['coupon_code']==$coupon){
                session()->forget('coupon');
            }

            return response()->json([
                'success'   => true,
                'msg'       => 'Coupon Removed Successfully!',
                'total_discount_price' => $total_discount_price,
                'total_discount_amount' =>$total_discount_amount,
            ]);

        } catch (\Exception $th) {
            return response()->json([
                'success'   => false,
                'msg'       => $th->getMessage(),
                'data'      => null
            ]);
        }
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
