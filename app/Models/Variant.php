<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variants';

    protected $fillable = [
        'product_id',
        'characteristic_id',
        'image',
        'price',
        'stock',
        'number_sales',
        'promotion',
        'discount',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristics::class, 'characteristic_id');
    }
}
