<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Model;
use App\Models\Custom\CustomServiceProduct;

class CustomServiceCategory extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(CustomServiceProduct::class);
    }
}
