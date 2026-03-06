<?php

namespace App\Helpers;

class BusinessContext
{
    public static function id()
    {
        return session('business_id');
    }

    public static function has()
    {
        return session()->has('business_id');
    }
}