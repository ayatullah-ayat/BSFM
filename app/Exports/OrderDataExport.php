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
            'ID',
            'Order NO',
            'Order Date',
            'Customer Name',
            'Customer Phone',
            'Customer Email',
            'Total Order Qty',
            'Shipping Address',
            'Total Price'
        ];
    }

    public function collection()
    {
        return collect(Order::getOrderData());
    }
}
