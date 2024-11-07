<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Container\Attributes\Cache;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view("Admin.Category.CreateCategory");
    }

    public function storeImage(Request $request){

        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path("AdminAssets\Category-image"),$imageName);
        $dataForm=$request->all();
        $dataForm["image"]=$imageName;

        Category::create($dataForm);
        return redirect()->route("Account.Category.Create");
    }
}
