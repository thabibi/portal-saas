<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\BusinessContext;
use App\Models\Business;


//Menampilkan daftar bisnis yang dipiih user
Route::get('/select-business', function (){
    $businesses = Business::all();
    return view('business.select', [
        'businesses' => $businesses
    ]);

})->name('business.select');

//Untuk simpan session bisnis id yang dipilih kemudian ke dashboard
Route::post('/select-business/{id}', function ($id){
    BusinessContext::set($id);
    return redirect('/dashboard');

})->name('business.set');

Route::middleware(['business.selected'])->group(function () {
    Route::get('/dashboard', function () {
        $businessId = BusinessContext::get();

        return "Dashboard Business ID : ".$businessId;
    });
});

Route::get('/', function () {
    return view('welcome');
});
