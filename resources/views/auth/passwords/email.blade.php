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
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="" >
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">Vui lòng cung cấp email để lấy lại mật khẩu</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Xác nhận
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
