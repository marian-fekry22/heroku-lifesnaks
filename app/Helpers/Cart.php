<?php

namespace App\Helpers;

class Cart
{
    static public function updateSession($cartItems)
    {
    	session(['cart.items' => $cartItems]);
    	session(['cart.total_number_of_items' => array_sum(array_column($cartItems, 'quantity'))]);
    	session(['cart.sub_total' => array_sum(array_column($cartItems, 'sub_total_per_product'))]);
    
    }
}
