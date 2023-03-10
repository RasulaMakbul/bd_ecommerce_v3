<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function productColor()
    {
        return $this->hasMany(productColor::class, 'product_id', 'id');
    }
}
