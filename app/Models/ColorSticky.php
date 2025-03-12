<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorSticky extends Model
{
    protected $table = 'color_sticky';

    protected $fillable = ['color_id', 'sticky_id'];

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
