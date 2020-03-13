<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class FrontendController extends Controller
{

	//lấy tất cả các danh mục c_active bằng 1
    public function __construct()
    {
    	$getCategoryList = Category::select('id','c_name','c_slug')->where('c_active',Category::HOME_PUBLIC)->get();
    	view()->share('getCategoryList', $getCategoryList);
    }
}
