<?php

use App\Http\Controllers\account\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/panel', function () {
    return view('Admin.index');
});

Route::prefix("Account")->group(function () {

    Route::prefix("category")->group(function () {

        Route::get('/account',[CategoryController::class,"create"])->name('Account.Category.Create');
    });
});
