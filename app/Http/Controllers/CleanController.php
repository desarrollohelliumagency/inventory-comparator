<?php

namespace App\Http\Controllers;

use App\Models\NewProduct;
use App\Models\OldProduct;
use App\Models\Option;
use Illuminate\Http\Request;

class CleanController extends Controller
{
    public function __invoke()
    {
        NewProduct::query()->truncate();
        OldProduct::query()->truncate();
        Option::where('name', 'primary_key_old')->delete();
        Option::where('name', 'primary_key_new')->delete();
        return redirect()->back()->with('success', 'Old products table cleared, New product table cleared');
    }
}
