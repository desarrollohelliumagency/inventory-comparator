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
        //dd($option->value);
        foreach ($rows as $row){
            OldProduct::create([
                'key' => $row[$option->value],
                'quantity_on_hand' => $row['quantity_on_hand']
            ]);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
