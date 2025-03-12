<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sticky extends Model
{
    public function colorSticky()
    {
        return $this->hasMany(ColorSticky::class);
    }
}
