<?php

namespace App\Http\Middleware;

use Closure;

class CheckCart
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
        $totalItemsInCart = getItemsInCart();
        if ($totalItemsInCart == 0) {
            return redirect('/shopping-cart');
        }

        return $next($request);
    }
}
