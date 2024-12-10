<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Account\ProductController;
use App\Http\Controllers\Account\CategoryController;

// مسیرهای مربوط به مدیریت (فقط برای کاربران ادمین)
Route::middleware([IsAdmin::class])->prefix("Account")->group(function () {

    // مسیرهای مربوط به دسته‌بندی
    Route::prefix("category")->group(function () {

        Route::get('/create', [CategoryController::class, "create"])->name('Account.Category.Create');
        Route::post('/create', [CategoryController::class, "storeImage"])->name('Account.Category.storeImage');
        Route::get('/Categories', [CategoryController::class, "Categories"])->name('Account.Category.Categories');
        Route::get('/Edit/{id}', [CategoryController::class, "Edit"])->name('Account.Category.Edit');
        Route::post('/Edit/{id}', [CategoryController::class, "update"])->name('Account.Category.update');
        Route::get('/Delete/{id}', [CategoryController::class, "Delete"])->name('Account.Category.Delete');
    });

    // مسیرهای مربوط به محصول
    Route::prefix("Product")->group(function () {
        Route::get('/create', [ProductController::class, "create"])->name('Account.Product.Create');
        Route::post('/create', [ProductController::class, "storeProduct"])->name('Account.Product.storeProduct');
        Route::get('/Products', [ProductController::class, "Products"])->name('Account.Product.Products');
        Route::get('/Edit/{id}', [ProductController::class, "Edit"])->name('Account.Product.Edit');
        Route::post('/Edit/{id}', [ProductController::class, "update"])->name('Account.Product.update');
        Route::get('/Delete/{id}', [ProductController::class, "Delete"])->name('Account.Product.Delete');

        // مسیرهای مربوط به تصاویر
        Route::get('/Createimage/{id}', [ProductController::class, "Createimage"])->name('Account.Product.Createimage');
        Route::post('/Createimage/{id}', [ProductController::class, "storeimage"])->name('Account.Product.storeimage');
        Route::get('/images/{id}', [ProductController::class, "images"])->name('Admin.Product.images');
        Route::get('/DeleteImage/{id}', [ProductController::class, "imgDelete"])->name('Account.Product.imgDelete');

        // مسیرهای مربوط به رنگ‌ها
        Route::get('/Createcolor/{id}', [ProductController::class, "Createcolor"])->name('Account.Product.Createcolor');
        Route::post('/Createcolor/{id}', [ProductController::class, "storecolor"])->name('Account.Product.storecolor');
        Route::get('/colors/{id}', [ProductController::class, "colors"])->name('Admin.Product.colors');
        Route::get('/DeleteColor/{id}', [ProductController::class, "colorDelete"])->name('Account.Product.colorDelete');
    });
});

// مسیرهای عمومی (بدون نیاز به ادمین)
Route::namespace("Home")->group(function () {
    Route::get('/', [HomeController::class, "Home"])->name('Home');
    Route::get('/product/{id}', [HomeController::class, "product"])->name('product');
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

});




