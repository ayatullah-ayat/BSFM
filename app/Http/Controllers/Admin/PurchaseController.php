<?php

namespace App\Http\Controllers\Admin;

use Exception;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Currency;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use App\Models\ProductVariantPrice;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        
        return view('backend.pages.purchase.managepurchase', compact('purchases'));
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



    public function searchProduct()
    {

        $productName = request('term')['term'] ?? null;

        if (!$productName) return;

        $products = Product::where('product_name', 'like', "%{$productName}%")
                ->groupBy('id')
                ->orderByDesc('id')
                ->get();

        return response()->json($products);
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
            //

            $data               = $request->except('products');
            $data['created_by'] = auth()->guard('admin')->user()->id ?? null;
            $data['sizes']      = null;
            $data['colors']     = null;

            if(!isset($data['supplier_id']))
                throw new Exception("Please Select Supplier!", 403);

            if(!isset($data['purchase_date']))
                throw new Exception("Please Select Purchase Date!", 403);
                

            $sizes      = [];
            $colors     = [];
            $productData= [];
            
            $products = $request->products;
            foreach ($products as $product) {
                $colors= array_merge($colors, $product['product_colors']);
                $sizes = array_merge($sizes, $product['product_sizes']);
            }

            $data['sizes']          = count($colors) ? implode(",", $colors) : null;
            $data['colors']         = count($sizes) ? implode(",", $sizes) : null;
            $data['supplier_name']  = $this->supplierName($data['supplier_id']);

            // dd($data);

            DB::beginTransaction();

            $purchase = Purchase::create($data);
            if(!$purchase)
                throw new Exception("Unable to create Purchase!", 403);

            foreach ($products as $product){

                // product Not exists then create one 

                // $productResponse = $this->productByName($product['product_name']);

                // if(!$productResponse){
                //     //create product
                //     $productCreate = Product::create([
                //         'product_name'              => $product['product_name'] ?? null,
                //         'total_product_qty'         => intval($product['product_qty']),
                //         'total_product_unit_price'  => intval($product['product_price']),
                //         'total_stock_qty'           => intval($product['product_qty']),
                //         'total_stock_price'         => intval($product['product_price']),
                //         'currency'                  => $data['currency'],
                //         'product_unit'              => $product['product_unit'],
                //     ]);


                //     if (isset($product['product_colors']) && count($product['product_colors'])) {

                //         $colorNames = [];
                //         foreach ($product['product_colors'] as $colorName) {
                //             $colorNames[] = [
                //                 'product_id' => $productCreate->id,
                //                 'color_name' => $colorName
                //             ];
                //         }

                //         $productCreate->productColors()->createMany($colorNames);
                //     }



                //     if (isset($product['product_sizes']) && count($product['product_sizes'])) {

                //         $sizeNames = [];
                //         foreach ($product['product_sizes'] as $sizeName) {
                //             $sizeNames[] = [
                //                 'product_id' => $productCreate->id,
                //                 'size_name' => $sizeName
                //             ];
                //         }

                //         $productCreate->productSizes()->createMany($sizeNames);
                //     }


                // }else{

                //     // colors update 
                //     if(!$productResponse->is_product_variant){

                //     //     //update product 
                //     //     $productUpdate = Product::find($productResponse->id)
                //     //         ->update([
                //     //             'total_product_qty'         => $productResponse->total_product_qty + intval($product['product_qty']),
                //     //             'total_product_unit_price'  => $productResponse->total_product_unit_price + intval($product['product_price']),
                //     //             'total_stock_qty'           => $productResponse->total_stock_qty + intval($product['product_qty']),
                //     //             'total_stock_price'         => $productResponse->total_stock_price + intval($product['product_price']),
                //     //         ]);

                //     //     if (!$productUpdate)
                //     //         throw new Exception("Unable to Update Stock!", 403);

                //         $colorExists = $productResponse->productColors;

                //         if(!count($colorExists) && isset($product['product_colors']) && count($product['product_colors'])){

                //             $colorNames = [];
                //             foreach ($product['product_colors'] as $colorName) {

                //                 $colorNames=[
                //                     'product_id' => $productResponse->id,
                //                     'color_name' => $colorName
                //                 ];

                //                 $productResponse->productColors()->updateOrCreate($colorNames,$colorNames);
                //             }

                //         }



                //         if (!count($productResponse->productSizes) && isset($product['product_sizes']) && count($product['product_sizes'])) {

                //             $sizeNames = [];
                //             foreach ($product['product_sizes'] as $sizeName) {
                //                 $sizeNames = [
                //                     'product_id' => $productResponse->id,
                //                     'size_name' => $sizeName
                //                 ];

                //                 $productResponse->productSizes()->updateOrCreate($sizeNames, $sizeNames);
                //             }

                //         }

                //     }
                //     else{

                //         foreach ($product['product_sizes'] as $k =>  $sizeName) {

                //             $variant = ProductVariantPrice::where('product_id', $productResponse->id)
                //                     ->where('size_name', $sizeName)
                //                     ->where('color_name', $product['product_colors'][$k] ?? null)
                //                     ->first();

                //             if(!$variant){
                //                 //create 
                //                 ProductVariantPrice::create([
                //                     'product_id'    => $productResponse->id,
                //                     'size_name'     => $sizeName,
                //                     'color_name'    => $product['product_colors'][$k] ?? null,
                //                 ]);
                //             }
                //         }
                //     }
                        
                // }

                $productData[]= [
                    'product_colors'=> count($product['product_colors']) ? implode(",", $product['product_colors']) : null,
                    'product_sizes' => count($product['product_sizes']) ? implode(",", $product['product_sizes']) : null,
                    'purchase_id'   => $purchase->id,
                    'product_id'    => null,
                ] + $product;

            }


            $purchase->purchaseProducts()->createMany($productData);

            DB::commit();

            return response()->json([
                'success' => true,
                'msg'     => 'Purchased Successfully!'
            ]);


        } catch (\Throwable $th) {

            DB::rollback();
            return response()->json([
                'success' => false,
                'msg'     => $th->getMessage()
            ]);
        }
    }


    private function supplierName($id){
        $supplier = Supplier::find($id);
        return $supplier ? $supplier->supplier_name : null;
    }

    private function productByName($name){
        $product = Product::where('product_name',$name)->first();
        return $product;
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
        try {

            DB::beginTransaction();

            $purchase->delete();
            $purchase->purchaseProducts()->delete();

            DB::commit();

            return response()->json([
                'success'   => true,
                'msg'       => 'Deleted Successfully!',
            ]);

        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'success'   => false,
                'msg'       => $th->getMessage()
            ]);
        }
    }


    public function checkInvoice(){
        try {

            $invoice_no = request()->invoice;
            $purchase = Purchase::where('invoice_no', $invoice_no)->first();
            if ($purchase)
                throw new Exception("Invoice Already Exists!", 403);

            return response()->json([
                'success' => true,
                'msg'     => 'Invoice Not Found!'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'msg'     => $th->getMessage()
            ]);
        }
            
    }
}
