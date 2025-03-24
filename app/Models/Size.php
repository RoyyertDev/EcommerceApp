<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Size extends Model
{
    public $incrementing = false; // Desactiva autoincremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function characteristics()
    {
        return $this->hasMany(Characteristics::class);
    }
}
