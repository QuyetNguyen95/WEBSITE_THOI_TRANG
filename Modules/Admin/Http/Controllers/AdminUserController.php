<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
class AdminUserController extends Controller
{
    
    public function index()
    {
    	$users = User::whereRaw(1);
    	$users = $users->orderBy('id','ASC')->paginate(10);
        return view('admin::user.index',compact('users'));
    }

   public function action($action, $id)
   {
   		$deleteUser = User::find($id);
   		if ($action) {
   			switch ($action) {
   				case 'delete':
   					$deleteUser->delete();
            return redirect()->back()->with('danger','Xóa sản phẩm thành công');
   					break;
   			}
   		}
   }
}
