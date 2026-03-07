<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\BusinessContext;
use App\Models\Business;

/*
|--------------------------------------------------------------------------
| Select Business
|--------------------------------------------------------------------------
*/

Route::get('/select-business', function () {

    $businesses = Business::all();

    return view('business.select', [
        'businesses' => $businesses
    ]);

})->name('business.select');


Route::post('/select-business/{id}', function ($id) {

    BusinessContext::set($id);

    return redirect()->route('dashboard');

})->name('business.set');


/*
|--------------------------------------------------------------------------
| Dashboard (butuh bisnis dipilih)
|--------------------------------------------------------------------------
*/

//Route Untuk Testing Dashboard tanpa login
Route::middleware(['business.selected'])->group(function () {

    Route::get('/dashboard', function () {

        $businessId = BusinessContext::get();

        return "Dashboard Business ID : " . $businessId;

    })->name('dashboard');

});


//Route Untuk Semua Role (wajib Login)
//Route::middleware(['auth','business.selected'])->group(function () {

  //  Route::get('/dashboard', function () {

    //    $businessId = BusinessContext::get();

      //  return "Dashboard Business ID : " . $businessId;

  //  })->name('dashboard');

//});

//Route Untuk Role Owner
Route::middleware(['auth', 'business.selected', 'role:owner'])->group(function ()
{
    Route::get('/business/settings', function (){
        return "Owner Setting";
    });
});

//Route Untuk Role Admin
Route::middleware(['auth', 'business.selected', 'role:admin'])->group(function ()
{
    Route::get('/products', function (){
        return "Product Management";
    });
});

//Route Untuk Role Operator
Route::middleware(['auth', 'business.selected', 'role:operator'])->group(function ()
{
    Route::get('/pos', function (){
        return "Pos Kasir";
    });
});

//Cara Penggunaan Route untuk Multi Role (Admin + Owner)
Route::middleware(['auth', 'business.selected', 'role:owner,admin'])->group(function ()
{
    //
});

//Cara Penggunaan Route untuk Multi Role (Admin + Owner +Operator)
Route::middleware(['auth', 'business.selected', 'role:owner,admin,operator'])->group(function ()
{
    //
});

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('business.select');
});