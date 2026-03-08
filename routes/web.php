<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BusinessContext;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\BusinessSelected;
use App\Http\Controllers\BusinessController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |---------------------------------------
    | Business Selection
    |---------------------------------------
    */

    Route::get('/business/select', [BusinessController::class, 'select'])
            ->name('business.select');

    Route::get('/business/switch/{business}', [BusinessController::class, 'switch'])
            ->name('business.switch');
});


/*
|--------------------------------------------------------------------------
| Business Area
|--------------------------------------------------------------------------
| 
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','business.selected'])->group(function () {

    /*
    |---------------------------------------
    | Dashboard
    |---------------------------------------
    */

    Route::get('/dashboard', function () {

        $businessId = BusinessContext::get();

        return "Dashboard Business ID : ".$businessId;

    })->name('dashboard');


    /*
    |---------------------------------------
    | Products Module
    |---------------------------------------
    */

    Route::resource('products', ProductController::class);


    /*
    |---------------------------------------
    | Profile
    |---------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


require __DIR__.'/auth.php';