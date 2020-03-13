<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageStatic;
class PageStaticController extends FrontendController
{
    public function __construct()
	{
		parent::__construct();
	}


	public function action(Request $req)
	{

		$getLinkStatic = preg_split('/(-)/i',$req->segment(2));
		$id = array_pop($getLinkStatic);
		if($id) $page_statics = PageStatic::where('ps_type',$id)->first();
		return view('pageStatic.index',compact('page_statics'));
	}
}
