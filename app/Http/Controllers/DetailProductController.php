<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class DetailProductController extends FrontendController
{
    public function __construct()
	{
		parent::__construct();
	}

	public function index(Request $req)
	{



        //chi tiết sản phẩm theo id
        $getLinkProduct = preg_split('/(-)/i',$req->segment(2));
		$id = array_pop($getLinkProduct);
		if ($id) {
			$getDetailProduct = Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
			$category = Category::find($getDetailProduct->pro_category_id);
        }

        //lấy các sản phẩm có liên quan đến sản phẩm trên

        if ($getDetailProduct->pro_type) {
            $id = $getDetailProduct->pro_category_id;
            $type = $getDetailProduct->pro_type;
            $relateProducts = Product::where([
                'pro_type' => $type,
                'pro_category_id' =>$id
            ])->orderBy('id','desc')->limit(6)->get();
		}

        //lấy sản phẩm giảm giá sốc
        $saleProducts = Product::where('pro_sale','>=',10)->orderBy('pro_sale','desc')->get();

		$data = [
			'getDetailProduct' => $getDetailProduct,
            'category'         => $category,
            'relateProducts'   => $relateProducts,
            'saleProducts'     => $saleProducts
		];
		return view('product.detail',$data);
	}
}
