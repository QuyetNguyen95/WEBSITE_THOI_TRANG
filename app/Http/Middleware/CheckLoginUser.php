<?php

namespace App\Http\Middleware;
use Closure;

class CheckLoginUser
{

    public function handle($request, Closure $next)
    {
        if(!get_data_user('web'))
        {
            return redirect()->route('get.login')->with('alert','Xin hãy đăng nhập trước khi thanh toán');
        }
        return $next($request);
    }
}
