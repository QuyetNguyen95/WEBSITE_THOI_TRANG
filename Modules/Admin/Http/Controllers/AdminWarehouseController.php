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

        $products = Product::where('pro_active',1);

        //show ra sản phẩm bán chạy
        if ($request->type == 'selling' || !isset($request->type)) {
            $products = Product::where('pro_pay','>',0);
        }

        //show ra sản phẩm tồn kho
        if ($request->type == 'inventory') {
            $products = Product::where('pro_pay',0);
        }

        //lấy ra sản phẩm
        $products = $products->orderBy('pro_pay','desc')->paginate(10);
        return view('admin::warehouse.index',compact('products'));
    }
}
