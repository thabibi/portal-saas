<?php

namespace App\Helpers;

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

}