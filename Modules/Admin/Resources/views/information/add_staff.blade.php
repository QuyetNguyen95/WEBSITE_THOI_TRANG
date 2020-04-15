@extends('admin::layouts.master')
@section('content')
<div class="row">
    <div class="col-12 py-5">
    <h4>Thêm nhân viên mới</h4>
    <p class="text-gray">Chào mừng {{Auth::guard('admins')->user()->name}}</p>
    </div>
</div>
<form  method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-lg-12" style="margin-top: 20px">
        <div class="grid">
          <p class="grid-header" style="font-size: 18px;">Thêm nhân viên mới</p>
          <div class="grid-body">
            <div class="item-wrapper">
                <div class="col-md-12">
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-2 showcase_text_area">
                      <label for="inputType1">Tên nhân viên</label>
                    </div>
                    <div class="col-md-8 showcase_content_area">
                      <input type="text" class="form-control" id="inputType1" value="" name="name">
                      @if($errors->has('name'))
                      <div class="error-text">
                          {{$errors->first('name')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-2 showcase_text_area">
                      <label for="inputType12">Email</label>
                    </div>
                    <div class="col-md-8 showcase_content_area">
                      <input type="email" class="form-control" id="inputType2" value="" name="email">
                      @if($errors->has('email'))
                      <div class="error-text">
                          {{$errors->first('email')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-2 showcase_text_area">
                      <label for="inputType1">Số điện thoại</label>
                    </div>
                    <div class="col-md-8 showcase_content_area">
                      <input type="number" class="form-control" id="inputType4" value="" name="phone">
                    </div>
                  </div>
                  <div class="form-group row showcase_row_area">
                    <div class="col-md-2 showcase_text_area">
                      <label for="inputType1">Phân quyền</label>
                    </div>
                    <div class="col-md-8 showcase_content_area">
                      <select class="form-control" name="role">
                          <option value="1">1</option>
                          <option value="2">2</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-success" style="margin-left: 165px; margin-top: 20px;">Thêm</button>
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
