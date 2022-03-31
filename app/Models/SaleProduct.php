<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $guarded = ['id'];
    
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
