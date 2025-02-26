<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\File;
use RealRashid\SweetAlert\Facades\Alert;

class BasketController extends Controller
{
public function addToBasket(Request $request)
    {

        if (!Auth::check()) {
            Alert::error('ناموفق', 'ابتدا ورود کنید');
            return redirect()->route('FormLogin');
        }


        $product = Product::find($request->product_id);

        if (!$product) {
            Alert::error('خطا', 'محصول یافت نشد');
            return redirect()->back();
        }


        $basketItem = Basket::where('user_id', Auth::id())
                            ->where('product_id', $product->id)
                            ->first();

        if ($basketItem) {

            $basketItem->quantity += $request->input('quantity', 1);
            $basketItem->save();
        } else {

            Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->input('quantity', 1)
            ]);
        }


        Alert::success('موفقیت', 'محصول به سبد خرید اضافه شد');

        return redirect()->back();
    }
    public function showBasket()
{
    $basketItems = Basket::where('user_id', Auth::id())->with('product')->get();

    return view('Home.factor', compact('basketItems'));
}

public function showBasketAdmin()
{

    $basketItems = Basket::with(['product', 'user'])->get();

    return view('Admin.Basket.basket', compact('basketItems'));
}


public function Delete($id){
    $basket=Basket::find($id);
     $basket->delete();
     Alert::success('موفقیت', 'محصول  با موفقیت حذف شد');
     return redirect()->route('Account.Basket.show');
}
public function DeleteUser($id){
    $basket=Basket::find($id);
     $basket->delete();
     Alert::success('موفقیت', 'محصول  با موفقیت حذف شد');
     return redirect()->route('basket.Factor');
}
public function showFactor()
{
    if (!Auth::check()) {

        return redirect()->route('FormLogin');

    }
    $user = Auth::user();
    $basketItems = Basket::with('product')->where('user_id', $user->id)->get();
    $totalPrice = $basketItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('Home.factor', compact('basketItems', 'totalPrice','user'));
}
public function updateQuantity(Request $request, $id)
{
    $basketItem = Basket::find($id);

    if (!$basketItem) {
        Alert::error('خطا', 'محصول در سبد خرید یافت نشد');
        return redirect()->back();
    }

    if ($request->action == 'increase') {
        $basketItem->quantity += 1;
    } elseif ($request->action == 'decrease') {
        if ($basketItem->quantity > 1) {
            $basketItem->quantity -= 1;
        } else {
            Alert::error('خطا', 'حداقل تعداد باید یک باشد');
            return redirect()->back();
        }
    }

    $basketItem->save();

    Alert::success('موفقیت', 'تعداد محصول بروز شد');
    return redirect()->back();
}


}
