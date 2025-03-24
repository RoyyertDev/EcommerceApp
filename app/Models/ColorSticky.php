<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ColorSticky extends Model
{
    protected $table = 'color_sticky';

    protected $fillable = ['color_id', 'sticky_id'];

    public $incrementing = false; // Desactiva autoincremento
    protected $keyType = 'string'; // Define la clave primaria como string

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function sticky()
    {
        return $this->belongsTo(Sticky::class, 'sticky_id');
    }

    public function characteristics()
    {
        return $this->hasMany(Characteristics::class);
    }
}
