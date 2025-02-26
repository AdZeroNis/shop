<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\productcolors;
use App\Models\productimages;
use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home() {
        $digiCategories = Category::with('products')->get(); // دریافت دسته‌بندی‌ها همراه با محصولات مرتبط
        $sliderImages = slider::all(); // دریافت اسلایدر
        $ProductRandom = Product::inRandomOrder()->take(1)->get(); // دریافت یک محصول تصادفی

        return view('Home.index', compact('digiCategories', 'ProductRandom', 'sliderImages'));
    }


    public function product($id){
        $products=Product::find($id);

        return view('Home.single', compact('products'));
    }
    public function showCategoryProducts($id)
{
    $category = Category::findOrFail($id);
    $products = Product::where('Id_category', $id)->where('status', 1)->get(); // Only active products

    return view('Home.category_products', compact('category', 'products'));
}


}
