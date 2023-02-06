<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::where('status', '1')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        // dd($category);
        if ($category) {
            $products = $category->product()->get();
            return view('frontend.collections.products.index', compact('category', 'products'));
        } else {
            return redirect()->back();
        }
    }
    public function product(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $product = $category->product()->where('slug', $product_slug)->where('status', '0')->exists();
            if ($product) {
                $products = $category->product()->get();
                return view('frontend.collections.products.view', compact('product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
}
