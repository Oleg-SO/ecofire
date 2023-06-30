<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Specs;
use App\Specification;
use App\Category;
use App\News;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
    //     $category = Category::get();
    //     $categories = Category::whereNull('parent_id')->get();

    //     return view('landing-page')->with([
    //         'products', $products,
    //         'categories' => $categories,
    //         'category' => $category]);
    // }

    public function index()
    {
        $pagination = 9;
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();
        $news = News:: get();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            //$categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            //$categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('landing-page')->with([
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            'news' => $news
        ]);

    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('news')->with([
            'news' => $news
        ]);
    }
    
    public function blog(){
        $news = News::select(['id','title','excerpt','slug'])->get();
        return view('news')->with('news', $news);
     }
}
