<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DatePurchaseReportExport;
use App\Exports\DateSalesReportExport;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function datesalesreportexport( Request $request){
        $from   = $request->from_date;
        $to     = $request->to_date;

        $q = Sale::select(  
            'invoice_no',
            'customer_name',
            'sales_date',
            'sold_total_qty',
            'order_grand_total'
        )->where('sales_date','>=',$from);

        if($to){
            $q->where('sales_date', '<=', $to);
        }

        $sales = $q->get();

        return Excel::download(new DateSalesReportExport($sales), 'sales_report.xlsx');
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

    public function purchasereportexport(Request $request){

        $from   = $request->from_date;
        $to     = $request->to_date;

        $q = Purchase::select(
            'invoice_no',
            'supplier_name',
            'purchase_date',
            'total_qty',
            'total_price'
        )->where('purchase_date', '>=', $from);

        if ($to) {
            $q->where('purchase_date', '<=', $to);
        }

        $purchases = $q->get();

        // dd($purchases);

        return Excel::download(new DatePurchaseReportExport($purchases), 'purchase_report.xlsx');
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
