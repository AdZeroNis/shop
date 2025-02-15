<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

public function Delete($id){
    $user=User::find($id);
     $user->delete();
     Alert::success('موفقیت', ' کاربر با موفقیت حذف شد');
     return redirect()->route("Account.User.Users");
}


public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }


    if ($request->has('user_role') && $request->user_role !== '') {

        if ($request->user_role == 'admin') {
            $query->where('user_role', 1);
        } elseif ($request->user_role == 'colleague') {
            $query->where('user_role', 0);
        }

    }
    if ($request->has('status') && $request->status !== '') {

        if ($request->status == 'active') {
            $query->where('status', 1);
        } elseif ($request->user_role == 'inactive') {
            $query->where('status', 0);
        }

    }

    $Users = $query->get();


    return view('Admin.user.index', [
        'Users' => $Users,
        'search' => $request->search,
        'user_role' => $request->user_role,
        'status' => $request->status,
    ]);
}

}
