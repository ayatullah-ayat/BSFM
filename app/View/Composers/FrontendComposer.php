<?php


namespace App\View\Composers;

use App\Models\WebFooter;
use Illuminate\View\View;
use App\Models\SocialIcon;
use Illuminate\Support\Str;
use App\Http\Services\ProductSearch;
use Illuminate\Support\Facades\Cookie;
use App\Models\Custom\CustomServiceCategory;

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


        $sociallink = SocialIcon::where('is_active', 1)->first();
        $footerabout = WebFooter::where('is_active', 1)->first();

        $view->with(compact('productIds', 'cartQtys', 'wishLists', 'customservicecategories', 'sociallink', 'footerabout'));
    }

}
