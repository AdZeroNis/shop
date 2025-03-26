<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function Users(){
        $Users=User::all();

        return view("Admin.user.users",compact("Users"));
    }
    public function Edit($id){

        $user= User::find($id);
        return view("Admin.user.Edit",compact("user"));
}
public function update(Request $request, $id)
{
    $user = User::find($id);

    $dataForm = $request->all();

    if (empty($dataForm['password'])) {

        unset($dataForm['password']);
    } else {

        $dataForm['password'] = Hash::make($request->password);
    }


    $user->update($dataForm);


    Alert::success('موفقیت', 'کاربر با موفقیت ویرایش شد');
    return redirect()->route("Account.User.Users");
}

public function Delete($id)
{
    $user = User::find($id);


    if ($user->orders()->exists()) {

        Alert::error('خطا', 'این کاربر دارای سفارش‌های ثبت شده است و نمی‌توان آن را حذف کرد.');
        return redirect()->route("Account.User.Users");
    }
    if ($user->basket()->exists()) {

        Alert::error('خطا', 'این کاربر دارای سبد خرید ثبت شده است و نمی‌توان آن را حذف کرد.');
        return redirect()->route("Account.User.Users");
    }


    $user->delete();
    Alert::success('موفقیت', 'کاربر با موفقیت حذف شد');
    return redirect()->route("Account.User.Users");
}


public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }


    if ($request->has('role') && $request->user_role !== '') {

        if ($request->role == 'admin') {
            $query->where('role', 'super_admin');
        } elseif ($request->role == 'colleague') {
            $query->where('role', 'admin');
        }

    }
    if ($request->has('status') && $request->status !== '') {

        if ($request->status == 'active') {
            $query->where('status', 1);
        } elseif ($request->status == 'inactive') {
            $query->where('status', 0);
        }

    }

    $Users = $query->get();


    return view('Admin.user.users', [
        'Users' => $Users,
        'search' => $request->search,
        'user_role' => $request->user_role,
        'status' => $request->status,
    ]);
}
public function details($id)
{

    $currentUser = Auth::user();

    if ($currentUser->role == 'super_admin') {

        $user = User::find($id);


        if (!$user) {
            Alert::error('خطا', 'کاربر مورد نظر یافت نشد.');
            return redirect()->back();
        }

        $store = $user->store;

        return view('Admin.user.details', compact('user', 'store'));
    }

    $user = $currentUser;


    if (is_null($user->store)) {
        Alert::error('خطا', 'شما به یک مغازه اختصاص داده نشده‌اید.');
        return redirect()->back();
    }

    $store = $user->store;

    return view('Admin.user.details', compact('user', 'store'));
}


}
