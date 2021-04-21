<?php

namespace App\Imports;

use App\Models\NewProduct;
use App\Models\Option;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class NewProductsImport implements ToCollection, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param Collection $rows
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection( Collection $rows)
    {
        $option = Option::where(['name' => 'primary_key_new'])->first();

        $column_values = "Quantity On Hand";
        $column_values = strtolower(str_replace(' ', '_', $column_values));
        $column_key = strtolower(str_replace(' ', '_', $option->value));

        foreach ($rows as $row){

            if(!isset($row[$column_key])){
                return null;
            }

            NewProduct::updateOrCreate(
                ['key' => $row[$column_key]],
                ['quantity_on_hand' => $row[$column_values]]
            );
        }
    }
}
