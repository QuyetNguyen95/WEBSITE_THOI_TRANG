<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Http\Controllers\FrontendController;
use App\Http\Requests\RequestResetPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends FrontendController
{

    public function __construct()
	{
		parent::__construct();
    }

 // show form lấy lại mật khẩu
    public function getFormResetPassword()
    {
        return view('auth.passwords.email');
    }

    //gửi link lấy lại mật khẩu tới email người dùng
    public function sendCodeResetPassword(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where('email',$email)->first();
        if (!$checkUser) {
        	return redirect()->back()->with('danger','Email không tồn tại');
        }
        $code = bcrypt(md5(time().$email));
        $checkUser->code = $code;
        $checkUser->time_code = Carbon::now();
        $checkUser->save();
        $url = route('get.link.reset.password',['code'=> $checkUser->code,'email'=>$email]);
        //link lấy lại mật khẩu
        $data = [
        	'route' => $url
        ];

        //cú pháp send mail
         Mail::send('email.reset_pass', $data, function($message) use ($email){
	        $message->to($email, 'Reset Password')->subject('Lấy lại mật khẩu!');
	    });
        return redirect()->back()->with('success','Link lấy lại mật khẩu đã được gửi vào email của bạn');
    }

    //show form cập nhật lại mật khẩu

    public function resetPassword(Request $request)
    {

        $code = $request->code;
        $email = $request->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser)
        {
            return redirect()->back()->with('danger','Xin lỗi, đường dẫn lấy lại mật khẩu không đúng, xin vui lòng thử lại sau!');
        }
        return view('auth.passwords.reset');
    }

    //post mật khẩu đã thay đổi vào database

    public function saveResetPassword(RequestResetPassword $requestResetPassword)
    {

        $code = $requestResetPassword->code;
        $email = $requestResetPassword->email;
        $checkUser = User::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkUser)
        {
            return redirect()->back()->with('danger','Xin lỗi, đường dẫn lấy lại mật khẩu không đúng, xin vui lòng thử lại sau!');
        }

        $checkUser->password = bcrypt($requestResetPassword->password);
        $checkUser->save();
        return redirect()->route('get.login')->with('success','Thay đổi mật khẩu thành công, mời bạn đăng nhập lại');
    }

}
