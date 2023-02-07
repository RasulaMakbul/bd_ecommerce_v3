<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function productColor()
    {
        return $this->hasMany(productColor::class, 'color_id', 'id');
    }
}
