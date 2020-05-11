<?php

namespace App;

use App\Traits\Models\AutomatedScopes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    use AutomatedScopes;

    const ALL_RELATIONS = ['order', 'product'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
