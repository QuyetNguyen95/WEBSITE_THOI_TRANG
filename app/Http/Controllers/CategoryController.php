<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\FrontendController;

class CategoryController extends FrontendController
{

	public function __construct()
	{
		parent::__construct();
	}
    public function getListProduct(Request $request)
    {



        //show danh sách các loại sản phẩm

    	//show product of category
    	$getCategorySingle = preg_split('/(-)/i',$request->segment(2));

    	$listProduct = Product::where('pro_active',Product::STATUS_PUBLIC);


        //lộc sản phẩm
    	$category =[];
    	$id = array_pop($getCategorySingle);

		$category = Category::find($id);
        $listProduct = $listProduct->where('pro_category_id',$id);

         //show danh sách các loại sản phẩm

		$listProductTypes = Product::where('pro_category_id',$id)->distinct()->pluck('pro_type');


    	//lọc sản phẩm theo loại

    	if ($request->type) {
    		$type = $request->type;
    		$listProduct = Product::where([
    			'pro_type' => $type,
    			'pro_category_id' => $id
    		]);
    	}

    	//Tìm kiếm sản phẩm

    	if ($request->key) {
    		$listProduct = Product::where('pro_name','like',"%".$request->key.'%');
    	}

    	//Lọc sản phẩm  yeu cau

    	if ($request->order) {
    		$order = $request->order;
    		switch ($order) {
    			case 'new':
    				$listProduct = $listProduct->orderBy('id','desc');
    				break;
 				case 'old':
    				$listProduct = $listProduct->orderBy('id','asc');
    				break;
    			case 'increment':
    				$listProduct = $listProduct->orderBy('pro_price','asc');
    				break;
    			case 'decrement':
    				$listProduct = $listProduct->orderBy('pro_price','desc');
                    break;
                default:
                $listProduct = $listProduct->orderBy('id','DESC');
    		}
		}
        //lọc sản phẩm theo giá cả
        if($request->price)
        {
            $price = $request->price;
            switch ($price) {
                case '1':
                    $listProduct = $listProduct->where('pro_price','<',100000);
                    break;

                case '2':
                    $listProduct = $listProduct->whereBetween('pro_price',[100000,300000]);
                    break;
                case '3':
                    $listProduct = $listProduct->whereBetween('pro_price',[300000,500000]);
                    break;
                case '4':
                    $listProduct = $listProduct->whereBetween('pro_price',[500000,700000]);
                    break;
                case '5':
                    $listProduct = $listProduct->whereBetween('pro_price',[700000,1000000]);
                    break;
                case '6':
                    $listProduct = $listProduct->where('pro_price','>',1000000);
                    break;
            }
         }

         //lọc sản phẩm theo size
         if ($request->size) {
            $size = $request->size;
            switch ($size) {
                case 'M':
                    $listProduct = $listProduct->where('pro_size','like','%M%');
                    break;
                case 'L':
                    $listProduct = $listProduct->where('pro_size','like','%L%');
                break;
                case 'S':
                    $listProduct = $listProduct->where('pro_size','like','%S%');
                    break;
                case 'XL':
                    $listProduct = $listProduct->where('pro_size','like','%XL%');
                    break;
            }
         }

         //lọc sản phẩm theo color
         if ($request->color) {
            $color = $request->color;
            switch ($color) {
                case 'xanh':
                    $listProduct = $listProduct->where('pro_color','like','%xanh%');
                    break;
                case 'đỏ':
                    $listProduct = $listProduct->where('pro_color','like','%đỏ%');
                break;
                case 'trang':
                    $listProduct = $listProduct->where('pro_color','like','%trang%');
                    break;
                case 'hong':
                    $listProduct = $listProduct->where('pro_color','like','%hong%');
                    break;
                case 'đen':
                    $listProduct = $listProduct->where('pro_color','like','%đen%');
                    break;
                case 'vang':
                    $listProduct = $listProduct->where('pro_color','like','%vang%');
                    break;
            }
         }

        $listProduct = $listProduct->paginate(12);

        //lấy các ti tức nỗi bật
        $hotArticles = Article::where('a_hot',Article::HOT_PUBLIC)->orderBy('id','desc')->limit(4)->get();



    	$data = [
			'listProduct'      => $listProduct,
			'category'         => $category,
			'listProductTypes' => $listProductTypes,
            'query'            => $request->query(),
            'hotArticles'      => $hotArticles

    	];

    	return view('product.index',$data);
    }
}
