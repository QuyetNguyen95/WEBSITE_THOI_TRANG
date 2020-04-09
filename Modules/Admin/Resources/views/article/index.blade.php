@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="viewport-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.get.list.article')}}">Bài viết</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Quản lý bài viết </h2>
                        <h2 style="margin-left: 700px"><a href="{{route('admin.get.create.article')}}"><i class="mdi mdi-library-plus" ></i></a></h2>
                </div>
            </div>
            </div>
            <div class="row" style="margin-bottom: 30px">
              <div class="col-md-12">
                 <form class="form-inline" >
                <div class="form-group" style="margin-right: 10px">
                  <input type="text" class="form-control"  placeholder="Tên sản phẩm" name="name" value="{{Request::get('name')}}" id="myInput">
                </div>
                <button type="submit" class="btn btn-sm btn-outline-info"><i class="mdi mdi-magnify"></i></button>
              </form>
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th style="width: 150px" >Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th style="width: 150px">Mô tả</th>
                            <th>Tác giả</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th style="width: 100px">Ngày tạo</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody id="myTable">
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
                                      <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="btn btn-xs {{$article->getStatus()['class']}}">{{$article->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                      <a href="{{route('admin.get.action.article',['hot',$article->id])}}" class="btn btn-xs {{$article->getHot()['class']}}">{{$article->getHot()['name']}}</a>
                                  </td>
                                  <td>{{$article->created_at}}</td>
                                  <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.edit.article',$article->id)}}"> <i class="text-info mdi mdi-autorenew"></i></a>
                                    </button>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.action.article',['delete',$article->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
                                    </button>
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
@section('script')
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection
