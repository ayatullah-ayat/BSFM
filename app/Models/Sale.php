<?php

namespace App\Models;

use App\Models\SaleProduct;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = ['id'];

    public function saleProducts()
    {
        return $this->hasMany(SaleProduct::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}
