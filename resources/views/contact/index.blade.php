@extends('layouts.app')
@section('content')
<!-- entry-header-area start -->
<div class="entry-header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="entry-title">
                    <h1>Contact</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- entry-header-area end -->
<!-- map-area start -->
<div class="map-area">
    <div id="googleMap" style="width:100%;height:410px;">
        <iframe style="width: -webkit-fill-available;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.127911838607!2d107.28547011393188!3d16.82000932334938!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3140e34b7612e305%3A0x61457f3bccd8d306!2zQmnhu4NuIFRow7RuIDM!5e0!3m2!1svi!2s!4v1583834862456!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>
<!-- map-area end -->
<!-- contact-form-area start -->
<div class="contact-form-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="contact-title">Mời bạn điền thông tin liên hệ</h1>
            </div>
        </div>
        <div class="row">
            <form action="#" method="POST">
                @csrf
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="inner-form">
                            <div class="col-md-6">
                                <input type="text" placeholder="Họ và tên của bạn..." name="c_name"/>
                                @if($errors->has('c_name'))
                                    <div class="error">{{ $errors->first('c_name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input type="email" placeholder="Email của bạn..." name="c_email"/>
                                @if($errors->has('c_email'))
                                    <div class="error">{{ $errors->first('c_email') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Chủ đề" name="c_title" />
                                @if($errors->has('c_title'))
                                    <div class="error">{{ $errors->first('c_title') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 contact-message">
                    <textarea id="message" cols="30" rows="10" placeholder="Nội dung" name="c_content"></textarea>
                    @if($errors->has('c_content'))
                        <div class="error" style=" margin-top: 0px;">{{ $errors->first('c_content') }}</div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="contact-submit">
                        <input type="submit" value="Gửi thông tin của bạn" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- contact-form-area end -->
@stop
