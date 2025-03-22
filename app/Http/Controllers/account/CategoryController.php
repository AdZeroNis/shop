<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Container\Attributes\Cache;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function show(){
        return view("Admin.Category.CreateCategory");
    }

    public function storeImage(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1,2',
        ]);

        if (is_null(Auth::user()->store_id)) {
            Alert::error('خطا', 'شما به یک مغازه اختصاص داده نشده‌اید.');
            return redirect()->back();
        }


        Category::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'store_id' => Auth::user()->store_id,
        ]);

        Alert::success('موفقیت', 'دسته بندی با موفقیت اضافه شد');
        return redirect()->route("Account.Product.Products");
    }



    public function Categories()
{
    $user = Auth::user();

    // Fetch all categories if the user is a super admin, otherwise only categories for their store
    if ($user->role == 'super_admin') {
        $categories = Category::all();
    } else {
        $categories = Category::where('store_id', $user->store_id)->get();
    }

    return view('Admin.Category.Categories', compact('categories'));
}


    public function Edit($id){
        $category=Category::find($id);
        return view("Admin.Category.Edit",compact("category"));
}
public function update(Request $request, $id) {
    $category = Category::find($id);
    $dataForm=$request->all();


    $category->update($dataForm);

    Alert::success('موفقیت', 'دسته بندی با موفقیت ویرایش شد');
    return redirect()->route("Account.Category.Categories");
}

public function Delete($id){
    $category=Category::find($id);
    if ($category->products()->exists()) {

        Alert::error('خطا', 'این دسته بندی دارای  محصول  است و نمی‌توان آن را حذف کرد.');
        return redirect()->route("Account.Category.Categories");
    }
     $category->delete();
     Alert::success('موفقیت', 'دسته بندی با موفقیت حذف شد');
     return redirect()->route("Account.Category.Categories");
}
public function index(Request $request)
{
    $query = Category::query();

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

    $categories = $query->get();


    return view('Admin.Category.Index', [
        'categories' => $categories,
        'search' => $request->search,
        'status' => $request->status
    ]);
}



}

