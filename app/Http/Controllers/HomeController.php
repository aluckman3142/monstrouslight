<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Slide;
use App\Models\BlogPost;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(){

        $slides = Slide::query()->where('enabled', '=', 1)->orderBy('sort_order')->get();

        $latestPosts = BlogPost::query()->where('enabled', '=', 1)->orderBy('created_at', 'DESC')->limit(2)->get();

        $newProducts = Product::query()->where('enabled', '=', 1)->orderBy('created_at', 'ASC')->get()->take(10);

        $featuredProducts = Product::query()->where('enabled', '=', 1)->where('featured', '=', 1)->get();

        $topratedProducts = Product::all()->where('rating', '>=', 4);

        return Inertia::render('Home', [
            'slides' => $slides,
            'latestPosts' => $latestPosts,
            'newProducts' => $newProducts,
            'featuredProducts' => $featuredProducts,
            'topratedProducts' => $topratedProducts,
        ]);
    }

}
