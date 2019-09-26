<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Feedback;
use App\Team;
use App\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $images = Slider::orderBy('sort_id', 'ASC')->get();
        $categories = Category::all();
        $feedbacks = Feedback::all();
        $portfolios = Portfolio::with('images')->whereHas('categories', function ($query){
            $query->where('name',"!=" ,"null");
        })->get()->map(function ($theme) {
            $theme['categories'] = $theme->categories()->pluck('code');
            return $theme;
        })->all();
        $team_members = Team::all();

        if (view()->exists('home')) {
            return view('home', compact('images', 'categories', 'feedbacks', 'portfolios', 'team_members'));
        }
    }
}
