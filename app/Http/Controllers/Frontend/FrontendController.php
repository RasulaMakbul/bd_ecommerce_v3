<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $socials = Social::where('status', '1')->get();
        $trendingProduct = Product::where('trending', '1')->latest()->take(15)->orderBy('id', 'DESC')->get();
        return view('frontend.index', compact('sliders', 'trendingProduct', 'socials'));
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
            return redirect()->back()->with('message', 'Not Available!');
        }
    }
    public function product(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();


        if ($category) {
            $product = $category->product()->where('slug', $product_slug)->where('status', '1')->first();
            if ($product) {

                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back()->with('message', 'Not Available!');
            }
        } else {
            return redirect()->back()->with('message', 'Not Available!');
        }
    }

    public function newArrivals()
    {
        $newArrivals = Product::where('status', '1')->latest()->take(15)->get();
        return view('frontend.newArrival', compact('newArrivals'));
    }

    public function thankYou()
    {
        return view('frontend.thankyou');
    }
    public function searchProduct(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('frontend.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Search box empty');
        }
    }
}
