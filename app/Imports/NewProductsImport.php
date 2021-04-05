<?php

namespace App\Imports;

use App\Models\NewProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class NewProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $rows
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            NewProduct::create([
                'barcode' => $row['barcode'],
                'quantity_on_hand' => $row['quantity_on_hand']
            ]);
        }
    }
}
