<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithoutStockProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'Barcode',
        'Quantity On Hands'
    ];
    protected $table = 'update_in_stock_products';
    protected $primaryKey = 'Barcode';
}
