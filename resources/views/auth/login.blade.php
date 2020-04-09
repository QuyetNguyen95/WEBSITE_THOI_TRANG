@extends('layouts.app')

@section('content')
   <ul class="breadcrumb" style="margin-left: 104px;margin-top: 50px;">
       <li><a href="{{route('home')}}" style="font-weight: 500; color: black">Home</a></li>
       <li>Đăng nhập</li>
     </ul>
    <div class="customer-login-area" style="margin-bottom: 50px">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="login-form" style="border: 2px solid #83cbdc; border-radius: 22px;padding: 19px;margin-bottom:100px;"><!--login form-->
                        <h2 style="font-size: 24px;font-weight: 600;  text-align: center;">Đăng nhập </h2>
                        <form method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" placeholder="Email của bạn" name="email" class="form-control" />
                            </div>
                            <div class="form-group" >
                                <input type="password" placeholder="Mật khẩu của bạn" name="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" style="color: #fffbfb; background-color: #83cbdc;border-color: #83cbdc; margin-right: 20px;">Đăng nhập</button>
                                <a href="{{route('google.login')}}" style="color: #fffbfb;background-color: #df4a32;border-color: #83cbdc; margin-right: 20px; padding: 9px 28px;border-radius: 5px;">
                                   <i class="fa fa-google"></i> Google
                                </a>
                            </div>
                            <div class="form-group">
                                <p><span style="margin-left: 30px;">Bạn không có tài khoản? <a href="{{route('get.register')}}" >Đăng ký</a></span> <span style="margin-left: 30px;">Bạn quên mật khẩu ? <a href="{{route('get.reset.password')}}" target="_blank">Click here</a></span></p>
                            </div>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </div>
@endsection

