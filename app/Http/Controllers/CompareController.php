<?php

namespace App\Http\Controllers;

use App\Models\NewInStockProduct;
use App\Models\NewProduct;
use App\Models\OldProduct;
use App\Models\UpdateInStockProduct;
use App\Models\WithoutStockProduct;
use Illuminate\Http\Request;

/**
 * Class CompareController
 * @package App\Http\Controllers
 */
class CompareController extends Controller
{
    public function index()
    {
        $oldProducts = OldProduct::all();

        $newProducts = NewProduct::all();

        $whithoutStock = [];
        $updateProduct = [];
        $newStock = [];

        //iterate over new products if product no exist in old products table the product is new in stock
        foreach ($newProducts as $new){

            $product = OldProduct::where('key', $new->key)->first();

            if(isset($product->key)){

               $updateProduct[] = $new;

               $updateProductItem = UpdateInStockProduct::updateOrCreate(
                   ['key' => $new->key],
                   [
                       'quantity_on_hand_before' => $product->quantity_on_hand ?? '',
                       'quantity_on_hand' => $new->quantity_on_hand ?? '',
                   ],
               );

            }else{
                $newStock[] = $new;
                $newProductItem = NewInStockProduct::updateOrCreate(
                    ['key' => $new->key],
                    ['quantity_on_hand' => $new->quantity_on_hand ?? ''],
                );

            }

        }

        // iterate over old products items, if product no exists in the new table the product is whitout stock
        foreach ($oldProducts as $old){
            $product = NewProduct::where('key', $old->key)->first();

            if(!isset($product->key)){
                $whithoutStock[] = $old;
                $whithoutStockItem = WithoutStockProduct::updateOrCreate(
                    ['key' => $old->key],
                    ['quantity_on_hand' => $old->quantity_on_hand ?? '']
                );
            }
        }
        echo 'return whitout stock, new stock and updates';
        dd($whithoutStock, $newStock, $updateProduct);


    }
}
