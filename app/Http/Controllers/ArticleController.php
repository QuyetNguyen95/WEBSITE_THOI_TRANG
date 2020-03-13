<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends FrontendController
{
   public function __construct()
	{
		parent::__construct();
	}

	public function getListArticle()
	{

		$getListArticle = Article::where('a_active',Article::STATUS_PUBLIC)->orderBy('id','desc')->paginate(4);
		$data = [
			'getListArticle'  =>  $getListArticle
		];
		return view('article.index',$data);
	}


	public function getDetailArticle(Request $request)
	{
		$arrayUrl = preg_split('/(-)/i',$request->segment(2));
		$id = array_pop($arrayUrl);
		if ($id) {
			$articleDetail = Article::find($id);
		}

		$data = [
			'articleDetail'     => $articleDetail
		];
		return view('article.detail',$data);
	}
}
