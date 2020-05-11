<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentResponse extends Model
{
    protected $table = 'payment_responses';

    protected $casts = [
        'request' => 'array'
    ];
}
