<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $guarded = [];
    protected $dates = ['expires_in'];

    protected $casts = [
        'expires_in' => 'date:Y-m-d',
    ];

    public function isValid()
    {
    	return $this->is_active == 1 && $this->expires_in->isFuture();
    }
}
