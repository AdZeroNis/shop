<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create(){

        $categories=Category::all();
        return view("Admin.product.createProduct",compact("categories"));
    }
    public function storeProduct(Request $request){

        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path("AdminAssets\Product-image"),$imageName);
        $dataForm=$request->all();
        $dataForm["image"]=$imageName;

        Product::create($dataForm);
        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("Account.Product.Products");
    }

    public function Products(){
        $products=Product::all();
        $categories=Category::all();
        return view("Admin.Product.Products",compact("products","categories"));
    }
    public function Edit($id){
        $categories=Category::all();
        $product= product::find($id);
        return view("Admin.product.editProduct",compact("categories","product"));
}
public function update(Request $request, $id){
    $category = Category::all();
    $product= Product::find($id);

    if($request->hasFile('image')) {
        // آپلود تصویر جدید
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("AdminAssets\Product-image"), $imageName);
        $dataForm = $request->all();
        $dataForm["image"] = $imageName;

        // حذف تصویر قبلی اگر وجود داشت
        $picture = public_path("AdminAssets\Product-image/") . $product->image;
        if(File::exists($picture)){
            File::delete($picture);
        }

        // آپدیت  با داده‌های جدید
        $product->update($dataForm);
        Alert::success('موفقیت', 'محصول  با موفقیت ویرایش شد');
        return redirect()->route("Account.Product.Products");
    }

}
public function Delete($id){
    $product=Product::find($id);
       // حذف تصویر قبلی اگر وجود داشت
       $picture = public_path("AdminAssets\Product-image/") . $product->image;
       if(File::exists($picture)){
           File::delete($picture);
       }
     $product->delete();
     Alert::success('موفقیت', 'دسته بندی با موفقیت حذف شد');
     return redirect()->route("Account.Category.Categories");
}
}
