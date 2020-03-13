<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestPageStatic;
use App\Models\PageStatic;
class AdminPageStaticController extends Controller
{
   
    public function index()
    {
        $page_statics = PageStatic::all();
        return view('admin::static.index',compact('page_statics'));
    }

    public function create()
    {
       return view('admin::static.create');
    }

    public function store(RequestPageStatic $requestPageStatic)
    { 
        $this->insertOrUpdate($requestPageStatic);
        return redirect()->back()->with('success','Thêm thành công');
    }

    public function edit($id)
    {
        $page_static = PageStatic::find($id);
        return view('admin::static.update',compact('page_static'));
    }

    public function update(RequestPageStatic $requestPageStatic, $id){
        $this->insertOrUpdate($requestPageStatic,$id);
        return redirect()->back()->with('info','Cập nhật thành công');
    }


   public function insertOrUpdate(RequestPageStatic $requestPageStatic, $id='')
    {

        $page_statics = new PageStatic();
        if($id) $page_statics = PageStatic::find($id);

        $page_statics->ps_name    = $requestPageStatic->ps_name;
        $page_statics->ps_type    = $requestPageStatic->ps_type;
        $page_statics->ps_content = $requestPageStatic->ps_content;
        $page_statics->save();
    }
}
