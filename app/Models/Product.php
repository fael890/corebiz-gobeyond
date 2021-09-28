<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use HasFactory;

    protected $table = "table_vtex_products";

    protected $primaryKey = "productId";

    protected $fillable = [
        'productId',
        'productName',
        'brand',
    ];
    
}
