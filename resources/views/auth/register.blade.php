@extends('layouts.app')
@section('content')
   <ul class="breadcrumb" style="margin-left: 104px;margin-top: 50px;">
       <li><a href="{{route('home')}}" style="font-weight: 500; color: black">Home</a></li>
       <li>Đăng ký</li>
     </ul>
    <div class="customer-login-area" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form" style="border: 2px solid #83cbdc; border-radius: 22px;padding: 19px;  margin-bottom:100px;"><!--login form-->
                        <h2 style="font-size: 24px;font-weight: 600;text-align: center;">Đăng ký</h2>
                        <form method="post" action="">
                            @csrf
                            <div class="form-group">
                                <input type="text" placeholder="Họ và tên của bạn" name="name"  class="form-control" value="{{old('name')}}" />
                                @if($errors->has('name'))
                                <div class="error-text">
                                    {{$errors->first('name')}}
                                </div>
                                 @endif
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email của bạn" name="email"  class="form-control" value="{{old('email')}}"/>
                                @if($errors->has('email'))
                                    <div class="error-text">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Số điện thoại của bạn" name="phone" class="form-control" value="{{old('phone')}}" />
                                @if($errors->has('phone'))
                                    <div class="error-text">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Mật khẩu của bạn" name="password" class="form-control" />
                                @if($errors->has('password'))
                                    <div class="error-text">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Xác nhận mật khẩu" name="confirm_password" class="form-control" />
                                @if($errors->has('confirm_password'))
                                    <div class="error-text">
                                        {{$errors->first('confirm_password')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" class="form-control" style="color: #fffbfb; background-color: #83cbdc;border-color: #83cbdc;">Đăng ký</button>
                            </div>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@stop
