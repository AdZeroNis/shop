<?php

namespace App\Http\Controllers\Home;

use App\Models\Store;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\productcolors;
use App\Models\productimages;
use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function Home() {
        $latestProducts = Product::where('status', 1)
                                ->orderBy('created_at', 'desc')
                                ->take(10)
                                ->get();

        $stores = Store::all();
        $sliders = Slider::all();

        return view('Home.index', compact('latestProducts', 'stores', 'sliders'));
    }

    public function showStoreProducts($id)
    {
        $store = Store::findOrFail($id);
        $products = Product::where('store_id', $id)
                           ->where('status', 1)
                           ->take(12)
                           ->get();

        return view('Home.category_products', compact('store', 'products'));
    }

    public function product($id){
        $products = Product::find($id);
        return view('Home.single', compact('products'));
    }

    public function showCategoryProducts($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('Id_category', $id)->where('status', 1)->get();

        return view('Home.category_products', compact('category', 'products'));
    }

    public function articles() {
        $latestArticles = Article::where('status', 1)
                                ->orderBy('created_at', 'desc')
                                ->take(10)
                                ->get();

        return view('Home.articles', compact('latestArticles'));
    }

    public function Showarticles($id)
    {
        $articles = Article::find($id);
        return view('Home.single-article', compact('articles'));
    }

    public function search(Request $request)
    {
        $searchKey = $request->input('search_key');
        $searchType = $request->input('search_type', 'all');

        $results = [];

        if ($searchType === 'all' || $searchType === 'products') {
            $products = Product::where('status', 1)
                ->where(function($query) use ($searchKey) {
                    $query->where('name', 'like', '%' . $searchKey . '%');
                })
                ->with('category', 'store')
                ->orderBy('created_at', 'desc')
                ->take(20)
                ->get();

            $results['products'] = $products;
        }

        if ($searchType === 'all' || $searchType === 'categories') {
            $categories = Category::where('name', 'like', '%' . $searchKey . '%')
                ->withCount('products')
                ->take(10)
                ->get();

            $results['categories'] = $categories;
        }

        if ($searchType === 'all' || $searchType === 'articles') {
            $articles = Article::where('status', 1)
                ->where(function($query) use ($searchKey) {
                    $query->where('title', 'like', '%' . $searchKey . '%')
                          ->orWhere('content', 'like', '%' . $searchKey . '%');
                })
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            $results['articles'] = $articles;
        }

        if ($searchType === 'all' || $searchType === 'stores') {
            $stores = Store::where('name', 'like', '%' . $searchKey . '%')
                ->withCount('products')
                ->take(10)
                ->get();

            $results['stores'] = $stores;
        }

        return view('Home.search_results', compact('results', 'searchKey', 'searchType'));
    }
}
