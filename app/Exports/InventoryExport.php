<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromArray, WithHeadings
{
    //array of items
    protected $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * @return array
     * return array items
     */
    public function array(): array
    {
        return $this->items;
    }

    /**
     * @return string[]
     * Headings for excel export
     */
    public function headings(): array
    {
        return [
            'key',
            'quantity',
            'status'
        ];
    }
}
