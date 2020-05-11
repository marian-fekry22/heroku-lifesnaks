<?php

namespace App;

use App\Traits\Models\AutomatedScopes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use AutomatedScopes;

    protected $guarded = [];
    
    const ALL_RELATIONS = [
        'promoCode', 'paymentMethod', 'orderStatus', 'user', 'orderProducts.product',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function promoCode()
    {
        return $this->belongsTo('App\PromoCode')->withDefault([
            'name' => 'N/A'
        ]);
    }
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod')->withDefault();
    }
    public function orderStatus()
    {
        return $this->belongsTo('App\OrderStatus')->withDefault();
    }
    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }
}
