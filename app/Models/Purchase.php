<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{

    public function purchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class);
    }
    
}
