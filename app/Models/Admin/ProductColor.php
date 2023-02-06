<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    protected $casts = [
        'colors' => 'array'
    ];
}
