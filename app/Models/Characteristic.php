<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    protected $table = 'characteristics';

    protected $fillable = ['color_sticky_id', 'size_id'];

    public function colorSticky()
    {
        return $this->belongsTo(ColorSticky::class, 'color_sticky_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
