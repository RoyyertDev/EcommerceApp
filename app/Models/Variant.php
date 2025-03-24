<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    
    public $incrementing = false; // Desactiva autoincremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class, 'characteristic_id');
    }
}
