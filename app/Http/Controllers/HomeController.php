<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\ Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;

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
    	$data = [
            'getListHotAndActiveProduct' => $getListHotAndActiveProduct,

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
            'listArticles'               => $listArticles
        ];



    	return view('home.index',$data);
    }


    public function quickView($id)
    {
        $product = Product::find($id);
        $html = view('home.quickProduct',compact('product'))->render();
        return \response()->json($html);
    }
}
