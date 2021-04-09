<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateInStockProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'Quantity On Hand before',
        'Quantity On Hands'
    ];
    protected $table = 'update_in_stock_products';
    protected $primaryKey = 'Barcode';
}
