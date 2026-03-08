<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BusinessContext;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\BusinessSelected;

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

    Route::get('/business/select', function () {

        $businesses = Auth::user()->businesses;
        return view('business.select', compact('businesses'));

    })->name('business.select');


    /*
    |---------------------------------------
    | Switch Business
    |---------------------------------------
    */

    Route::get('/business/switch/{business}', function ($businessId) {

        session(['business_id' => $businessId]);

        return redirect()->route('products.index');

    })->name('business.switch');

});


/*
|--------------------------------------------------------------------------
| Business Context Routes
|--------------------------------------------------------------------------
| Semua module SaaS berada disini
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