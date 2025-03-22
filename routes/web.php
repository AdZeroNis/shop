<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\BasketController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Account\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Account\CategoryController;
use App\Http\Controllers\Cooperation\CooperationController;
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\StoreController as ControllersStoreController;

// مسیرهای مربوط به مدیریت (فقط برای کاربران ادمین)
Route::middleware([IsAdmin::class])->prefix("Account")->group(function () {

    // مسیرهای مربوط به دسته‌بندی
    Route::prefix("category")->group(function () {

        Route::get('/index', [CategoryController::class, 'index'])->name('Account.Category.Index');
        Route::get('/show', [CategoryController::class, "show"])->name('Account.Category.Create');
        Route::post('/create', [CategoryController::class, "storeImage"])->name('Account.Category.storeImage');
        Route::get('/Categories', [CategoryController::class, "Categories"])->name('Account.Category.Categories');
        Route::get('/Edit/{id}', [CategoryController::class, "Edit"])->name('Account.Category.Edit');
        Route::post('/Update/{id}', [CategoryController::class, "update"])->name('Account.Category.update');
        Route::get('/Delete/{id}', [CategoryController::class, "Delete"])->name('Account.Category.Delete');

    });

    // مسیرهای مربوط به محصول
    Route::prefix("Product")->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('Account.Product.Index');
        Route::get('/show', [ProductController::class, "show"])->name('Account.Product.Create');
        Route::post('/create', [ProductController::class, "storeProduct"])->name('Account.Product.storeProduct');
        Route::get('/Products', [ProductController::class, "Products"])->name('Account.Product.Products');
        Route::get('/Edit/{id}', [ProductController::class, "Edit"])->name('Account.Product.Edit');
        Route::post('/Update/{id}', [ProductController::class, "update"])->name('Account.Product.update');
        Route::get('/Delete/{id}', [ProductController::class, "Delete"])->name('Account.Product.Delete');
    });
    Route::prefix("User")->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('Account.User.Index');
        Route::post('/create', [UserController::class, "storeUser"])->name('Account.User.storeUser');
        Route::get('/users', [UserController::class, "Users"])->name('Account.User.Users');
        Route::get('/Edit/{id}', [UserController::class, "Edit"])->name('Account.User.Edit');
        Route::post('/Update/{id}', [UserController::class, "update"])->name('Account.User.update');
        Route::get('/Delete/{id}', [UserController::class, "Delete"])->name('Account.User.Delete');



Route::get('/user/{id}/orders', [OrderController::class, 'userOrders'])->name('Account.User.Orders');



    });
    Route::prefix("dashboard")->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'count'])->name('dashboard');


    });
    Route::prefix("basket")->group(function () {

        Route::get('/show', [BasketController::class, 'showBasketAdmin'])->name('Account.Basket.show');
        Route::get('/Delete/{id}', [BasketController::class, "Delete"])->name('Account.Basket.Delete');
        Route::patch('/updateQuantity/{id}', [BasketController::class, 'updateQuantity'])->name('basket.updateQuantity');


    });

    Route::prefix("order")->group(function () {
        Route::get('orders', [OrderController::class, 'adminOrders'])->name('Account.Order.show');
        Route::put('/update/{id}', [OrderController::class, 'updateOrderStatus'])->name('admin.updateOrderStatus');
    });
});

// مسیرهای عمومی (بدون نیاز به ادمین)
Route::namespace("Home")->group(function () {
    Route::get('/', [HomeController::class, "Home"])->name('Home');
    Route::get('/product/{id}', [HomeController::class, "product"])->name('product');
    Route::get('category/{id}/products', [HomeController::class, 'showCategoryProducts'])->name('category.products');

});

// مسیرهای مربوط به اسلایدر
Route::prefix("Slider")->group(function () {
    Route::get('/create', [SliderController::class, "create"])->name('Account.Slider.Create');
    Route::post('/create', [SliderController::class, "sliderImage"])->name('Account.Slider.sliderImage');
    Route::get('/Sliders', [SliderController::class, "Sliders"])->name('Account.Slider.Sliders');
    Route::get('/Delete/{id}', [SliderController::class, "Delete"])->name('Account.Slider.Delete');
});

// مسیرهای احراز هویت
Route::namespace("Auth")->group(function () {
    Route::get('/Register', [AuthController::class, "FormRegister"])->name('FormRegister');
    Route::post('/Register', [AuthController::class, "Register"])->name('Register');

    Route::get('/Login', [AuthController::class, "FormLogin"])->name('FormLogin');
    Route::post('/Login', [AuthController::class, "Login"])->name('Login');

    Route::get('/profile', [AuthController::class, 'ShowProfile'])->name('ShowProfile');
    Route::get('/Edit/{id}', [AuthController::class, "EditProfile"])->name('editProfile');
    Route::post('/Update/{id}', [AuthController::class, "updateProfile"])->name('updateProfile');
    Route::post('/logout', [AuthController::class, 'Logout'])->name('Logout');


    Route::post('/order', [OrderController::class, 'store'])->name('order.factor');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

});

Route::prefix("basket")->group(function () {
    Route::post('/add', [BasketController::class, 'addToBasket'])->name('basket.add');
    Route::get('/DeleteBasket/{id}', [BasketController::class, "DeleteUser"])->name('basket.Delete');
    Route::get('/basket', [BasketController::class, 'showFactor'])->name('basket.Factor');

});

Route::prefix('store')->group(function(){
    Route::get('/stores/question', [StoreController::class, 'question'])->name('store.question');
    Route::get('/stores/create', [StoreController::class, 'create'])->name('store.create');
    Route::post('/stores', [StoreController::class, 'store'])->name('store.store');
    Route::get('/stores', [StoreController::class, "stores"])->name('store.stores');
    Route::get('/Edit/{id}', [StoreController::class, "Edit"])->name('store.Edit');
    Route::post('/Update/{id}', [StoreController::class, "update"])->name('store.update');
    Route::get('/Delete/{id}', [StoreController::class, "Delete"])->name('store.Delete');
});






