<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Helpers\BusinessContext;

class BusinessScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $businessId = BusinessContext::get();

        if ($businessId) {
            $builder->where(
                $model->getTable().'.business_id',
                $businessId
            );
        }
    }
}