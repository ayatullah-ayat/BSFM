<?php 
namespace App\Http\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Exception;

trait ProductChecker
{
    

    private function createProduct(array $fields=[]){
        try {

            // $variants = $this->formatColorSizes($fields, 1);
            // // dd($variants);


            $product = Product::create($this->productFields($fields));
            if(!$product)
                throw new Exception("Unable to create product!", 403);

            $brand_id   = $fields['brand'] ?? null;
            $brand      = Brand::find($brand_id);
            if(!$brand)
                throw new Exception("No Brand Found!", 403);
 
            $product->brands()->attach($brand_id, ['brand_name' => $brand->brand_name]);

            $tags = [];
            if(count($fields['tags'])){
                foreach ($fields['tags'] as $tagName) {
                    $tags[]= [ 'tag_name' => $tagName ];
                }
            }
            
            $product->tags()->attach($tags);

            $product->productImages()->createMany($fields['product_gallerys']);

            // $variants = $this->formatColorSizes($fields, $product->id ?? null );

            // $product->variants()->attach([
            //     'product_id'        => null,
            //     'color_name'        => null,
            //     'size_name'         => null,
            //     'unit_price'        => null,
            //     'wholesale_price'   => null,
            //     'product_qty'       => null,
            //     'stock_qty'         => null,
            // ]);

                
            return [
                'success'   => true,
                'msg'       => 'Product Created Successfully!',
                'data'      => $product
            ];

        }  catch (\Throwable $th) {
            return [
                'success'   => false,
                'msg'       => $th->getMessage(),
                'data'      => null
            ];
        }
    }


    private function formatColorSizes($fields, $product){

        $variants =[];

        foreach ($fields['sizes'] as $data) {
            // dd($data);
            $variants[]=[
                'product_id'        => null,
                'color_name'        => null,
                'size_name'         => null,
                'unit_price'        => null,
                'wholesale_price'   => null,
                'product_qty'       => null,
                'stock_qty'         => null,
            ];
        }
    }


    private function updateProduct(array $fields=[], $id=null){
        try {

            $product = Product::where('id',$id)->update($fields);
            if(!$product)
                throw new Exception("Unable to Update Product!", 403);
                
            return [
                'success'   => true,
                'msg'       => 'Product Updated Successfully!',
                'data'      => Product::find($id)
            ];

        }  catch (\Throwable $th) {
            return [
                'success'   => false,
                'msg'       => $th->getMessage(),
                'data'      => null
            ];
        }
    }



    private function productFields($data=[])
    {

        try {

            $category       = Category::find($data['category_id'] ?? null);
            $subcategory    = Category::find($data['subcategory_id'] ?? null);

            if (!$category)
                throw new Exception("Category Not Found!", 403);

            if (!$subcategory)
                throw new Exception("Subcategory Not Found!", 403);

            return [
                'category_id'                   => $data['category_id'] ?? null,
                'subcategory_id'                => $data['subcategory_id'] ?? null,
                'category_name'                 => $category->category_name ?? null,
                'subcategory_name'              => $category->subcategory_name ?? null,
                'product_name'                  => $data['product_name'] ?? null,
                'product_sku'                   => $data['product_sku'] ?? uniqid(),
                'product_unit'                  => $data['product_unit'] ?? null,
                'product_description'           => $data['description'] ?? null,
                'product_specification'         => $data['specification'] ?? null,
                'product_thumbnail_image'       => $data['product_thumbnail_image'] ?? null,
                'product_discount'              => $data['discount'] ?? null,
                'total_product_qty'             => $data['product_qty'] ?? 0,
                'total_product_unit_price'      => $this->calcProductPrice(floatval($data['unit_price']) * intval($data['product_qty']),  intval($data['discount'] ?? 0)), 
                'total_product_wholesale_price' => $this->calcProductPrice(floatval($data['wholesale_price']) * intval($data['product_qty']),  intval($data['discount'] ?? 0)), 
                'total_stock_qty'               => $data['product_qty'] ?? 0,
                'total_stock_out_qty'           => 0,
                'total_stock_price'             => $this->calcProductPrice(floatval($data['unit_price']) * intval($data['product_qty']),  intval($data['discount'] ?? 0)),
                'total_stock_out_price'         => 0,
                'product_video_link'            => $data['product_video_link'] ?? null,
                'is_active'                     => $data['is_active'] ?? 0,
                'is_publish'                    => $data['is_publish'] ?? 0,
                'allowed_review'                => $data['allow_review'] ?? 0,
                'allowed_offer'                 => 0,
                'is_best_sale'                  => $data['is_best_sale'] ?? 0,
                'created_by'                    => auth()->guard('admin')->user()->id ?? null,
                'updated_by'                    => auth()->guard('admin')->user()->id ?? null,
                'currency'                      => $data['currency'] ?? null
            ];

        } catch (\Throwable $th) {
            return [
                'success' => false,
                'msg'     => $th->getMessage()
            ];
        }
    }



    private function calcProductPrice($totalPrice , $discount){

        if ($discount) {
            $discount   = $discount / 100;
            $totalPrice = $totalPrice - ($totalPrice * $discount);
        }

        return $totalPrice;

    }

    





}