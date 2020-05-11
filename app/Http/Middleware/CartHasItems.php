<?php

namespace App\Http\Middleware;

use Closure;

class CartHasItems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cartItems = session('cart.items');
        if ($cartItems) {
            return $next($request);
        }
        return redirect()->route('website.products.index')->withInfo([
            'title' => 'Your cart is empty',
            'description' => 'Please add some items first',
        ]);
    }
}
