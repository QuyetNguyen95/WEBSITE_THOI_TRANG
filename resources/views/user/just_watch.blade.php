@extends('user.main')
@section('content')
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý sản phẩm vừa xem</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div id="renderViewProduct">

</div>
@endsection
@section('script')
    <script>

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        // //token thêm ở header dưới dạng meta
            let urlRenderViewProduct = "{{route('get.view.just.watch.user')}}";
            //lấy danh sách id sản phẩm
            products = sessionStorage.getItem('products');
            products = $.parseJSON(products);
            //hàm ajax xử lý dử liệu
            console.log(products);

            $.ajax({
                url : urlRenderViewProduct,
                type: "POST",
                data : {
                    listId : products
                }
            }).done(function(result){
                $('#renderViewProduct').html('').append(result);
            })
    </script>
@endsection

