<?php

use App\Http\Controllers\account\CategoryController;
use App\Http\Controllers\account\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/Account', function () {
    return view('Admin.index');
});

Route::prefix("Account")->group(function () {

    Route::prefix("category")->group(function () {

        Route::get('/create',[CategoryController::class,"create"])->name('Account.Category.Create');
        Route::post('/create',[CategoryController::class,"storeImage"])->name('Account.Category.storeImage');
        Route::get('/Categories',[CategoryController::class,"Categories"])->name('Account.Category.Categories');
        Route::get('/Edit/{id}',[CategoryController::class,"Edit"])->name('Account.Category.Edit');
        Route::post('/Edit/{id}',[CategoryController::class,"update"])->name('Account.Category.update');
        Route::get('/Delete/{id}',[CategoryController::class,"Delete"])->name('Account.Category.Delete');
    });
    Route::prefix("Product")->group(function () {

        Route::get('/create',[ProductController::class,"create"])->name('Account.Product.Create');
        Route::post('/create',[ProductController::class,"storeProduct"])->name('Account.Product.storeProduct');
        Route::get('/Products',[ProductController::class,"Products"])->name('Account.Product.Products');
        Route::get('/Edit/{id}',[ProductController::class,"Edit"])->name('Account.Product.Edit');
        Route::post('/Edit/{id}',[ProductController::class,"update"])->name('Account.Product.update');
        Route::get('/Delete/{id}',[ProductController::class,"Delete"])->name('Account.Product.Delete');
        //image
        Route::get('/Createimage/{id}',[ProductController::class,"Createimage"])->name('Account.Product.Createimage');
        Route::post('/Createimage/{id}',[ProductController::class,"storeimage"])->name('Account.Product.storeimage');
        Route::get('/images/{id}',[ProductController::class,"images"])->name('Admin.Product.images');
        Route::get('/DeleteImage/{id}',[ProductController::class,"imgDelete"])->name('Account.Product.imgDelete');
        //color
        Route::get('/Createcolor/{id}',[ProductController::class,"Createcolor"])->name('Account.Product.Createcolor');
        Route::post('/Createcolor/{id}',[ProductController::class,"storecolor"])->name('Account.Product.storecolor');
        Route::get('/colors/{id}',[ProductController::class,"colors"])->name('Admin.Product.colors');
        Route::get('/DeleteColor/{id}',[ProductController::class,"colorDelete"])->name('Account.Product.colorDelete');
    });
});
