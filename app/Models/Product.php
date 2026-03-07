<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\BusinessContext;
use App\Scopes\BusinessScope;

class Product extends Model
{
    protected $fillable = [
        'business_id', 
        'name', 
        'price'
        ];

    protected static function booted()
    {   //Global scope untuk auto filter business

        static::addGlobalScope(new BusinessScope);

        //Auto isi business_id saat creat

        static::creating(function ($product) {
            $product->business_id = BusinessContext::get();
        });
    }

        public function business()
        {
            return $this->belongsTo(Business::class);
        }
}
       