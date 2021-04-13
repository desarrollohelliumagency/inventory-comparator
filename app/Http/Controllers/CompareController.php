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

            }else{
                $newStock[] = $new;
               

            }

        }

        // iterate over old products items, if product no exists in the new table the product is whitout stock
       /* foreach ($oldProducts as $old){
            $product = NewProduct::where('key', $old->key)->first();

            if(!isset($product->key)){
                $whithoutStock[] = $old;
                
            }
        }*/
        // insert whitout product
       /* foreach($whithoutStock as $item){
            $whithoutStockItem = WithoutStockProduct::updateOrCreate(
                ['key' => $item->key],
                ['quantity_on_hand' => $item->quantity_on_hand ?? '']
            );
        }*/
         // insert new product
     /*   foreach($newStock as $item){
            $newProductItem = NewInStockProduct::updateOrCreate(
                ['key' => $item->key],
                ['quantity_on_hand' => $item->quantity_on_hand ?? ''],
            );
        }*/
         // insert uodate product
     /*   foreach($updateProduct as $item){
            $updateProductItem = UpdateInStockProduct::updateOrCreate(
                ['key' => $item->key],
                [
                    'quantity_on_hand_before' => $item->quantity_on_hand ?? '',
                    'quantity_on_hand' => $item->quantity_on_hand ?? '',
                ],
            );
        }*/

        echo 'return whitout stock, new stock and updates';
        dd($whithoutStock, $newStock, $updateProduct);


    }
}
