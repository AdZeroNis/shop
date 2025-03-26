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
        $latestProducts = Product::where('status', 1) // Only active products
                                ->orderBy('created_at', 'desc') // Order by the latest products
                                ->take(10) // Limit to the latest 10 products
                                ->get();

        $stores = Store::all(); // Get all stores
        $sliders = Slider::all(); // Get active sliders

        return view('Home.index', compact('latestProducts', 'stores', 'sliders'));
    }

    public function showStoreProducts($id)
    {
        $store = Store::findOrFail($id);
        $products = Product::where('store_id', $id)
                           ->where('status', 1)
                           ->take(12) // Limit to 12 products
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
}
