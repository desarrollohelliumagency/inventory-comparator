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
        $oldProducts = OldProduct::all()->toArray();

        $newProducts = NewProduct::all()->toArray();

        $whithoutStock = [];
        $updateProduct = [];
        $updateProductEquals = [];
        $updateProductPlus = [];
        $updateProductMinus = [];
        $newStock = [];

        //iterate over new products list
        //if product key is find then the product is update list
        //asign if sum, minus or equal quantity on hand
        foreach ($newProducts as $newProduct){
            $encontrado = false;
            foreach ($oldProducts as $oldProduct){

                if($newProduct['key'] == $oldProduct['key']){

                    $encontrado = true;
                    $newProduct['old_quantity_on_hand'] = $oldProduct['quantity_on_hand'];

                    if($newProduct['quantity_on_hand'] == $oldProduct['quantity_on_hand']){
                        $updateProductEquals[] = $newProduct;
                    }elseif ($newProduct['quantity_on_hand'] > $oldProduct['quantity_on_hand']){
                        $updateProductPlus[] = $newProduct;
                    }else{
                        $updateProductMinus[] = $newProduct;
                    }

                }
            }

            if(!$encontrado){
                $newStock[] = $newProduct;
            }
        }



        foreach($oldProducts as $oldProduct) {

            $encontrado = false;

            foreach ($newProducts as $newProduct) {
                if ($oldProduct['key'] == $newProduct['key']) {
                    $encontrado = true;
                    break;
                }
            }

            if(!$encontrado){
               $whithoutStock[] = $oldProduct;
            }
        }


        return view('compare.results', compact(
            'newStock',
            'updateProductPlus',
            'updateProductMinus',
            'updateProductEquals',
            'whithoutStock'
        ));





    }
}
