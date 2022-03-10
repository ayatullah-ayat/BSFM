<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
