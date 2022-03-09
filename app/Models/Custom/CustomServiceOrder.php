<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;
use App\Models\Custom\CustomServiceCustomer;

class CustomServiceOrder extends Model
{
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(CustomServiceCustomer::class);
    }
}
