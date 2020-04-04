<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminRatingController extends AdminHeaderController
{


    public function __construct()
	{
		parent::__construct();
	}
    //show danh sách các đánh giá
    public function index()
    {
        $listRating = Rating::with('user:id,name','product:id,pro_name')->paginate(10);
        return view('admin::rating.index',compact('listRating'));
    }

    //xóa các đánh giá trong danh sách

    public function action($action, $id)
   {
   		$deleteUser = Rating::find($id);
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
