<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
class AdminCategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::select('id','c_name','c_title_seo','c_active','c_home')->get();
        return view('admin::category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin::category.create');
    }

    public function store(RequestCategory $requestCategory)
    {
        $this->isertOrUpdate($requestCategory);
        return redirect()->back()->with('success','Thêm danh mục thành công');;
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.update',compact('category'));
    }

    public function update($id,RequestCategory $requestCategory )
    {
        $this->isertOrUpdate($requestCategory,$id);   
        return redirect()->back()->with('info','Thêm danh mục thành công');;
    }

    public function isertOrUpdate(RequestCategory $requestCategory, $id = '')
    {
        $category = new Category();
        if($id) $category = Category::find($id);
        $category->c_name            = $requestCategory->name;
        $category->c_slug            = str_slug($requestCategory->name);
        $category->c_icon            = $requestCategory->icon;
        $category->c_title_seo       = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
        $category->c_description_seo = $requestCategory->c_description_seo;
        $category->save();
    }

    public function action($action,$id)
    {
       $actionCategory = Category::find($id);
       if ($action) {
           switch ($action) {
               case 'delete':
                   $actionCategory->delete();
                   return redirect()->back()->with('danger','Xóa danh mục thành công');
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
