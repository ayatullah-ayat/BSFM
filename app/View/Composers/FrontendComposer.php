<?php


namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class FrontendComposer
{

    public function compose(View $view)
    {
        $userId = null;

        if(auth()->check()){
            $userId = auth()->user()->id;
        }

        $productIds= Cookie::get('productIds');
        $cartQtys  = Cookie::get('cartQtys');
        $wishLists = Cookie::get('wishLists'. $userId);

        if (!is_null($productIds)) {

            $pureData = $this->protectBadData($productIds);

            if($pureData !== false){
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

            if(is_null($cartQtys)){
                $cartQtys = [];
            }


        } else {
            $cartQtys = [];
        }

        // dd($cartQtys);

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


        $view->with(compact('productIds', 'cartQtys', 'wishLists'));
    }



    private function protectBadData($reqdata){
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
