<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::orderBy('sort_id', 'ASC')->get();
        if (view()->exists('admin.slider.list')) {
            return view('admin.slider.list', compact('images'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('admin.slider.add')) {
            return view('admin.slider.add');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($valid->fails()) {
            return redirect()->route('slider.create')->withErrors($valid)->withInput();
        }
        $slider = $request->all();

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $name = uniqid().'.'.$image->getClientOriginalExtension();
            $path = public_path('/img/slider');
            $image->move($path, $name);
            $slider['image'] = $name;
        }

        $new_slider = Slider::create($slider);
        if($new_slider){
            return redirect('admin/slider')->with('status', 'Your image has been successfully');
        }

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

    // Sort order slider image
    public function change_image_order(Request $request)
    {
        $position = 1;
        foreach ($request->ids as $id) {
            Slider::where('id', $id)->update(['sort_id' => $position]);
            $position++;
        }
        return 'OK';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Slider::find($id)->delete()) {
            return redirect('admin/slider')->with('status', 'Image successfully delete !!!');
        }
    }
}
