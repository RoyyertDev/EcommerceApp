<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'type_product_id',
        'category_product_id',
        'material_product_id',
    ];

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'type_product_id');
    }

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

    public function materialProducts()
    {
        return $this->belongsTo(MaterialProduct::class, 'material_product_id');
    }

    public function variants()
    {
        return $this->hasMany(Variant::class, 'product_id');
    }
}
