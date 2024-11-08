<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){

        $categories=Category::all();
        return view("Admin.product.createProduct",compact("categories"));
    }
}
