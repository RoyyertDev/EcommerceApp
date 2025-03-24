<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sticky extends Model
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

    public function colorSticky()
    {
        return $this->hasMany(ColorSticky::class);
    }
}
