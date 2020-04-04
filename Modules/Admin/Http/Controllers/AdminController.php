<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Models\Rating;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        //đếm số thành viên
        $userCount = User::count();

        //Đếm số sản phẩm
        $productCount = Product::count();

        //đếm số bài viết

        $articleCount = Article::count();

        //đếm số lượt đánh giá

        $ratingCount = Rating::count();

        //danh sách đơn hàng

        $transactions = Transaction::with('user:id,name')->orderBy('id','desc')->limit(10)->get();

        //danh sách thành viên

        $users = User::select('name','phone','email')->whereraw(1)->limit(10)->get();

        //doanh thu ngày
        $dayMoney = Transaction::whereDay('updated_at',date('d'))->where('tr_status',1)->sum('tr_total');

        // doanh thu tuần

        $weekMoney = Transaction::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->where('tr_status',1)->sum('tr_total');

        //doanh thu tháng
        $monthMoney = Transaction::whereMonth('updated_at',date('m'))->where('tr_status',1)->sum('tr_total');

        //tính số lượng của từng danh mục sản phẩm
        //lấy danh mục sản phẩm
        $categorys = Category::select('id')->get();
        $arrayCate = $categorys->toArray();
        foreach ($arrayCate as $value) {
            $products = Product::whereIn('id',$value)->count();
        }


        $data = [
            'userCount'     => $userCount,
            'productCount'  => $productCount,
            'articleCount'  => $articleCount,
            'ratingCount'   => $ratingCount,
            'transactions'  => $transactions,
            'users'         => $users,
            'dayMoney'      => $dayMoney,
            'monthMoney'    => $monthMoney,
            'weekMoney'     => $weekMoney
        ];
        return view('admin::home.index',$data);
    }
}
