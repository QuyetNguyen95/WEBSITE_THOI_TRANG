@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('admin.get.list.rating')}}">Đánh giá</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>
            </div>
            <div class="row">
            <div class="col-md-12" style="display: flex;margin-bottom: 30px;">
            <h2 style="margin-bottom: 10px;">Quản lý đánh giá</h2>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Tên thành viên</th>
                        <th>Sản phẩm</th>
                        <th>Nội dung</th>
                        <th>Rating</th>
                        <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt=1; ?>
                        @if(isset($listRating))
                            @foreach($listRating as $singleRating)
                            <tr>
                                <td>{{$stt}}</td>
                                <td style="width: 190px">{{$singleRating->user->name}}</td>
                                <td style="width: 200px">{{$singleRating->product->pro_name}}</td>
                                <td>{{$singleRating->ra_content}}</td>
                                <td>{{$singleRating->ra_number}}</td>
                                <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                    <a href="{{route('admin.get.action.rating',['delete',$singleRating->id])}}"><i class="mdi mdi-delete-forever"></i></a>
                                </button>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="pull-right" style="margin-top: 40px;">
                    {{$listRating->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalOrder" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="trasaction_id"></b></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
  <script type="text/javascript">
    $(function(){
      $(".js_order_item").click(function(e){
        e.preventDefault();
        let $this = $(this);
        let url = $this.attr('href');
        $('.modal-body').html('');//set lai order bang rong
        $(".trasaction_id").text($this.attr("data-id"));
        $("#myModalOrder").modal('show');
        $.ajax({
          url: url
        }).done(function(result){
          if (result)
           {
             $('.modal-body').append(result);//ket qua tra ve cua viewOrder
           }
        })
      })
    })
  </script>
@stop

