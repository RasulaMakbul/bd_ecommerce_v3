<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Admin\Color;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        return view('admin.product.create', compact('categories', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('products', $fileName, 'public');

                array_push($images, $image_path);
            }
        }
        $requestData = [

            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'code' => $request->code,
            'shortDefination' => $request->shortDefination,
            'test' => $request->test,
            'result' => $request->result,
            'howToUse' => $request->howToUse,
            'pack' => $request->pack,
            'ingredient' => $request->ingredient,
            'weight' => $request->weight,
            'pao' => $request->pao,
            'origin' => $request->origin,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'originalPrice' => $request->originalPrice,
            'sellingPrice' => $request->sellingPrice,
            'costing' => $request->costing,
            'status' => $request->status == true ? '1' : '0',
            'trending' => $request->trending == true ? '1' : '0',
            'images' => $images,
        ];
        // $category->product()->create($requestData);
        $product = Product::create($requestData);

        if ($request->colors) {
            foreach ($request->colors as $key => $color) {
                $product->productColor()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'stock' => $request->colorStock[$key] ?? 0
                ]);
            }
        }

        return redirect()->route('product.index')->with('message', 'Product created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function active($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return back();
    }

    public function trending($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->trending = 1;
        $product->update();
        return back();
    }
    public function notTrending($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->trending = 0;
        $product->update();
        return back();
    }
}
