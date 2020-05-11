<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentNotification extends Model
{
    protected $table = 'payment_notifications';
    protected $casts = [
        'obj' => 'array'
    ];
}