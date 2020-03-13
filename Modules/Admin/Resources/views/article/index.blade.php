@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="{{route('admin.get.list.article')}}">Bài viết</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý sản phẩm <a href="{{route('admin.get.create.article')}}" class="pull-right"><i class="fa fa-plus" style="margin-left: -134px"></i></a></h2>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <form class="form-inline" >
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Tên sản phẩm" name="name" value="{{Request::get('name')}}">
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </form>
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th style="width: 150px">Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th style="width: 150px">Mô tả</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th style="width: 100px">Ngày tạo</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stt = 1; ?>
                            @if(isset($articles))
                              @foreach($articles as $article)
                               <tr>
                                  <td>{{$stt}}</td>
                                  <td>{{$article->a_name}}</td>
                                  <td>
                                      <img src="{{pare_url_file($article->a_avatar)}}" width="80px" height="80px">
                                  </td>
                                  <td>{{$article->a_description}}</td>
                                  <td>{{$article->a_author}}</td>
                                   <td>
                                      <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus()['class']}}">{{$article->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                      <a href="{{route('admin.get.action.article',['hot',$article->id])}}" class="label {{$article->getHot()['class']}}">{{$article->getHot()['name']}}</a>
                                  </td>
                                  <td>{{$article->created_at}}</td>
                                  <td>
                                    <a href="{{route('admin.get.edit.article',$article->id)}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('admin.get.action.article',['delete',$article->id])}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
                                  </td> 
                               </tr>
                               <?php $stt++; ?>
                              @endforeach
                            @endif
                        </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
    <div>{{$articles->links()}}</div>
</div>
@endsection