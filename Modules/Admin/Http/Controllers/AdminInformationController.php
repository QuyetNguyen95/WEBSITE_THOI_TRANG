<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestPassword;
use App\Http\Requests\RequestUpdateUser;
use Modules\Admin\Http\Controllers\AdminHeaderController;

class AdminInformationController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function updateInfo()
    {
        $admin = Auth::guard('admins')->user();
        return view('admin::information.index',compact('admin'));
    }


    public function saveInfo(RequestUpdateUser $requestUpdateUser)
    {
        $admin = Admin::find(Auth::guard('admins')->user()->id);
        $admin->name = $requestUpdateUser->name;
        $admin->email = $requestUpdateUser->email;
        $admin->phone = $requestUpdateUser->phone;
        $admin->address = $requestUpdateUser->address;
        $admin->note = $requestUpdateUser->note;

        if ($requestUpdateUser->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $admin->avatar = $file['name'];
            }
        }
        $admin->save();
        return redirect()->back()->with('success','Cập nhật thành công!!');
    }

    public function updatePass()
    {
        return view('admin::information.update_pass');
    }

    public function savePass(RequestPassword $requestPassword)
    {
        if (Hash::check($requestPassword->old_password, Auth::guard('admins')->user()->password))
        {
            $admin = Admin::find(Auth::guard('admins')->user()->id);
            $admin->password = bcrypt($requestPassword->new_password);
            $admin->save();
            return redirect()->route('admin.login')->with('alert','Cập nhật mật khẩu thành công, xin mời đăng nhập lại!!');
        }else
        {
            return redirect()->back()->with('danger','Mật khẩu củ không đúng, xin mời nhập lại!!');
        }
    }
}
