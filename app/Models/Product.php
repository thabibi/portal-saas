<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Helpers\BusinessContext;
//use App\Scopes\BusinessScope;
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
    }
       

        public function business()
        {
            return $this->belongsTo(Business::class);
        }
}
       