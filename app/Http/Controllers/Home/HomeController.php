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

        return view('Home.layouts.single', compact('products'));
    }

}
