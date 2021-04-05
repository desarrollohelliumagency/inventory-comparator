<?php

namespace App\Imports;

use App\Models\OldProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class OldProductsImport implements ToCollection, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row){
            //dd($row);
            OldProduct::create([
                'barcode' => $row['barcode'],
                'quantity_on_hand' => $row['quantity_on_hand']
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
