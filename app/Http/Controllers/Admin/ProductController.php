<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use App\Models\Currency;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ImageChecker;
use App\Http\Controllers\Controller;
use App\Http\Services\ProductChecker;

class ProductController extends Controller
{
    use ImageChecker, ProductChecker;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.product.manageproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('category_name','id')->where('is_active',1)->get();
        $brands     = Brand::select('brand_name','id')->where('is_active',1)->get();
        $units      = Unit::select('unit_name','id')->where('is_active',1)->get();
        $currencies = Currency::select('currency_name','id')->where('is_active',1)->get();
        $colors     = Variant::select('variant_name','id')->where([ ['is_active', 1], ['variant_type', 'color']])->get();
        $sizes      = Variant::select('variant_name','id')->where([ ['is_active', 1], ['variant_type', 'size']])->get();
        // $tags       = ProductTag::all();

        return view('backend.pages.product.addproduct', compact('categories', 'brands', 'units', 'currencies','colors','sizes'));
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


            $data                       = $request->all();
            $product_thumbnail_image    = $request->product_thumbnail_image;
            $product_gallery            = $request->product_gallery;
            $fileLocation               = null;
            $product_thumbnail_image    = $product_thumbnail_image && count(json_decode($product_thumbnail_image)) > 0 ? json_decode($product_thumbnail_image)[0] : null;
            $product_gallery_images     = $product_gallery && count(json_decode($product_gallery)) > 0 ? json_decode($product_gallery) : null;

            if ($product_thumbnail_image) {
                $fileResponse = $this->uploadFile($product_thumbnail_image, 'products/');
                if (!$fileResponse['success'])
                    throw new Exception($fileResponse['msg'], $fileResponse['code'] ?? 403);

                $fileLocation = $fileResponse['fileLocation'];
                $data['product_thumbnail_image'] = $fileLocation;
            }

            $data['product_gallerys']=[];
            if ($product_gallery_images) {

                foreach ($product_gallery_images as $image) {
                    $fileResponse = $this->uploadFile($image, 'products/');
                    if (!$fileResponse['success'])
                        throw new Exception($fileResponse['msg'], $fileResponse['code'] ?? 403);
    
                    $fileLocation = $fileResponse['fileLocation'];
                    $data['product_gallerys'][]= ['product_image' => $fileLocation];
                }
            }

            DB::beginTransaction();

            // create product 
            $productData = $this->createProduct($data);

            // create product variants
            // $product->brands()->attach($brands);
            // $product->sizes()->attach($sizes);
            // $product->colors()->attach($colors);
            // $product->tags()->attach($tags);

            // 

            // dd($productData);
            if(!$productData['success'])
                throw new Exception($productData['msg'] ?? "Unable to Create Product!", 403);

            DB::commit();

            return response()->json([
                'success'   => true,
                'msg'       => $productData['msg'] ?? 'Success!',
                'data'      => $productData['data'] ?? null
            ]);
                
        } catch (\Exception $th) {

            DB::rollback();

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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
