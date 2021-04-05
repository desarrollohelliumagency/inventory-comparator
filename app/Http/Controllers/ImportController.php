<?php

namespace App\Http\Controllers;

use App\Imports\OldProductsImport;
use App\Imports\NewProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function old(Request $request)
    {
        Excel::import(new OldProductsImport, $request->file('products_old_file'));
        return back()->with('success', 'Old Inventory saved in database');
    }

    public function new(Request $request)
    {
        Excel::import(new NewProductsImport, $request->file('products_new_file'));
        return back()->with('success', 'New Inventory saved in database');
    }
}
