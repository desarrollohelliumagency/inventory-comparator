<?php

namespace App\Http\Controllers;

use App\Models\NewProduct;
use App\Models\OldProduct;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $oldProducts = OldProduct::all();
        $whithoutStock = [];
        $updateProduct = [];
        $newStock = [];

        $newProducts = NewProduct::all();
        foreach ($newProducts as $new){
            $product = OldProduct::where('key', $new->key)->first();

            if($product){
               $updateProduct[] = $new;
            }else{
                $newStock[] = $new;
            }
        }

        foreach ($oldProducts as $old){
            $product = NewProduct::where('key', $old->key)->first();

            if($product){
                //$updateProduct[] = $new;
            }else{
                $whithoutStock[] = $old;
            }
        }
        dd($whithoutStock, $newStock, $updateProduct);


    }
}
