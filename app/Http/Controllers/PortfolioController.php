<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Portfolio;
use Illuminate\Http\Request;
use Validator;

class PortfolioController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $portfolios = Portfolio::with('images')->whereHas('categories', function ($query){
            $query->where('name',"!=" ,"null");
        })->get()->map(function ($theme) {
            $theme['categories'] = $theme->categories()->pluck('name');
            return $theme;
        })->all();

        if (view()->exists('admin.portfolio.list')) {
            return view('admin.portfolio.list', compact('portfolios'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if (view()->exists('admin.portfolio.add')) {
            return view('admin.portfolio.add',  compact('categories'));
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
        $data = $request->all();
        $category_ids = $request->get('category_ids');
        $category_ids = explode(',', $category_ids[0]);
        $data['category_ids'] = $category_ids;

        $validate = Validator::make($data,[
            'category_ids' => 'array',
            'category_ids.*' => 'required|exists:categories,id',
            'images' => 'array',
            'images.*' => 'image'
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $portfolio = Portfolio::create($data);
        $images_array = [];
        $images = $request->file('images');

        if ($request->hasFile('images')) {
            foreach ($images as $image){
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/img/portfolio');
                $image->move($path, $name);
                array_push($images_array, ['name' => $name]);
            }
             $portfolio->images()->createMany($images_array);
        }

        if (isset($category_ids)){
            $portfolio->categories()->sync($category_ids);
        }

        if ($portfolio){
            return redirect('admin/portfolio')->with('status', 'Portfolio added successfully');
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
        $categories = Category::all();
        $portfolio = Portfolio::with('images','categories')->where('id',$id)->first();

        if ($portfolio) {
            return view('admin.portfolio.edit', compact('portfolio', 'categories'));
        }
        return redirect('admin/category')->with('status', 'Portfolio not found');
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
        $data = $request->except('old_category_ids');
        $category_ids = $request->get('category_ids');
        $category_ids = explode(',', $category_ids[0]);
        $data['category_ids'] = $category_ids;

        $portfolio = Portfolio::find($id);

        $validate = Validator::make($data,[
            'category_ids' => 'array',
            'category_ids.*' => 'required|exists:categories,id',
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }


        $portfolio->update($data);

        if ($request->hasFile('images')) {
            $images_array = [];
            $images = $request->file('images');
            foreach ($images as $image){
                $name = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('/img/portfolio');
                $image->move($path, $name);
                array_push($images_array, ['name' => $name]);
            }
            $portfolio->images()->createMany($images_array);
        }

        if (isset($category_ids)){
            $portfolio->categories()->sync($category_ids);
        }

        if ($portfolio){
            return redirect('admin/portfolio')->with('status', 'Portfolio edited successfully');
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
        $portfolio = Portfolio::find($id);

        if ($portfolio){
            $portfolio->delete();
            return redirect('admin/portfolio')->with('status', 'Portfolio deleted successfully');
        }
        return redirect('admin/portfolio')->with('status', 'Portfolio not found');
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function makeMainImg($id)
    {
        $image = Image::find($id);

        if ($image) {
            $portfolio_id = $image->portfolio_id;
            Image::where('portfolio_id', $portfolio_id)
                ->where( function ( $query )
                {
                    $query->where( 'is_main' , 1);
                })->update(['is_main' => 0]);

            $make_main = Image::where('id', $id)->update(['is_main' => 1]);
            if ($make_main){
                return response()->json([
                    'status'=> 'OK',
                    'message'=> 'Selected images successfully marked main!'
                ],200);
            }
        }

        return response()->json([
            'status'=> 'Error',
            'message'=> 'Image not found!'
        ],404);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyImage($id)
    {
        $image = Image::find($id);

        if ($image) {
            $deleted_image = $image->delete();
            if ($deleted_image) {
                return response()->json([
                    'status'=> 'OK',
                    'message'=> 'Image successfully deleted!'
                ],200);
            }
            return response()->json([
                'status'=> 'Error',
                'message'=> 'Image has not been deleted!'
            ],400);
        }

        return response()->json([
            'status'=> 'Error',
            'message'=> 'Image not found!'
        ],404);
    }
}
