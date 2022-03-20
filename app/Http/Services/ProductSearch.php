<?php 
namespace App\Http\Services;

use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTag;
use App\Models\Subcategory;
use App\Models\Custom\CustomServiceProduct;

trait ProductSearch 
{
    


    private function ecommerceProduct($query=null){

        $result = [];
        if($query){

            $products=Product::orWhere('products.product_name', 'LIKE', "%{$query}%")
                    ->leftJoin('product_tags', 'product_tags.product_id','=', 'products.id')
                    ->leftJoin('product_brand', 'product_brand.product_id','=', 'products.id')
                    ->orWhere('product_tags.tag_name', 'LIKE', "%{$query}%")
                    ->orWhere('product_brand.brand_name', 'LIKE', "%{$query}%")
                    ->orWhere('products.category_name', 'LIKE', "%{$query}%")
                    ->orWhere('products.subcategory_name', 'LIKE', "%{$query}%")
                    ->where('products.is_publish', 1)
                    ->where('products.is_active', 1)
                    ->groupBy('products.id')
                    ->orderBy('products.product_name')
                    ->orderBy('products.is_best_sale')
                    ->get();

            if(count($products)){
                $result = $products;
            }

            
        }
        
        return $result;

    }


    private function customizeProduct($query=null){

        $result = [];
        if($query){

            $products= CustomServiceProduct::orWhere('product_name', 'LIKE', "%{$query}%")
                    ->orWhere('category_name', 'LIKE', "%{$query}%")
                    ->orWhere('product_name', 'LIKE', "%{$query}%")
                    ->where('is_active', 1)
                    ->orderBy('product_name')
                    ->get();

            if(count($products)){
                $result = $products;
            }

            
        }
        
        return $result;

    }

    





}