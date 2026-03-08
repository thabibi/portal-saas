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
        'price',
        'stock'
        ];

    protected static function booted()
    {   //Global scope untuk auto filter business
        static::addGlobalScope('business', function(Builder $builder) {
            if (session('business_id')) {
                $builder->where('business_id', session('business_id'));
            }
        });
    }
       

        public function business()
        {
            return $this->belongsTo(Business::class);
        }
}
       