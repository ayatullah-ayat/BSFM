<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OfficeAccount extends Model
{
    protected $guarded = ['id'];

    protected $table = 'office_accounts';
 
    public static function getOfficeAccountData(){
        $orderData = DB::table('office_accounts')->select('id','date','account_type','description','cash_in','cash_out','current_balance','note')->get()->toArray();
        return $orderData;
    }
}
