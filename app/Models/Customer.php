<?php

namespace App\Models;

use App\Models\Product;
use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
