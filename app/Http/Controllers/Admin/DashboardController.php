<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function count(){
        $usersCount = User::count();
        $productsCount = Product::count();
        return view("Admin.Dashboard.Dashboard", compact("usersCount","productsCount"));
    }
}
