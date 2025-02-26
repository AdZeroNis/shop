<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function count(){
        $usersCount = User::count();
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $latestOrders = Order::with('user')->latest()->take(10)->get();

        return view('Admin.Dashboard.Dashboard', compact('usersCount', 'productsCount', 'ordersCount', 'latestOrders'));
    }

}
