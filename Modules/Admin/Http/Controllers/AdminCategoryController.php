<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\Product;

class AdminCategoryController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $categories = Category::select('id','c_name','c_active')->get();
        return view('admin::category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->isertOrUpdate($requestCategory);
        return redirect()->back()->with('success','Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update($id,RequestCategory $requestCategory )
    {
        $this->isertOrUpdate($requestCategory,$id);
        return redirect()->back()->with('info','Cập nhật danh mục thành công');
    }

    public function isertOrUpdate(RequestCategory $requestCategory, $id = '')
    {
        $category = new Category();
        if($id) $category = Category::find($id);
        $category->c_name            = $requestCategory->name;
        $category->c_slug            = str_slug($requestCategory->name);
        $category->c_icon            = $requestCategory->icon;
        $category->save();
    }

    public function action($action,$id)
    {
       $actionCategory = Category::find($id);
       if ($action) {
           switch ($action) {
               case 'delete':
                    //kiểm tra xem danh mục có sản phẩm hay không
                    //lấy id sản phẩm
                    $id_products = Product::where('pro_category_id',$id)->pluck('id');
                   // dd($id_products);
                    if(count($id_products) == 0)
                    {
                        $actionCategory->delete();
                        return redirect()->back()->with('danger','Xóa danh mục thành công');
                    }
                    else
                    {
                        return redirect()->back()->with('warning','Danh mục có sản phẩm! bạn không thể xóa');
                    }
                   break;
               case 'active':
                   $actionCategory->c_active = $actionCategory->c_active == 1 ? 0 : 1;
                   //$actionCategory->c_active = 1 or 0
                   $actionCategory->save();
                  return redirect()->back()->with('success','Cập nhật thành công');
                       break;
               case 'home':
                 $actionCategory->c_home = $actionCategory->c_home == 1 ? 0 : 1;
                 $actionCategory->save();
                 return redirect()->back()->with('success','Cập nhật thành công');
                  break;
           }
       }

    }
}
