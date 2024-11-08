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
    });
});
