<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\BusinessContext;
use App\Models\Business;


//Menampilkan daftar bisnis yang dipiih user
Route::get('/select-business', function (){
    $businesses = Business::all();
    return "Halaman Pilih Bisnis";

})->name('business.select');

//Untuk simpan session bisnis id yang dipilih kemudian ke dashboard
Route::post('/select-business/{id}', function ($id){
    BusinessContext::set($id);
    return redirect('/dashboard');

})->name('busines.set');

Route::middleware(['business.selected'])->group(function () {
    Route::get('/dashboard', function () {
        $businessId = \App\Helpers\BusinessContext::get();

        return "Dashboard Business";
    });
});

Route::get('/', function () {
    return view('welcome');
});
