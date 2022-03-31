<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Custom\CustomServiceOrder;
use App\Models\Custom\CustomServiceProduct;
use App\Models\Custom\OurCustomService;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseProduct;
use App\Models\PurchaseReturn;
use App\Models\Review;
use App\Models\Sale;
use App\Models\SaleProduct;
use App\Models\SaleReturn;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalsalesprice    = Sale::sum('order_grand_total');
        $totalsalesqty      = Sale::sum('sold_total_qty');

        $totalreturnprice   = SaleReturn::sum('subtotal');
        $totalreturnqty     = SaleReturn::sum('returned_qty');
        // dd($totalsales);
        $customers          = Customer::count();
        $products           = Product::count();
        $suppliers          = Supplier::count();
        $totalreview        = Review::count();
        $totalorder         = Order::count();


        // $totalpurchase      = Purchase::count();
        $totalpurchaseprice = PurchaseProduct::sum('subtotal');
        $totalpurchaseqty   = PurchaseProduct::sum('product_qty');
        $purchasereturnprice= PurchaseReturn::sum('subtotal');
        $purchasereturnqty  = PurchaseReturn::sum('returned_qty');

        $activeproduct      = Product::where('is_active', 1)->count();
        $unpublisproduct    = Product::where('is_publish', 0)->count();

        $confirmorder       = Order::where('status', 'confirm')->count();
        $pendingorder       = Order::where('status', 'pending')->count();
        $processingorder    = Order::where('status', 'processing')->count();
        $completedorder     = Order::where('status', 'completed')->count();
        $cancelorder        = Order::where('status', 'cancelled')->count();

        $totalstockqty      = Product::where('is_active', 1)->sum('total_stock_qty');
        $totalstockprices   = Product::where('is_active', 1)->sum('total_stock_price');
        $totaloutstockqty   = Product::where('is_active', 1)->sum('total_stock_out_qty');
        $totaloutstockprices= Product::where('is_active', 1)->sum('total_stock_out_price');

        
        // dd($totaloutstockqty);

        // custom services data
        $customservices         = OurCustomService::count();
        $customproducts         = CustomServiceProduct::count();
        $customorders           = CustomServiceOrder::count();

        $customactiveproducts   = CustomServiceProduct::where('is_active', 1)->count();
        $customorderconfirm     = CustomServiceOrder::where('status', 'confirm')->count();
        $customorderpending     = CustomServiceOrder::where('status', 'pending')->count();
        $customorderprocessing  = CustomServiceOrder::where('status', 'processing')->count();
        $customordercomplete    = CustomServiceOrder::where('status', 'completed')->count();
        $customordercancel      = CustomServiceOrder::where('status', 'cancelled')->count();

        
        $orderdata = Order::latest()->take(20)->get();
        // dd($customorders);

        $totaldeliveredprice  =  Order::where('status','completed')->sum('order_total_price');
        $totalrevinue         = $totalsalesprice +  $totaldeliveredprice;

        $total_order_purchase  = Order::selectRaw('round(sum(products.purchase_price * order_details.product_qty),2) as result')->where('status','completed')
                            ->join('order_details','order_details.order_id','=','orders.id')
                            ->join('products','order_details.product_id','=','products.id')
                            ->first();

        $total_sale_purchase  = SaleProduct::selectRaw('round(sum(products.purchase_price * sale_products.product_qty),2) as result')
                            ->join('products','sale_products.product_id','=','products.id')
                            ->first();

        $totalOrderPurchase = $total_order_purchase ? $total_order_purchase->result : 0;
        $totalSalePurchase  = $total_sale_purchase ? $total_sale_purchase->result : 0;
        $totalpurcahsecost  = floatval($totalOrderPurchase) + floatval($totalSalePurchase);
        $totalprofit        = round($totalrevinue - $totalpurcahsecost);
        
        // dd($totalprofit, $totalrevinue, $totalpurcahsecost);

        return view('backend.dashboard' , compact(
            'totalsalesprice',
            'totalsalesqty',
            'totalreturnprice',
            'totalreturnqty',
            'totalpurchaseprice',
            'totalpurchaseqty',
            'purchasereturnprice',
            'purchasereturnqty',
            'customers',
            'products',
            'suppliers',
            'orderdata',
            'totalreview',
            'activeproduct',
            'unpublisproduct',
            'totalorder',
            'confirmorder',
            'pendingorder',
            'processingorder',
            'completedorder',
            'customservices',
            'customproducts',
            'totalstockqty',
            'totalstockprices',
            'totaloutstockqty',
            'totaloutstockprices',
            'customactiveproducts',
            'customorders',
            'customorderconfirm',
            'customorderpending',
            'customorderprocessing',
            'customordercomplete',
            'customordercancel',
            'totalprofit'
        ));

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
