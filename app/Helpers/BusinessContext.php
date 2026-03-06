<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class BusinessContext
{

    public static function set($businessId)
    {
        session(['business_id' => $businessId]);
    }

    public static function get()
    {
        return session('business_id');
    }

    public static function role()
    {
        $user = Auth::user();
        $businessId = self::get();

        if (!$user || !$businessId) {
            return null;
        }

        $business = $user->businesses()
            ->where('business_id', $businessId)
            ->first();

            return $business ? $business->pivot->role : null;
    }

}