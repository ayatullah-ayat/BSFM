<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array {
        return [
            'id',
            'user_id',
            'customer_id',
            'customer_name',
            'customer_phone',
            'customer_email',
            'order_date',
            'order_no',
            'order_total_qty',
            'order_total_price'
        ];
    }

    public function collection()
    {
        // return Order::all();

        return collect(Order::getOrderData());
    }
}
