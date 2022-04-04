<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PurcahseProductStockReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data ? $this->data : [];
    }


    public function headings(): array {
        return [
            'Purchase Date', 
            'Supplier ID', 
            'Supplier Name', 
            'Total Payment', 
            'Total Payment Due',
            'Manage Stock',
            'Purchase Products',
            'Sales Price',
            'Category Name'
        ];
    }


}
