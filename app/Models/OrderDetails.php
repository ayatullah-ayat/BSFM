<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
