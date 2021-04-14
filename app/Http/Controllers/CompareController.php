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
        //dd($oldProducts);
        $newProducts = NewProduct::all('key')->toArray();

        $whithoutStock = [];
        $updateProduct = [];
        $newStock = [];

//        dd($oldProducts);

        ///probe if iterate over arrays.
        foreach($oldProducts as $oldprouct){
            $newItem = array_search($oldprouct, $newProducts);
            //var_export($newItem);
            //echo '<br>----<br>';
            if($newItem !== false){
                //echo $oldprouct['key'] . ' Is update product <br>';
                $oldItem = array_search($oldprouct, $oldProducts);
                //$newItem = array_search($oldprouct, $newProducts);
                $updateProduct[] = $oldprouct;

                //var_export($oldItem);
                //echo '<br>';
                //var_export($newItem);
                //echo '<br>';
                unset($oldProducts[$oldItem]);
                unset($newProducts[$newItem]);
            }else{
                //echo $oldprouct['key'] . ' Is Whitout stock product <br>';
                $whithoutStock[] = $oldprouct;
                $newItem = array_search($oldprouct['key'], $newProducts);
                unset($newProducts[$newItem]);
            }
        }

        foreach($newProducts as $newProuct){
            
            $oldItem = array_search($newProuct, $oldProducts);
            
            if($oldItem == false){
                //echo $newProuct['key'] . ' Is new product <br>';
                $newStock[] = $newProuct;
            }
        }

        //dd($whithoutStock);

        return view('compare.results', compact('newStock', 'updateProduct', 'whithoutStock'));
/*
test for future csv download
        ob_start();

        // Set the content type 
        header('Content-type: application/csv');
        // Set the file name option to a filename of your choice.
        header('Content-Disposition: attachment; filename=myCSV.csv');
        // Set the encoding
        header("Content-Transfer-Encoding: UTF-8");
        
        $out = fopen('php://output', 'w');
        fputcsv($out, $updateProduct);
        fclose($out);

        ob_end_flush();

*/
        

     


    }
}
