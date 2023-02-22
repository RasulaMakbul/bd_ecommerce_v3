<?php

namespace App\Models\Admin;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productColor()
    {
        return $this->hasMany(productColor::class, 'product_id', 'id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->orderBy('id', 'desc');
    }




    protected $casts = [
        'images' => 'array'
    ];
}
