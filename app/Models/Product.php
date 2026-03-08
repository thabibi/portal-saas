<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\BusinessContext;
use App\Models\Scopes\BusinessScope;

class Product extends Model
{
    protected $fillable = [
        'business_id', 
        'name', 
        'price',
        'stock'
        ];

    protected static function booted()
    {   
        static::addGlobalScope(new BusinessScope);

        //ini fungsi untuk business_id Injeksi
        static::creating(function ($product){
            if(!$product->business_id)
                {
                    $product->business_id = BusinessContext::get();
                }
        });
    }
       

        public function business()
        {
            return $this->belongsTo(Business::class);
        }
}
       