<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;

class BusinessController extends Controller
{
    public function select()
    {
        $businesses = Auth::user()->businesses;
        return view('business.select', compact('businesses'));
    }

    public function switch(Business $business)
    {
        session(['business_id' => $business->id]);
        return redirect()->route('products.index');
    }
}
