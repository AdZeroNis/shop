<?php

namespace App\Http\Controllers\Store;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class StoreController extends Controller
{
    public function question(){
        return view('store.question');
    }
    public function create()
    {

        return view('store.add_shop');
    }

    public function store(Request $request)
    {
        // اعتبارسنجی داده‌های ورودی
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'required|string|max:20',
        ]);

        // آپلود تصویر
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('AdminAssets/Store-image'), $imageName);

        // ایجاد مغازه
        $store = Store::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'image' => $imageName,
            'phone_number' => $request->input('phone_number'),
            'admin_id' => Auth::id(), // اختصاص admin_id به کاربر فعلی
        ]);

        // اختصاص store_id به کاربر فعلی
        $user = Auth::user();
        $user->store_id = $store->id;
        $user->role = 'admin';
        $user->save();

        // نمایش پیام موفقیت
        Alert::success('موفقیت', 'مغازه با موفقیت ثبت شد');
        return redirect()->route("Home");
    }

    public function Stores()
    {

        $user = Auth::user();

        if ($user->role == 'super_admin') {

            $stores = Store::all();

        } else {

            $storeId = $user->store_id;
            $stores = Store::where('id', $storeId)->get();

        }

        return view('store.stores', compact("stores"));
    }
    public function Edit($id)
    {
        $store = Store::find($id);

        return view("store.edit_shop", compact('store'));
    }
    public function update(Request $request, $id)
    {
        $store = Store::find($id);


        $dataForm = $request->except('image');


        if ($request->hasFile('image')) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path("AdminAssets/Store-image"), $imageName);
            $dataForm['image'] = $imageName;


            $picture = public_path("AdminAssets/Store-image/") . $store->image;
            if (File::exists($picture)) {
                File::delete($picture);
            }
        }

        $store->update($dataForm);

        Alert::success('موفقیت', 'مغازه با موفقیت ویرایش شد');
        return redirect()->route('store.stores');
    }
    public function Delete($id)
    {
        $store = Store::find($id);

        // ابتدا کاربر را که به عنوان admin به این مغازه اختصاص داده شده است جدا می‌کنیم
        $user = User::where('store_id', $store->id)->first();
        if ($user) {
            $user->store_id = null;  // جدا کردن store_id از کاربر
            $user->role = 'user';    // اگر می‌خواهید نقش را به کاربر عادی تغییر دهید
            $user->save();
        }

        // حذف تصویر قبلی اگر وجود داشت
        $picture = public_path("AdminAssets/Store-image/") . $store->image;
        if (File::exists($picture)) {
            File::delete($picture);
        }

        // حذف مغازه
        $store->delete();

        // نمایش پیام موفقیت
        Alert::success('موفقیت', 'مغازه با موفقیت حذف شد');
        return redirect()->route("Home");
    }
    public function details($id)
    {

        $currentUser = Auth::user();

        if ($currentUser->role == 'super_admin') {

            $store = Store::find($id);


            if (!$store) {
                Alert::error('خطا', 'مغازه مورد نظر یافت نشد.');
                return redirect()->back();
            }

            $user = $store->user;

            return view('store.details', compact('user', 'store'));
        }

        $store = $currentUser;


        if (is_null($store->user)) {
            Alert::error('خطا', 'شما به یک مغازه اختصاص داده نشده‌اید.');
            return redirect()->back();
        }

        $user = $store->user;

        return view('store.details', compact('user', 'store'));
    }

}
