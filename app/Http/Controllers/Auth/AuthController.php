<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function FormRegister(){
        return view("Auth.Register");
    }
    public function Register(Request $request){

        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "password" => "required",
        ]);

        $emailUser = User::where("email", $request->email)->first();
        if ($emailUser == null) {
            $dataForm = $request->all();

            $dataForm['password'] = Hash::make($request->password);

            $user = User::create($dataForm);
            Auth::login($user);
            return redirect()->route("Home");
        } else {
            return redirect()->route("FormRegister")->with('error', "ایمیل از قبل وجود دارد");
        }
    }

    public function FormLogin(){
        return view("Auth.Login");
    }

    public function Login(Request $request){

        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $user = User::where("email", $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route("Home");
        } else {
            return redirect()->route("FormRegister")->with('error', "ایمیل یا رمز غلط است");
        }
    }
    public function ShowProfile() {

        $user = Auth::user();


        if (!$user) {
            return redirect()->route('ShowProfile')->with('error', 'User not found');
        }


        return view('Auth.profile', compact('user'));
    }

        public function EditProfile()
        {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('ShowProfile')->with('error', 'User not found');
            }

            return view('Auth.editProfile', compact('user'));
        }

        public function updateProfile(Request $request)
        {
            $user = Auth::user();

            if (!$user) {
                return redirect()->route('ShowProfile')->with('error', 'User not found');
            }


            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'address' => 'required',
                'phone' => 'required',
                'password' => 'nullable|min:6',
            ]);


            $dataForm = $request->except(['password']);

            if ($request->filled('password')) {
                $dataForm['password'] = Hash::make($request->password);
            }
            $user->update($dataForm);

            return redirect()->route('ShowProfile');


        }
        public function Logout()
        {
            Auth::logout();
            return redirect()->route('Home');
        }
    }
