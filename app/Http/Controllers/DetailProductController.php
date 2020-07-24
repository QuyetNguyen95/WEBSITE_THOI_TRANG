<?php

namespace App\Http\Controllers;
use Cart;
use Carbon\Carbon;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\ProccessViewService;
use App\Http\Controllers\FrontendController;

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
        //lấy pro_slug của sản phẩm


        $id = array_pop($getLinkProduct);
        //lưu sản phẩm đã xem vào database
        if(isset(Auth::user()->id))
        {
            try {
                \DB::table('viewed_product')->insert([
                    'vp_product_id' => $id,
                    'vp_user_id'    => Auth::user()->id,
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now()
                ]);
            } catch (\Exception $th) {
                //không xử lý
            }
        }
         //tính lượt xem của sản phẩm
         ProccessViewService::view('products','pro_view','product',$id);
		if ($id) {
			$getDetailProduct = Product::where('pro_active',Product::STATUS_PUBLIC)->find($id);
			$category = Category::find($getDetailProduct->pro_category_id);
        }

        //lấy danh sách các đánh giá show ra trang chi tiết sản phẩm
        $listRating = Rating::with('user:id,name,avatar','replys')->where('ra_product_id',$id)->orderBy('id','desc')->paginate(10);
        //thống kê đánh giá sản phẩm
        $ratingDashboard = Rating::groupBy('ra_number')->where('ra_product_id',$id)
        ->select(DB::raw('count(ra_number) as total'))->addSelect('ra_number')->get()->toArray();

        //set một mảng rổng
        $arrayRating = [];

        if($ratingDashboard)
        {
            for($i = 1; $i <=5; $i++)
            {
                //set $arrayRating các giá trị rỗng
                $arrayRating[$i] =
                [
                    'total'     => 0,
                    'ra_number' => 0
                ];
                //set các giá trị của ratingDasgboard vào $arrayRating
                foreach ($ratingDashboard as  $item) {
                    if($item['ra_number'] == $i)
                    {
                        $arrayRating[$i] = $item;
                    }
                }
            }
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
            'saleProducts'     => $saleProducts,
            'listRating'       => $listRating,
            'arrayRating'      => $arrayRating
		];
		return view('product.detail',$data);
	}
}
