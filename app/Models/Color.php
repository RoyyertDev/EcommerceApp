<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //Quitar en producción
    protected $fillable = ['name', 'hexadecimal'];

    public function colorSticky()
    {
        return $this->hasMany(ColorSticky::class);
    }
}
