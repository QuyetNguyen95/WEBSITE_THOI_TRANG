<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\ Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;
use App\Models\Order;
use App\Models\Transaction;

class HomeController extends FrontendController
{

	public function __construct()
	{
		parent::__construct();
	}

    public function index(Request $request)
    {

        //Lấy danh mục nổi bật

    	$getListHotAndActiveProduct = Product::where([
    		'pro_active' => Product::STATUS_PUBLIC,
    		'pro_hot'	 => Product::HOT_PUBLIC
        ])->limit(10)->get();

        //lấy các sản phẩm cùng loại bạn đã mua
        $listProduct = [];
        if (get_data_user('web')) {
            //lấy id transaction của sản phẩm
            $listIdTransaction = Transaction::where([
                'tr_user_id' => get_data_user('web'),
                'tr_status'  => 1
            ])->pluck('id');
            //lấy id của product thuộc transaction
            $listIdProduct = Order::whereIn('or_transaction_id',$listIdTransaction)->distinct()->pluck('or_product_id');
            //lấy danh mục của sản phẩm
            $listIdCategory = Product::whereIn('id',$listIdProduct)->distinct()->pluck('pro_category_id');
            //Láy thông tin sản phẩm dựa vào listIdCategory
            $listProduct = Product::whereIn('pro_category_id',$listIdCategory)->limit(6)
            ->orderBy('id','desc')->get();
        }

            // code cùi nhưng chưa biết làm sao
        //PHẦN ÁO NAM
            //Lấy sản phẩm thuộc danh mục thời trang  asc

            $getListAscMans = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 21
            ])->orderBy('id','asc')->limit(3)->get();

            //Lấy sản phẩm thuộc danh mục thời trang  desc

            $getListDescMans = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 21
            ])->orderBy('id','desc')->limit(3)->get();

           //Lấy sản phẩm thuộc danh mục thời trang  asc

            $getListAscMans1 = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_hot'    => Product::HOT_PUBLIC,
            'pro_category_id' => 21
            ])->orderBy('id','asc')->limit(3)->get();

            //Lấy sản phẩm thuộc danh mục thời trang  desc

            $getListDescMans1 = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_hot'    => Product::HOT_PUBLIC,
            'pro_category_id' => 21
            ])->orderBy('id','desc')->limit(3)->get();

        //PHẦN ÁO NỮ

            //Lấy sản phẩm thuộc danh mục thời trang  asc

            $getListAscWomens = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 22
            ])->orderBy('id','asc')->limit(3)->get();

            //Lấy sản phẩm thuộc danh mục thời trang  desc

            $getListDescWomens = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 22
            ])->orderBy('id','desc')->limit(3)->get();

           //Lấy sản phẩm thuộc danh mục thời trang  asc

            $getListAscWomens1 = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_hot'    => Product::HOT_PUBLIC,
            'pro_category_id' => 22
            ])->orderBy('id','asc')->limit(3)->get();

            //Lấy sản phẩm thuộc danh mục thời trang  desc

            $getListDescWomens1 = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_hot'    => Product::HOT_PUBLIC,
            'pro_category_id' => 22
            ])->orderBy('id','desc')->limit(3)->get();

         //Kids
            $getListAscKids = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 25
            ])->orderBy('id','asc')->limit(3)->get();

            //Lấy sản phẩm thuộc danh mục thời trang  desc

            $getListDescKids = Product::where([
            'pro_active' => Product::STATUS_PUBLIC,
            'pro_category_id' => 25
            ])->orderBy('id','desc')->limit(3)->get();


            //show tin tức ra ngoài màn hình chính, show 3 tin tức hot and active

            $listArticles = Article::where([
            'a_active' => Article::STATUS_PUBLIC,
            'a_hot'    => Article::HOT_PUBLIC
            ])->orderBy('id','desc')->limit(5)->get();


            //show  các sản phẩm thuộc phần banner
            $bannerProduct1 = Article::select('a_avatar','id','a_slug')->where('id',22)->first();

            $bannerProduct2 = Product::select('pro_avatar','id','pro_slug')->where('id',117)->first();

            $bannerProduct3 = Product::select('pro_avatar','id','pro_slug')->where('id',87)->first();

            $bannerProduct5 = Product::select('pro_avatar','id','pro_slug')->where('id',144)->first();

            $bannerProduct4 = Product::select('pro_avatar','id','pro_slug')->where('id',145)->first();

            $bannerProduct6 = Product::select('pro_avatar','id','pro_slug')->where('id',112)->first();

            //show ra sản phẩm bán chạy
            $productBestSells = Product::where('pro_pay','>',0)->limit(5)->orderBy('pro_pay','desc')->get();



    	$data = [
            'getListHotAndActiveProduct' => $getListHotAndActiveProduct,
            'productBestSells'           => $productBestSells,
            'getListAscMans'             => $getListAscMans,
            'getListDescMans'            => $getListDescMans,
            'getListAscMans1'            => $getListAscMans1,
            'getListDescMans1'           => $getListDescMans1,

            'getListAscWomens'           => $getListAscWomens,
            'getListDescWomens'          => $getListDescWomens,
            'getListAscWomens1'          => $getListAscWomens1,
            'getListDescWomens1'         => $getListDescWomens1,

            'getListAscKids'             => $getListAscKids,
            'getListDescKids'            => $getListDescKids,
            'listArticles'               => $listArticles,


            'bannerProduct2'             => $bannerProduct2,
            'bannerProduct1'             => $bannerProduct1,
            'bannerProduct5'             => $bannerProduct5,
            'bannerProduct3'             => $bannerProduct3,
            'bannerProduct4'             => $bannerProduct4,
            'bannerProduct6'             => $bannerProduct6,
            'listProduct'                => $listProduct
        ];



    	return view('home.index',$data);
    }


    public function quickView($id)
    {
        $product = Product::find($id);
        $html = view('home.quickProduct',compact('product'))->render();
        return \response()->json($html);
    }

    public function renderViewProduct(Request $request)
    {
        if($request->ajax())
        {
            $listId = $request->listId;
            $justWatchProducts = Product::whereIn('id',$listId)->limit(4)->get();
            $html = view("home.just_watch_product",compact('justWatchProducts'))->render();
            return response()->json($html);
        }
    }
}
