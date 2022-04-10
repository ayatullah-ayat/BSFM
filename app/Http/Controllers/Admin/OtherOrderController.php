<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Exports\OtherOrdertExport;
use App\Http\Controllers\Controller;
use App\Models\OtherOrder;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OtherOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherOrders = OtherOrder::orderByDesc('id')->get();
        // dd($otherOrders);
        return view('backend.pages.otherorder.otherorder', compact('otherOrders'));
    }


    public function OtherOrderExport(){
        return Excel::download(new OtherOrdertExport, 'otherdata.xlsx');
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
        try {
            
            $data = $request->all();

            if(!$request->order_no){
                $data['order_no'] =  uniqid();
            }

            $data['created_by'] = auth()->guard('admin')->user()->id ?? null;
            $orderorder   = OtherOrder::create($data);
            if(!$orderorder)
                throw new Exception("Unable to create Other Order!", 403);

            return response()->json([
                'success'   => true,
                'msg'       => 'Other Order Created Successfully!',
                'data'      => $orderorder
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(OtherOrder $otherOrder)
    {
        try {

            // dd($order);

            $pdf = PDF::loadView('backend.pages.otherorder.show_order', compact('otherOrder'), [], [
                'margin_left'   => 20,
                'margin_right'  => 15,
                'margin_top'    => 48,
                'margin_bottom' => 25,
                'margin_header' => 10,
                'margin_footer' => 10,
                'watermark'     => $this->setWaterMark($otherOrder),
            ]);


            // dd($pdf);

            return $pdf->stream('other_order_invoice_' . preg_replace("/\s/", '_', ($otherOrder->order_no ?? '')) . '_' . ($otherOrder->order_date ?? '') . '_.pdf');
        } catch (Exception $e) {
            dd($e->getMessage());
        }


        // return view('backend.pages.order.show_order', compact('order'));

    }


    private function setWaterMark($otherOrder)
    {
        return $otherOrder && ($otherOrder->total_order_price + $otherOrder->service_charge) - $otherOrder->advance_balance  <= 0 ? 'Paid': 'Due';
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
     * 
     * $data['order_no']               =  uniqid();
     */
    public function update(Request $request, OtherOrder $otherOrder)
    {
        try {

            $data = $request->all();

            $data['updated_by'] = auth()->guard('admin')->user()->id ?? null;
            $orderstatus        = $otherOrder->update($data);
            if(!$orderstatus)
                throw new Exception("Unable to Update Order!", 403);

            return response()->json([
                'success'   => true,
                'msg'       => 'Order Updated Successfully!'
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( OtherOrder $otherOrder)
    {
        try {

            $isDeleted = $otherOrder->delete();
            if(!$isDeleted)
                throw new Exception("Unable to delete Order!", 403);
                
            return response()->json([
                'success'   => true,
                'msg'       => 'Order Deleted Successfully!',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success'   => false,
                'msg'       => $th->getMessage()
            ]);
        }
    }



    public function datewise_report(Request $request)
    {

        $from   = $request->from_date;
        $to     = $request->to_date;

        if ($request->ajax()) {

            $q = OtherOrder::where('order_date', '>=', $from);

            if ($to) {
                $q->where('order_date', '<=', $to);
            }

            $orders = $q->get();

            return response()->json($orders);
        }


        return view('backend.pages.otherorder.datewise_other_report');
    }

    public function datewise_pdf(Request $request)
    {

        $from   = $request->from_date;
        $to     = $request->to_date;

        if(!$from){
            return back();
        }
            

        $q = OtherOrder::where('order_date', '>=', $from);

        if ($to) {
            $q->where('order_date', '<=', $to);
        }

        $orders = $q->get();

        $pdf = PDF::loadView('backend.pages.otherorder.pdf_view', compact('orders'), [], [
            'margin_left'   => 20,
            'margin_right'  => 15,
            'margin_top'    => 45,
            'margin_bottom' => 20,
            'margin_header' => 5,
            'margin_footer' => 5,
            'watermark'     => env('APP_NAME', 'Micro Media')
        ]);

        return $pdf->stream('getorderdata.pdf');
    }


}
