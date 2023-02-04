<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $fileName = $this->uploadImage($request->File('image'));
        $requestData = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $fileName
        ];
        Category::create($requestData);
        return redirect()->back()->with('message', 'Category created!');
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $requestData = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true ? '1' : '0'
        ];

        if ($request->hasFile('image')) {
            $this->deleteImage($category->image);
            $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $category->update($requestData);
        return redirect()->route('category.index')->with('message', 'Category Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // dd($category);
        $category->delete();
        return redirect()->back()->with('message', 'Deleted!');
    }

    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/category'), $fileName);
        return $fileName;
    }
    public function deleteImage($image)
    {
        $path = '/app/public/category' . $image;
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    public function active($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->status = 1;
        $category->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->status = 0;
        $category->update();
        return back();
    }
}
