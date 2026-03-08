<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\BusinessContext;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/business/select', function () {
        //nilai kembali pada variabel business\select.blade.php
        //dd(Auth::id(), Auth::user()->businesses);
        $businesses = Auth::user()->businesses;

        return view('business.select', compact ('businesses'));
    })->name('business.select');
    
});

Route::middleware(['auth','business.selected'])->group(function () {

    Route::get('/dashboard', function () {

        $businessId = BusinessContext::get();

        return "Dashboard Business ID : ".$businessId;

    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';