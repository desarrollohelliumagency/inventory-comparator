<?php

namespace App\Imports;

use App\Models\OldProduct;
use App\Models\Option;
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
        $option = Option::where(['name' => 'primary_key_old'])->first();
        $column_values = "Quantity On Hand";
        $column_values = strtolower(str_replace(' ', '_', $column_values));
        $column_key = strtolower(str_replace(' ', '_', $option->value));

        foreach ($rows as $row){

            if(!isset($row[$column_key])){
                dd($row[$option->value]);
            }
            //dd();
            OldProduct::create([
                'key' => $row[$column_key],
                'quantity_on_hand' => $row[$column_values]
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
