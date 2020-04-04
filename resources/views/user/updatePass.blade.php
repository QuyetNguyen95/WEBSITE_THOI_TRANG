@extends('user.main')
@section('content')
<form  method="post">
    @csrf
    <div class="col-lg-12" style="margin-top: 50px">
        <div class="grid">
          <p class="grid-header" style="font-size: 18px;">Cập nhật mật khẩu</p>
          <div class="grid-body">
            <div class="item-wrapper">
              <div class="row mb-3">
                <div class="col-md-9">
                <div class="pass">
                    <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                            <label for="inputType13">Mật khẩu củ</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                             <input type="password" class="form-control" id="inputType3" name="old_password" placeholder="********">
                            @if($errors->has('old_password'))
                            <div class="error-text">
                            {{$errors->first('old_password')}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                            <label for="inputType13">Mật khẩu mới</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                            <input type="password" class="form-control" id="inputType3" name="new_password" placeholder="********">
                            @if($errors->has('new_password'))
                            <div class="error-text">
                            {{$errors->first('new_password')}}
                            </div>
                            @endif
                        </div>
                     </div>
                     <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                            <label for="inputType13">Nhập lại mật khẩu</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                            <input type="password" class="form-control" id="inputType3" name="confirm_password" placeholder="********">
                            @if($errors->has('confirm_password'))
                            <div class="error-text">
                            {{$errors->first('confirm_password')}}
                            </div>
                            @endif
                        </div>
                     </div>
                </div>
                  <button type="submit" class="btn btn-sm btn-success" style="margin-left: 188px; margin-top: 20px;">Cập nhật</button>
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
        //thông báo
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }
    </script>
@endsection


