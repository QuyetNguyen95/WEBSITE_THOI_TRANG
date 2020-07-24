<?php

namespace App\Http\Middleware;
use Closure;

class CheckLoginUser
{

    public function handle($request, Closure $next)
    {
        if(!get_data_user('web'))
        {
            return redirect()->route('get.login')->with('alert','Bạn cần đăng nhập để sử dụng chức năng này');
        }
        return $next($request);
    }
}
