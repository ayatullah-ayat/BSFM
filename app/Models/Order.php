<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded =['id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    public function scopeTotalPurchase($query, $status= "completed"){
        return $query->selectRaw('round(sum(products.purchase_price * order_details.product_qty),2) as result')
        ->where('status', $status)
        ->join('order_details', 'order_details.order_id', '=', 'orders.id')
        ->join('products', 'order_details.product_id', '=', 'products.id');
    }
}
