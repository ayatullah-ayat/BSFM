<?php

namespace App\Http\Controllers\Admin;

use PDF;
use Exception;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SaleProduct;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view("backend.pages.sale.managesale", compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::where('is_active', 1)->where('is_block', 0)->get();

        return view('backend.pages.sale.addsale', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $data = $request->all();
            if(!$request->sale_date)
                throw new Exception("Please Select Sales Date!", 403);

            if(!$request->customer_id)
                throw new Exception("Please Select Customer!", 403);

            if(!array_key_exists('products', $data))
                throw new Exception("Product Missing!", 403);

            if(!count($data['products']))
                throw new Exception("Please select Product!", 403);


            $totalQtys = [];

            foreach ($data['products'] as $product) {

                if(!array_key_exists($product['product_id'], $totalQtys)){
                    $totalQtys[$product['product_id']] = 0;
                }

                $totalQtys[$product['product_id']] += intval($product['product_qty']);

            }

            DB::beginTransaction();

            $salesInvoice = uniqid();
                
            $sale = Sale::create([
                'customer_id'           => $data['customer_id'] ?? null,
                'customer_name'         => $data['customer_name'] ?? null,
                'sales_date'            => $data['sale_date'] ?? null,
                'invoice_no'            => $salesInvoice,
                'sold_sizes'            => null,
                'sold_colors'           => null,
                'sold_total_qty'        => 0,
                'sold_total_price'      => $data['order_subtotal'] ?? 0,
                'total_discount_price'  => $data['discount_price'] ?? 0,
                'order_grand_total'     => $data['order_grand_total'] ?? 0,
                'sales_note'            => null,
                'sold_by'               => auth()->guard('admin')->user()->id ?? null,
                'sold_by_name'          => auth()->guard('admin')->user()->name ?? null,
            ]);

            if(!$sale)
                throw new Exception("Unable to create Sale!", 403);

            $isFirstCheck = false;

            foreach ($data['products'] as $product) {

                $singleProduct = Product::find($product['product_id']);

                $soldProduct = $product + [
                    'invoice_no' => $salesInvoice,
                    'unit_price' => $singleProduct->unit_price ?? 0,
                ];

                $productCreate = $sale->saleProducts()->create($soldProduct);
                if(! $productCreate )
                    throw new Exception("Unable to create Product!", 403);

                if(!$isFirstCheck && $singleProduct->total_stock_qty < $totalQtys[$product['product_id']])
                    throw new Exception("{$singleProduct->product_name}, Available Stock: {$singleProduct->total_stock_qty}", 1);

                    
                if ($isFirstCheck && $singleProduct->total_stock_qty < intval($product['product_qty']))
                    throw new Exception("{$singleProduct->product_name}, Available Stock: {$singleProduct->total_stock_qty}", 1);
                    
                $isFirstCheck = true;

                $singleProduct->decrement('total_stock_qty', intval($product['product_qty']));
                $singleProduct->decrement('total_stock_price', intval($product['subtotal']));

                $singleProduct->increment('total_stock_out_qty', intval($product['product_qty']));
                $singleProduct->increment('total_stock_out_price', intval($product['subtotal']));
                    
            }

            $updateSale = $sale->update([
                'sold_sizes'            => $this->summary($salesInvoice, "group_concat(DISTINCT product_size) as result"),
                'sold_colors'           => $this->summary($salesInvoice, "group_concat(DISTINCT product_color) as result"),
                'sold_total_qty'        => $this->summary($salesInvoice, 'sum(product_qty) as result'),
            ]);

            if(!$updateSale)
                throw new Exception("Unable to Update Sale!", 403);
                

            // dd($data);

            DB::commit();

            return response()->json([
                'success' => true,
                'msg'     => 'Data store Successfully!'
            ]);


        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'msg'     => $th->getMessage()
            ]);
        }
    }


    private function summary($invoice_no,$select="*"){
        $result = SaleProduct::selectRaw($select)
            ->where('invoice_no', $invoice_no)
            ->groupBy('invoice_no')
            ->first();

        return $result ? $result->result : null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }


    public function showInvoice($invoice_no)
    {
        //

        $sale = Sale::where('invoice_no', $invoice_no)->first();

        try {

            $pdf = PDF::loadView('backend.pages.sale.invoice', compact('sale'), [], [
                'margin_left'   => 20,
                'margin_right'  => 15,
                'margin_top'    => 48,
                'margin_bottom' => 25,
                'margin_header' => 10,
                'margin_footer' => 10,
                'watermark'     => $this->setWaterMark($sale),
            ]);


            // dd($pdf);

            return $pdf->stream('sale_invoice_' . preg_replace("/\s/", '_', $invoice_no) . '_' . ($sale->sales_date ?? '') . '_.pdf');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function setWaterMark($sale)
    {
        return $sale && ($sale->order_grand_total <= $sale->total_payment) ? 'Paid' : 'Due';
    }



    public function getVariantsByProduct(Product $product)
    {
        $colors = $product->productColors;
        $sizes  = $product->productSizes;

        return response()->json([
            'colors' => $colors,
            'sizes' => $sizes,
            'product'=> $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
