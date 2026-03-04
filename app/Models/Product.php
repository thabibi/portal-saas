<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $fillable = ['business_id', 'name', 'price'];

    protected static function booted()
    {
        static::addGlobalScope('business', function (Builder $builder) {
            if (session()->has('business_id')) {
                $builder->where('business_id', session('business_id'));
            }
        });
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}