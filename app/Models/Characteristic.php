<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Characteristic extends Model
{
    protected $table = 'characteristics';

    protected $fillable = ['color_sticky_id', 'size_id'];

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
        return $this->belongsTo(ColorSticky::class, 'color_sticky_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
