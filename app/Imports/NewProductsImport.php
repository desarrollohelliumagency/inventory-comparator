<?php

namespace App\Imports;

use App\Models\NewProduct;
use App\Models\Option;
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
    public function collection( Collection $rows)
    {
        $options = Option::where(['name' => 'primary_key_new'])->first();
        foreach ($rows as $row){
            NewProduct::create([
                'key' => $row[$options->value],
                'quantity_on_hand' => $row['quantity_on_hand']
            ]);
        }
    }
}
