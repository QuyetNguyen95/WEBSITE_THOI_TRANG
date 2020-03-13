<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends FrontendController
{

    use AuthenticatesUsers;

   public function getLogin()
   {
        return view('auth.login');
   }

   public function getLogout()
   {
        Auth::logout();
        return redirect()->route('home');
   }


   public function postLogin(Request $request)
   {
       $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
             return redirect()->route('home')->with('alert','Đăng nhập thành công');
        } else {
            return redirect()->back()->with('alert','Mật khẩu hoặc email của bạn không đúng!!');
        }
   }
}
