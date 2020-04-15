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
use App\User;
use Modules\Admin\Http\Controllers\AdminHeaderController;

class AdminInformationController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}
    //show thông tin admin
    public function updateInfo()
    {
        $admin = Auth::guard('admins')->user();
        return view('admin::information.index',compact('admin'));
    }

    //cập nhật thông tin admin
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
    //show giao diện update password
    public function updatePass()
    {
        return view('admin::information.update_pass');
    }
    //lưu password mới
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
    //show danh sách nhân viên
    public function showStaff()
    {
        $users = Admin::where('role',2)->orderBy('id','desc')->get();
        return view('admin::information.staff',compact('users'));
    }
    //xóa nhân viên
    public function action($action, $id)
   {
   		$deleteUser = Admin::find($id);
   		if ($action) {
   			switch ($action) {
   				case 'delete':
   					$deleteUser->delete();
                    return redirect()->back()->with('danger','Xóa nhân viên thành công');
   					break;
   			}
   		}
   }

   //show giao diện thêm nhân viên
   public function addStaff()
   {
       return view('admin::information.add_staff');
   }
   //lưu thông tin của nhân viên
   public function postStaff(RequestUpdateUser $requestUpdateUser)
   {
        $staff = new Admin();
        $staff->name = $requestUpdateUser->name;
        $staff->email = $requestUpdateUser->email;
        $staff->phone = $requestUpdateUser->phone;
        $staff->role = $requestUpdateUser->role;
        //set mật khẩu mặc định của nhân viên là 123456
        $staff->password = bcrypt(123456);
        $staff->save();
        return redirect()->back()->with('success','Thêm nhân viên thành công!!');
   }
}
