<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::orderBy('id', 'DESC')->paginate(15);
        return view('admin.social.index', compact('socials'));
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
    public function store(Request $request)
    {
        $requestData = [
            'title' => $request->title,
            'link' => $request->link,
            'status' => $request->status == true ? '1' : '0',
        ];
        Social::create($requestData);
        return redirect()->back()->with('message', 'Social Link Created!');
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
    public function update(Request $request, Social $social)
    {
        $requestData = [
            'title' => $request->title,
            'link' => $request->link,
            'status' => $request->status == true ? '1' : '0',
        ];
        $social->update($requestData);
        return redirect()->back()->with('message', 'Social Link Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $social = Social::findOrFail($id);
        $social->delete();
        return redirect()->back()->with('message', 'Social Deleted!');
    }
    public function active($id)
    {
        // dd($id);
        $social = Social::find($id);
        $social->status = 1;
        $social->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $social = Social::find($id);
        $social->status = 0;
        $social->update();
        return back();
    }
}
