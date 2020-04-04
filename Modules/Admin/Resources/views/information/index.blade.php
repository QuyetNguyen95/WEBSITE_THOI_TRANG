@extends('admin::layouts.master')
@section('content')
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý thông tin cá nhân</h4>
    <p class="text-gray">Chào mừng {{$admin->name}}</p>
    </div>
</div>
<form  method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12" style="margin-top: 20px">
        <div class="grid">
          <p class="grid-header" style="font-size: 18px;">Thông tin cá nhân</p>
          <div class="grid-body">
            <div class="item-wrapper">
              <div class="row mb-3">
                  <div class="col-md-2">
                    <div class="text-center">
                        @if ($admin->avatar == NULL)
                        <img src="{{asset('img/avatar_2x.png')}}" class="avatar img-circle img-thumbnail" style="border-radius: 50%; width: 145px; height: 145px;"
                        alt="avatar">
                        @else
                        <img src="{{pare_url_file($admin->avatar)}}" class="avatar img-circle img-thumbnail" style="border-radius: 50%; width: 145px; height: 145px;"
                        alt="avatar" >
                        @endif
                        <h6 style="font-size: 11px;margin-top: 7px;margin-bottom: 10px;">Chọn một ảnh khác...</h6>
                        <input type="file" class="text-center center-block file-upload" name="avatar">
                    </div>
                  </div>
                <div class="col-md-9">
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType1">Tên của bạn</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <input type="text" class="form-control" id="inputType1" value="{{$admin->name}}" name="name">
                      @if($errors->has('name'))
                      <div class="error-text">
                          {{$errors->first('name')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType12">Email</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <input type="email" class="form-control" id="inputType2" value="{{$admin->email}}" name="email">
                      @if($errors->has('email'))
                      <div class="error-text">
                          {{$errors->first('email')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType1">Số điện thoại</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <input type="number" class="form-control" id="inputType4" value="{{$admin->phone}}" name="phone">
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType1">Địa chỉ</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <input type="text" class="form-control" id="inputType1" value="{{$admin->address}}" name="address">
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-3 showcase_text_area">
                      <label for="inputType9">Giới thiệu bản thân</label>
                    </div>
                    <div class="col-md-9 showcase_content_area">
                      <textarea class="form-control" id="inputType9" cols="12" rows="5" name="note">{{$admin->note}}</textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success" style="margin-left: 188px; margin-top: 20px;">Cập nhật</button>
                  <a href="{{route('get.pass.admin')}}" style="margin-left: 33px; position: relative;top: 11px;">Bạn muốn thay đổi mật khẩu?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</form>
@endsection
@section('script')
<script>
  //show avatar trước khi submit
    $(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });
    });
</script>
@endsection
