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

Route::middleware(['business.selected'])->group(function () {

    Route::get('/dashboard', function () {

        $businessId = BusinessContext::get();

        return "Dashboard Business ID : " . $businessId;

    })->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('business.select');
});