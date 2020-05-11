<?php

namespace App\Http\Middleware;

use Closure;

class CartIsReviewed
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
        if (session('cart.is_reviewed')) {
            return $next($request);
        }
        return redirect()->route('website.carts.view')->withInfo([
            'title' => "You haven\'t reviewed your cart yet",
            'description' => 'Please review your cart first before checkout, Thank you!',
        ]);
    }
}
