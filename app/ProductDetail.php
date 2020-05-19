<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\AutomatedScopes;
class ProductDetail extends Model
{
    use AutomatedScopes;

    const ALL_RELATIONS = ['product'];
    protected $table = 'products_details';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
