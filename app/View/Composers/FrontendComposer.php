<?php


namespace App\View\Composers;

use App\Http\Services\ProductSearch;
use App\Models\Custom\CustomServiceCategory;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class FrontendComposer
{
    use ProductSearch;

    public function compose(View $view)
    {

        $data = $this->productCookies();

        $productIds = $data['productIds'] ?? [];
        $wishLists  = $data['wishLists'] ?? [];
        $cartQtys   = $data['cartQtys'] ?? [];


        $customservicecategories = CustomServiceCategory::where('is_active', 1)->latest()
                                ->take(14)
                                ->get();

        $view->with(compact('productIds', 'cartQtys', 'wishLists', 'customservicecategories'));
    }

}
