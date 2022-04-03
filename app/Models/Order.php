<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{

    protected $guarded =['id'];
    protected $table = 'orders';
 
    public static function getOrderData(){
        $orderData = DB::table('orders')->select('id','order_no','order_date','customer_name','customer_phone','customer_email','order_total_qty','shipping_address','order_total_price')->get()->toArray();
        return $orderData;
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function scopeTotalPurchase($query, $status= "completed"){
        return $query->selectRaw('round(sum(order_details.purchase_price * order_details.product_qty),2) as result')
        ->where('status', $status)
        ->join('order_details', 'order_details.order_id', '=', 'orders.id');
    }

}
