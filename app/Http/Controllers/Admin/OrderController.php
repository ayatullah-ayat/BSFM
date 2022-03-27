<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders = Order::all();
        return view('backend.pages.order.ordermanage', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.pages.order.orderadd');
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Notification $notification)
    {
        try{

            $this->markAsRead($notification);

            // dd($order);

            $pdf = PDF::loadView('backend.pages.order.show_order', compact('order'), [], [
                    'margin_left'   => 20,
                    'margin_right'  => 15,
                    'margin_top'    => 48,
                    'margin_bottom' => 25,
                    'margin_header' => 10,
                    'margin_footer' => 10,
                    'watermark'     => $this->setWaterMark($order),
                ]);


            // dd($pdf);

            return $pdf->stream('order_invoice_' . preg_replace("/\s/", '_', ($order->customer_name ?? '')) . '_' . ($order->order_date ?? '') . '_.pdf');
        }catch(Exception $e){
            dd($e->getMessage());
        }


        // return view('backend.pages.order.show_order', compact('order'));

    }



    private function setWaterMark($order)
    {
        return $order && $order->status ? ucfirst($order->status) : '';
    }


    private function markAsRead($notification)
    {
        if (!is_null($notification) && isset($notification->id)) {
            $notification->update(['read_at' => Carbon::now()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
