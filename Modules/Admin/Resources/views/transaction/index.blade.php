@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Đơn hàng</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý đơn hàng </h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên kháng hàng</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Time</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @if($transactions)
                              @foreach($transactions as $transaction)
                                <tr>
                                  <td>{{$stt}}</td>
                                  <td style="width: 190px">{{$transaction->user->name}}</td>
                                  <td style="width: 200px">{{$transaction->tr_address}}</td>
                                  <td>{{$transaction->tr_phone}}</td>
                                  <td>{{number_format($transaction->tr_total,0,'','.')}} VNĐ</td>
                                  <td>
                                    @if($transaction->tr_status == 1)
                                      <a href="#" class="btn btn-xs btn-success">Đã xử lý</a>
                                    @else
                                      <a href="{{route('admin.get.action.transaction',['status',$transaction->id])}}" class="btn btn-xs btn-default">Chờ xử lý</a>
                                    @endif
                                  </td>
                                  <td>{{$transaction->created_at}}</td>
                                  <td>
                                     <a href="{{route('admin.get.action.transaction',['delete',$transaction->id])}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
                                      <a class="btn_customer_action js_order_item" data-id="{{$transaction->id}}" href="{{route('admin.get.view.transaction',$transaction->id)}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="fa fa-eye"></i></a>
                                  </td>
                                </tr>
                                <?php $stt++; ?>
                              @endforeach
                            @endif
                        </tbody>
                  </table>
                 <div class="pull-right">
                    {{$transactions->links()}}
                 </div>
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

