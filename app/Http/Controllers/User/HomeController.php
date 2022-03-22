<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Custom\CustomServiceCategory;
use App\Models\Custom\CustomServiceProduct;
use App\Models\Custom\OurCustomService;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customservices = OurCustomService::where('is_active',1)
                        ->orderByDesc('id')
                        ->get();

        $customservicecategories = CustomServiceCategory::where('is_active', 1)
                                ->orderByDesc('id')
                                ->get();

        $serviceproducts        = CustomServiceProduct::get();

        $shopbanner = Shop::where('is_active', 1)->first();

        // dd( $shopbanners);

        return view('frontend.pages.home', compact('customservices' , 'customservicecategories' , 'serviceproducts', 'shopbanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProduct($category_id)
    {
        try {

            $products = CustomServiceProduct::where([
                ['category_id', $category_id],
                ['is_active', 1]
            ])
            ->get();
            
            return response()->json($products);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


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
    public function show($id)
    {
        //
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
