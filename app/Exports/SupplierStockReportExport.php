<?php

namespace App\Exports;

use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupplierStockReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
        // dd($this->data);
    }
    public function collection()
    {
        return $this->data ? $this->data : [];
    }


    public function headings(): array {
        return [
            'Product', 
            'Category',
            'Sales Price',
            'Manage Stock',
            'Purchase Products',
            'In Qty',
            'Out Qty',
            'Return Qty'
        ];
    }

    
}
