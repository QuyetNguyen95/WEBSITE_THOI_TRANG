<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Article;
use App\Http\Requests\RequestArticle;
class AdminArticleController extends AdminHeaderController
{

    public function __construct()
	{
		parent::__construct();
	}

    public function index(Request $request)
    {
        $articles = Article::whereraw(1);
        //lay du lieu khong can dung get()
        //select*from 'articles' where 1 voi 1 la dieu kien luon luon dung
        if($request->name) $articles = $articles->where('a_name','like','%'.$request->name.'%');
        $articles = $articles->orderBy('created_at','desc')->paginate(5);

        $data = [
            'articles' => $articles
        ];
        return view('admin::article.index',$data);
    }

    public function create()
    {
        return view('admin::article.create');
    }


   public function store(RequestArticle $requestArticle)

    {
        $this->inserOrUpdate($requestArticle);
        return redirect()->back()->with('success','Thêm bài viết thành công');
    }


    public function edit ($id)

    {
        $article = Article::find($id);
        return view('admin::article.update',compact('article'));
    }


    public function update(RequestArticle $requestArticle,$id)
    {
        $this->inserOrUpdate($requestArticle,$id);
        return redirect()->back()->with('info','Cập nhật bài viết thành công');
    }

     public function inserOrUpdate(RequestArticle $requestArticle, $id='')
    {
        $article = new Article();


        if ($id)  $article = Article::find($id);

        $article->a_name            = $requestArticle->a_name;
        $article->a_slug            = str_slug($requestArticle->a_name);
        $article->a_description     = $requestArticle->a_description;
        $article->a_content         = $requestArticle->a_content;
        $article->a_author          = $requestArticle->a_author;
        if ($requestArticle->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $article->a_avatar = $file['name'];
            }
        }
        $article->save();

    }

    public function action($action,$id)
    {
        $article = Article::find($id);
        if ($action) {
            switch ($action) {
                case 'delete':
                    $article->delete();
                    return redirect()->back()->with('danger','Xóa bài viết thành công');
                    break;
                case 'hot':
                    $article->a_hot = $article->a_hot == 1 ? 0 :1;
                    $article->save();
                    return redirect()->back()->with('success','Cập nhật thành công');
                    break;
                case 'active':
                    $article->a_active = $article->a_active == 1 ? 0 :1;
                    $article->save();
                    return redirect()->back()->with('success','Cập nhật thành công');
                    break;
            }
        }
    }

}
