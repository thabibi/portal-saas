<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\BusinessContext;

class Product extends Model
{
    protected $fillable = ['business_id', 'name', 'price'];

    protected static function booted()
    {
        static::addGlobalScope('business', function (Builder $builder){
            $businessId = BusinessContext::get();
            if ($businessId){
                $builder->where('business_id', $businessId);
            }
            
        
        });

        static::creating(function ($product){
            $product->business_id = BusinessContext::get();
        });
    }


    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}