<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

   public function getLogin()
   {
        return view('admin::auth.login');
   }

   public function login(Request $request)
   {
       $data = [
            'password' => $request->password,
            'email'    => $request->email
       ];
       //dd($data);
       if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('alert','Đăng nhập thành công');
       } else {
            return redirect()->back()->with('alert','Mật khẩu hoặc email của bạn không đúng!!');
       }

   }

   public function logoutAdmin()
   {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login')->with('alert','Đăng xuất thành công');
   }
}
