@extends('layouts.app')

@section('content')
<div class="breadcrumbs">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="container-inner">
                <ul class="breadcrumb" style="margin-left: 104px;margin-top: 50px;">
                    <li><a href="{{route('home')}}" style="font-weight: 500; color: black">Trang chủ</a></li>
                    <li>Lấy lại mật khẩu</li>
                </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="main-contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label ">Mật khẩu mới</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" autofocus>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirm" class="col-md-2 col-form-label ">Xác nhận mật khẩu</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirm" >
                                    @if ($errors->has('password_confirm'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirm') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 162px;margin-bottom: 40px;">
                                        {{ __('Cập nhật') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
