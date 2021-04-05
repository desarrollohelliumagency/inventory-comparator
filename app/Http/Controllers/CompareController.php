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

        $testOld = OldProduct::where('barcode', '5604447082503')->get();
        //dd(empty($testOld));
        $testNew = NewProduct::where('barcode', '5604447082503')->get();
        //dd($testOld, $testNew);
        $newProducts = NewProduct::all();
        foreach ($newProducts as $new){
            echo 'new: ' . $new->barcode . '<br>';
            $product = OldProduct::where('barcode', $new->barcode)->first();
            //echo $product;

            if($product){
               $updateProduct[] = $new;
            }else{
                $newStock[] = $new;
            }
        }

        foreach ($oldProducts as $old){
            echo 'old: ' . $old->barcode . '<br>';
            $product = NewProduct::where('barcode', $old->barcode)->first();
            //echo $product;

            if($product){
                //$updateProduct[] = $new;
            }else{
                $whithoutStock[] = $old;
            }
        }
        dd($whithoutStock);


    }
}
