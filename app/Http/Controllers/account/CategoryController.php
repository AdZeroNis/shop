<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Container\Attributes\Cache;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

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
        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("Account.Category.Categories");
    }
    public function Categories(){
        $categories=Category::all();
        return view("Admin.Category.Categories",compact("categories"));
    }
    public function Edit($id){
        $category=Category::find($id);
        return view("Admin.Category.Edit",compact("category"));
}
public function update(Request $request, $id){
    $category = Category::find($id);

    if($request->hasFile('image')) {
        // آپلود تصویر جدید
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("AdminAssets\Category-image"), $imageName);
        $dataForm = $request->all();
        $dataForm["image"] = $imageName;

        // حذف تصویر قبلی اگر وجود داشت
        $picture = public_path("AdminAssets\Category-image/") . $category->image;
        if(File::exists($picture)){
            File::delete($picture);
        }

        // آپدیت دسته‌بندی با داده‌های جدید
        $category->update($dataForm);
        Alert::success('موفقیت', 'دسته بندی با موفقیت ویرایش شد');
        return redirect()->route("Account.Category.Categories");
    }
}
public function Delete($id){
    $category=Category::find($id);
       // حذف تصویر قبلی اگر وجود داشت
       $picture = public_path("AdminAssets\Category-image/") . $category->image;
       if(File::exists($picture)){
           File::delete($picture);
       }
     $category->delete();
     Alert::success('موفقیت', 'دسته بندی با موفقیت حذف شد');
     return redirect()->route("Account.Category.Categories");
}

}
