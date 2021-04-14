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
        $oldProducts = OldProduct::all('key')->toArray();
   
        $newProducts = NewProduct::all('key')->toArray();

        $whithoutStock = [];
        $updateProduct = [];
        $newStock = [];

        foreach($oldProducts as $oldprouct){
            $newItem = array_search($oldprouct, $newProducts);
           
            if($newItem !== false){
               
                $oldItem = array_search($oldprouct, $oldProducts);
       
                $updateProduct[] = $oldprouct;

                unset($oldProducts[$oldItem]);
                unset($newProducts[$newItem]);
            }else{
         
                $whithoutStock[] = $oldprouct;
                $newItem = array_search($oldprouct['key'], $newProducts);
                unset($newProducts[$newItem]);
            }
        }

        foreach($newProducts as $newProuct){
            
            $oldItem = array_search($newProuct, $oldProducts);
            
            if($oldItem == false){
               $newStock[] = $newProuct;
            }
        }

        return view('compare.results', compact('newStock', 'updateProduct', 'whithoutStock'));
   

     


    }
}
