<?php

namespace App\Traits\Models;

use Illuminate\Database\Eloquent\Builder;

trait AutomatedScopes
{
    public function scopeWithAllRelations($query)
    {
        return $query->with(self::ALL_RELATIONS);
    }
    public function scopeWithAllRelationsConditioned($query)
    {
        return $query->with(self::ALL_RELATIONS_CONDITIONED);
    }
}