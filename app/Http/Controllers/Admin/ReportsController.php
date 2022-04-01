<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Sales report
     */
    public function salesreport(Request $request){

        $from   = $request->from_date;
        $to     = $request->to_date;

        if($request->ajax()){

            $q = Sale::where('sales_date','>=',$from);

            if($to){
                $q->where('sales_date', '<=', $to);
            }

            $sales = $q->get();

            return response()->json($sales);
        }


        return view('backend.pages.report.salesreport');
    }

    /**
     * purchase report
     */
    public function purchasereport(Request $request){

        $from   = $request->from_date;
        $to     = $request->to_date;

        if ($request->ajax()) {

            $q = Purchase::where('purchase_date', '>=', $from);

            if ($to) {
                $q->where('purchase_date', '<=', $to);
            }

            $purchases = $q->get();

            return response()->json($purchases);
        }


        return view('backend.pages.report.purchasereport');
    }

    /**
     * Product tax report
     */
    public function producttaxreport(){
        return view('backend.pages.report.producttaxreport');
    }

    /**
     * Invoice tax report
     */

     public function invoicetaxreport(){
         return view('backend.pages.report.invoicetaxreport');
     }

}
