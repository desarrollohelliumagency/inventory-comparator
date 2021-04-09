<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewInStockProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'Quantity On Hands'
    ];
    protected $table = 'new_in_stock_products';
    protected $primaryKey = 'Barcode';
}
