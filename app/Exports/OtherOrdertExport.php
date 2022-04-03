<?php

namespace App\Exports;

use App\Models\OtherOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OtherOrdertExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array {
        return [
            'ID',
            'Order Date',
            'Order NO',
            'Category Name',
            'Quantity',
            'Price',
            'Total Price',
            'Advaced Amount',
            'Due Amount',
            'Mobile',
            'Institute Description',
            'Note'
        ];
    }

    public function collection()
    {
        return collect(OtherOrder::getOtherOrderData());
    }


}
