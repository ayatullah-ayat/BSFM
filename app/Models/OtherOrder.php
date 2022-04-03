<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OtherOrder extends Model
{
    protected $guarded = ['id'];

    protected $table = 'other_orders';

    public static function getOtherOrderData(){
        $otherdata = DB::table('other_orders')->select('id','order_date','order_no','category_name','order_qty','price','total_order_price','advance_balance','due_price','moible_no','institute_description','note')->get()->toArray();
        return $otherdata;
    }
}
