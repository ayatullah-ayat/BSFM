<?php 
namespace App\Http\Services;

use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductTag;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Cookie;
use App\Models\Custom\CustomServiceProduct;

trait ProductSearch 
{
    


    private function ecommerceProduct($query=null, $orderBy= "created_at"){

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
                    ->orderBy("products.{$orderBy}")
                    ->orderBy('products.product_name')
                    ->orderBy('products.is_best_sale')
                    // ->where('id', $operator, $maxId)
                    // ->latest()
                    // ->limit($limit)
                    ->get();

            if(count($products)){
                $result = $products;
            }

            
        }
        
        return $result;

    }


    private function customizeProduct($query=null, $orderBy = "created_at"){

        $result = [];
        if($query){

            $products= CustomServiceProduct::orWhere('product_name', 'LIKE', "%{$query}%")
                    ->orWhere('category_name', 'LIKE', "%{$query}%")
                    ->orWhere('product_name', 'LIKE', "%{$query}%")
                    ->where('is_active', 1)
                    ->orderBy('product_name')
                    ->orderBy("{$orderBy}")
                    ->get();

            if(count($products)){
                $result = $products;
            }

            
        }
        
        return $result;

    }


    private function productCookies(){
        $userId = null;

        if (auth()->check()) {
            $userId = auth()->user()->id;
        }

        $productIds= Cookie::get('productIds');
        $cartQtys  = Cookie::get('cartQtys');
        $wishLists = Cookie::get('wishLists' . $userId);

        if (!is_null($productIds)) {

            $pureData = $this->protectBadData($productIds);

            if ($pureData !== false) {
                $productIds = $pureData;
            }

            if (is_null($productIds)) {
                $productIds = [];
            }
        } else {
            $productIds = [];
        }

        if (!is_null($cartQtys)) {

            $pureData = $this->protectBadData($cartQtys);

            if ($pureData !== false) {
                $cartQtys = $pureData;
            }

            if (is_null($cartQtys)) {
                $cartQtys = [];
            }
        } else {
            $cartQtys = [];
        }

        if (!is_null($wishLists)) {

            $pureData = $this->protectBadData($wishLists);

            if ($pureData !== false) {
                $wishLists = $pureData;
            }

            if (is_null($wishLists)) {
                $wishLists = [];
            }
        } else {
            $wishLists = [];
        }

        return [
            'productIds'    => $productIds,
            'wishLists'     => $wishLists,
            'cartQtys'      => $cartQtys,
        ];
    }



    private function protectBadData($reqdata)
    {
        $data = preg_replace_callback(
            '/s:(\d+):"(.*?)";/',
            function ($m) {
                return 's:' . strlen($m[2]) . ':"' . $m[2] . '";';
            },
            $reqdata
        );

        return @unserialize($data);
    }
    





}