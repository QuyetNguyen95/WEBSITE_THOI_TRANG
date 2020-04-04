<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginRatting
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
        if(!get_data_user('web'))
        {
            return redirect()->back();
        }
        return $next($request);
    }
}
