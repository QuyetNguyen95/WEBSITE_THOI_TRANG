<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminWarehouseController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index(Request $request)
    {
       // dd($request->choice);

        $products = Product::where('pro_active',1);

        //show ra sản phẩm bán chạy
        if ($request->choice == '1' || !isset($request->choice)) {
            $products = Product::where('pro_pay','>',0);
        }

        //show ra sản phẩm tồn kho
        if ($request->choice == '2') {
            $products = Product::where('pro_pay',0);
        }

        //show ra sản phẩm đã hết
        if ($request->choice == '3') {
            $products = Product::where('pro_number',0);
        }
        //tìm kiếm theo tên
        if($request->name) $products = $products->where('pro_name','like','%'.$request->name.'%');
        //lấy ra sản phẩm
        $products = $products->orderBy('pro_pay','desc')->paginate(10);
        return view('admin::warehouse.index',compact('products'));
    }
}
