<?php

use App\Http\Controllers\account\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/panel', function () {
    return view('Admin.index');
});

Route::prefix("Account")->group(function () {

    Route::prefix("category")->group(function () {

        Route::get('/create',[CategoryController::class,"create"])->name('Account.Category.Create');
        Route::post('/create',[CategoryController::class,"storeImage"])->name('Account.Category.storeImage');
        Route::get('/Categories',[CategoryController::class,"Categories"])->name('Account.Category.Categories');
    });
});
