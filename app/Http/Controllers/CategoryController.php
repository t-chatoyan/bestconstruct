<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if (view()->exists('admin.category.list')) {
            return view('admin.category.list', compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (view()->exists('admin.category.add')) {
            return view('admin.category.add');
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
        ]);

        if ($valid->fails()) {
            return redirect()->route('category.create')->withErrors($valid)->withInput();
        }
        $data = $request->all();
        $data['code'] = uniqid();
        $category = Category::create($data);

        if($category){
            return redirect('admin/category')->with('status', 'Category added successfully');
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
        $category = Category::find($id);

        if ($category) {
            return view('admin.category.edit', compact('category'));
        }
        return redirect('admin/category')->with('status', 'Category not found');
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
        $caegory = Category::find($id);

        $valid = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($valid->fails()) {
            return redirect()->route('category.create')->withErrors($valid)->withInput();
        }

        $caegory->update($request->all());

        if($caegory){
            return redirect('admin/category')->with('status', 'Category updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caegory = Category::find($id);

        if ($caegory){
            $caegory->delete();
            return redirect('admin/category')->with('status', 'Category deleted successfully');
        }
        return redirect('admin/category')->with('status', 'Category not found');
    }
}
