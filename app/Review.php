<?php

namespace App;

use App\Traits\Models\AutomatedScopes;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use AutomatedScopes;

    protected $guarded = [];
    
    const ALL_RELATIONS = ['product', 'user'];
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
