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
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function show()
    {
        $storeId = Auth::user()->store_id;


        $categories = Category::where('store_id', $storeId)->get();

        return view("Admin.product.createProduct", compact("categories"));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1,2',
            'description' => 'required',
            'inventory' => 'required',
            'price' => 'required',
            'image' => 'required',
            'Id_category' => 'required|exists:categories,id',
        ]);

        if (is_null(Auth::user()->store_id)) {
            Alert::error('خطا', 'شما به یک مغازه اختصاص داده نشده‌اید.');
            return redirect()->back();
        }

        if ($request->hasFile("image")) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("AdminAssets/Product-image"), $imageName);

            Product::create([
                'name' => $request->input('name'),
                'Id_category' => $request->input('Id_category'), // Correct category field
                'store_id' => Auth::user()->store_id,
                'description' => $request->input('description'),
                'inventory' => $request->input('inventory'),
                'price' => $request->input('price'),
                'status' => $request->input('status'),
                'image' => $imageName,
            ]);

            Alert::success('موفقیت', 'محصول با موفقیت اضافه شد');
            return redirect()->route("Account.Product.Products");
        }

        Alert::error('خطا', 'تصویر محصول بارگذاری نشد.');
        return redirect()->back();
    }





    public function Products()
    {
        $user = Auth::user();

        if ($user->role == 'super_admin') {
            // اگر کاربر سوپر ادمین است، همه محصولات و دسته‌بندی‌ها را نمایش بده
            $products = Product::orderBy('created_at', 'desc')->get(); // اصلاح شده
            $categories = Category::orderBy('created_at', 'desc')->get();
        } else {
            // اگر کاربر ادمین مغازه است، فقط محصولات و دسته‌بندی‌های مغازه خود را نمایش بده
            $storeId = $user->store_id;
            $products = Product::where('store_id', $storeId)->orderBy('created_at', 'desc')->get(); // این قسمت درست است
            $categories = Category::where('store_id', $storeId)->orderBy('created_at', 'desc')->get(); ; // فیلتر دسته‌بندی‌ها بر اساس مغازه
        }

        return view("Admin.Product.Products", compact("products", "categories"));
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
    $user = Auth::user();
    $query = Product::query();

    // جستجو بر اساس نام محصول
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // فیلتر بر اساس وضعیت محصول
    if ($request->has('status') && $request->status !== '') {
        if ($request->status == 'active') {
            $query->where('status', 1);
        } elseif ($request->status == 'inactive') {
            $query->where('status', 0);
        }
    }

    // فیلتر بر اساس دسته‌بندی
    if ($request->has('Id_category') && $request->Id_category != '') {
        $query->where('Id_category', $request->Id_category);
    }

    // اگر کاربر سوپر ادمین است، همه محصولات و دسته‌بندی‌ها را نمایش بده
    if ($user->role == 'super_admin') {
        $products = $query->get();
        $categories = Category::all(); // همه دسته‌بندی‌ها
    } else {
        // اگر کاربر ادمین فروشگاه است، فقط محصولات و دسته‌بندی‌های مربوط به فروشگاه خود را نمایش بده
        $storeId = $user->store_id;
        $products = $query->where('store_id', $storeId)->get();
        $categories = Category::where('store_id', $storeId)->get(); // فقط دسته‌بندی‌های فروشگاه خود
    }

    return view('Admin.product.products', [
        'products' => $products,
        'categories' => $categories,  // ارسال دسته‌بندی‌های فیلتر شده به ویو
        'search' => $request->search,
        'status' => $request->status,
        'Id_category' => $request->Id_category
    ]);
}
public function details($id)
{
    $currentUser = Auth::user();

    // اگر کاربر سوپر ادمین است
    if ($currentUser->role == 'super_admin') {

        // پیدا کردن محصول
        $product = Product::find($id);

        // بررسی اینکه محصول وجود دارد یا خیر
        if (!$product) {
            Alert::error('خطا', 'محصول مورد نظر یافت نشد.');
            return redirect()->back();
        }

        // پیدا کردن مغازه مربوط به محصول
        $store = $product->store;

        // چک کردن اینکه مغازه برای محصول وجود دارد یا خیر
        if (!$store) {
            Alert::error('خطا', 'مغازه مربوط به محصول یافت نشد.');
            return redirect()->back();
        }

        return view('Admin.product.details', compact('product', 'store'));
    }

    // اگر کاربر سوپر ادمین نیست و مغازه ادمین فعلی را برمی‌گرداند
    $store = $currentUser->store;

    if (is_null($store)) {
        Alert::error('خطا', 'شما به یک مغازه اختصاص داده نشده‌اید.');
        return redirect()->back();
    }

    // پیدا کردن محصول مرتبط با مغازه
    $product = $store->products()->find($id);

    if (!$product) {
        Alert::error('خطا', 'محصول مورد نظر در مغازه شما یافت نشد.');
        return redirect()->back();
    }

    return view('Admin.product.details', compact('product', 'store'));
}


}
