<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(){
        $digitalCategory = Category::where('name', 'کالای دیجیتال')->first();
        $digiProducts = Product::where('Id_category', $digitalCategory->id)->take(8)->get();

        return view('Home.index', compact('digiProducts'));
    }

}
