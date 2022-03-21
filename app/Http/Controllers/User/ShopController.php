<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductTag;
use App\Models\Subcategory;
use App\Models\Variant;
use Illuminate\Support\Facades\Cookie;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id')
                    ->where('is_active', 1)
                    ->where('is_publish', 1)
                    ->get();

       $categories = Category::with('subCategories')
                    ->where('is_active', 1)
                    ->orderByDesc('id')
                    ->get();


       $productColors = Variant::orderByDesc('id')
                    ->where('variant_type', 'color')
                    ->where('is_active', 1)
                    ->get();

       $productSize = Variant::orderByDesc('id')
                    ->where('variant_type', 'size')
                    ->where('is_active', 1)
                    ->get();

       $tags = ProductTag::groupBy('tag_name')->get();

       $maxSalesPrice = Product::selectRaw('ceil((max(total_product_unit_price) - max(total_product_unit_price) * (product_discount / 100)) / total_product_qty)  as max_sale_price')
                    ->where('is_active', 1)
                    ->where('is_publish', 1)
                    ->first();

        return view('frontend.pages.shop', compact('products' ,'tags', 'categories' , 'productColors' , 'productSize', 'maxSalesPrice'));
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
    public function show(Product $product, $slug=null)
    {

        if(!$product) abort(404, "Product Not Found!");

        $otherProducts = Product::where('category_id', $product->category_id)
                        ->where('id','!=', $product->id)
                        ->where('is_active', 1)
                        ->where('is_publish', 1)
                        ->get();

        return view('frontend.pages.product_detail', compact('product', 'otherProducts'));
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
