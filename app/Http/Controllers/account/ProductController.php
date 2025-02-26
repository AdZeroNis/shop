<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\productcolors;
use App\Models\productimages;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function show(){

        $categories=Category::all();
        return view("Admin.product.createProduct",compact("categories"));
    }
    public function storeProduct(Request $request)
    {
        if($request->hasFile("image")){
        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path("AdminAssets\Product-image"),$imageName);
        $dataForm=$request->all();
        $dataForm["image"]=$imageName;

        Product::create($dataForm);
        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("Account.Product.Products");
        }
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
public function update(Request $request, $id) {
    $product = Product::find($id);


    $dataForm = $request->except('image');


    if ($request->hasFile('image')) {
        $imageName = time() . "." . $request->image->extension();
        $request->image->move(public_path("AdminAssets/Product-image"), $imageName);
        $dataForm['image'] = $imageName;


        $picture = public_path("AdminAssets/Product-image/") . $product->image;
        if (File::exists($picture)) {
            File::delete($picture);
        }
    }

    $product->update($dataForm);

    Alert::success('موفقیت', 'محصول با موفقیت ویرایش شد');
    return redirect()->route("Account.Product.Products");
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
     return redirect()->route("Account.Product.Products");
}
public function index(Request $request)
{
    $query = Product::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }


    if ($request->has('status') && $request->status !== '') {

        if ($request->status == 'active') {
            $query->where('status', 1);
        } elseif ($request->status == 'inactive') {
            $query->where('status', 0);
        }
    }
    if ($request->has('Id_category') && $request->Id_category != '') {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('id', $request->Id_category);
        });
    }

    $products = $query->get();


    $categories = Category::all();

    return view('Admin.product.Index', [
        'products' => $products,
        'categories' => $categories,
        'search' => $request->search,
        'status' => $request->status,
        'Id_category' => $request->Id_category
    ]);
}
}
