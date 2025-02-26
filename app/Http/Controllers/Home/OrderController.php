<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Basket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $basketItems = Basket::where('user_id', $user->id)->with('product')->get();

        if ($basketItems->isEmpty()) {
            Alert::error('خطا', 'سبد خرید شما خالی است');
            return redirect()->back();
        }

        // ایجاد سفارش جدید
        $order = Order::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'total_price' => $basketItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            }),
            'status' => 0, // وضعیت "در حال پردازش"
        ]);
        foreach ($basketItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);


            $item->product->decrement('inventory', $item->quantity);
        }

        // پاکسازی سبد خرید
        Basket::where('user_id', $user->id)->delete();

        Alert::success('موفقیت', 'سفارش شما با موفقیت ثبت شد و منتظر تایید ارسال از سمت ادمین می‌باشد.');
        return redirect()->route('orders.index');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('Home.orders', compact('orders'));
    }
    public function adminOrders()
{
    // نمایش تمام سفارشات برای ادمین
    $orders = Order::with('orderItems.product', 'user')->get();
    return view('Admin.order.order', compact('orders'));
}

public function updateOrderStatus(Request $request, $id)
{
    // پیدا کردن سفارش بر اساس آیدی
    $order = Order::find($id);

    // به‌روزرسانی وضعیت سفارش
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'وضعیت سفارش با موفقیت به‌روزرسانی شد');
}


public function userOrders($id)
{

    $user = User::find($id);

    $orders = Order::where('user_id', $user->id)->with('orderItems.product')->get();


    return view('Admin.order.user_orders', compact('user', 'orders'));
}

}
