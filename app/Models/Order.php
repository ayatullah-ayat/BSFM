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
        
        $orderData = DB::table('orders')
                    ->select(
                    'order_date',
                    'order_no',
                    'order_sizes',
                    'order_colors',
                    'order_total_qty',
                    'discount_price',
                    'order_total_price',
                    'customer_name',
                    'customer_phone',
                    'payment_type',
                    'payment_total_price',
                    'order_note',
                    'status',
                    )
                    ->get()
                    ->toArray(); 

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
