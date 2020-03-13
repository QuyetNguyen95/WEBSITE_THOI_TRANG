<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
class RegisterController extends FrontendController
{

    public function getRegister()
    {
        return view('auth.register');
    }
   public function postRegister(RequestRegister $request)
   {

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = bcrypt($request->password);
       $user->save();


       if($user->id)
       {
       	return redirect()->route('get.login')->with('alert','Đăng ký thành công mời bạn đăng nhập!!');
       }
   }
}
