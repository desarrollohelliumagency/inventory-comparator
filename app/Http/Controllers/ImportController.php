<?php

namespace App\Http\Controllers;

use App\Imports\OldProductsImport;
use App\Imports\NewProductsImport;
use App\Models\Option;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ImportController
 * @package App\Http\Controllers
 */
class ImportController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function old(Request $request)
    {
        $option = Option::firstOrCreate(
            ['name' => 'primary_key_old'],
            ['value' => $request->input('primary_key_old')]
        );
        //dd($option);

        if(Excel::import(new OldProductsImport, $request->file('products_old_file'))){
            return back()->with('success', 'Old Inventory saved in database');
        }else{
            return 'algo paso';
        }


    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function new(Request $request)
    {
        $option = Option::firstOrCreate(
            ['name' => 'primary_key_new'],
            ['value' => $request->input('primary_key_new')]
        );

        Excel::import(new NewProductsImport, $request->file('products_new_file'));
        return back()->with('success', 'New Inventory saved in database');
    }
}
