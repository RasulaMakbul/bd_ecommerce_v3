<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(15);
        return view('admin.slider.index', compact('sliders'));
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
    public function store(SliderRequest $request)
    {
        $fileName = $this->uploadImage($request->File('image'));
        $requestData = [
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'status' => $request->status == true ? '1' : '0',
            'image' => $fileName
        ];
        Slider::create($requestData);
        return redirect()->back()->with('message', 'Slider Created!');
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
    public function update(SliderRequest $request, Slider $slider)
    {
        $requestData = [
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ];
        $slider->update($requestData);
        return redirect()->back()->with('message', 'Slider Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back()->with('message', 'Slider Deleted!');
    }
    public function active($id)
    {
        // dd($id);
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return back();
    }
    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/slider'), $fileName);
        return $fileName;
    }
    public function deleteImage($image)
    {
        $path = '/app/public/slider' . $image;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
