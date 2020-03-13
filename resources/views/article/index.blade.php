@extends('layouts.app')
@section('content')
<!-- blog-header-area start -->
<div class="blog-header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="blog-header-title">
                    <h1>Blog</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-header-area end -->
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<!-- blog-main-area start -->
<div class="blog-main-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 blog-nonsidebar">
                <!-- blog start -->
                @if ($getListArticle)
                    @foreach ($getListArticle as $getSingleArticle )
                    <article class="blog-full {{$getSingleArticle->id%2==0 ? 'even' : 'odd'}}">
                        <!-- post-thumbnail start -->
                        <div class="post-thumbnail">
                            <a href="{{route('get.detail.article',[$getSingleArticle->a_slug,$getSingleArticle->id])}}">
                                <img src="{{pare_url_file($getSingleArticle->a_avatar)}}" alt=""
                                style="width: 570px; height: 341px" /></a>
                            <div class="post-date ontop">
                                <span class="day">{{$getSingleArticle->updated_at->format('d')}}</span>
                                <span class="month">{{$getSingleArticle->updated_at->format('M')}}</span>
                                <span class="blog-comments"><a href="#">3 comments</a></span>
                            </div>
                        </div>
                        <!-- post-thumbnail end -->
                        <!-- post-wrapper start -->
                        <div class="post-wrapper">
                            <div class="post-info-blog">
                                <h2 class="post-tile" style="overflow: hidden;white-space: nowrap;">
                                    <a href="{{route('get.detail.article',[$getSingleArticle->a_slug,$getSingleArticle->id])}}">
                                        {{$getSingleArticle->a_name}}</a>
                                </h2>
                                <div class="entry-meta-small">
                                    / Đăng bởi
                                    <span class="author-info"><a href="{{route('get.detail.article',
                                    [$getSingleArticle->a_slug,$getSingleArticle->id])}}">{{$getSingleArticle->a_author}}</a></span>
                                </div>
                                <div class="entry-summary">
                                    <p>{{$getSingleArticle->a_description}}</p>
                                </div>
                                <a class="readmore" href="{{route('get.detail.article',[$getSingleArticle->a_slug,$getSingleArticle->id])}}">
                                    Đọc thêm <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <!-- post-wrapper end -->
                    </article>
                    @endforeach
                @endif
                <!-- blog end -->
                {{$getListArticle->links()}}
            </div>
            <div class="col-lg-12 col-md-12"></div>
        </div>
    </div>
</div>
<!-- blog-main-area end -->
@stop
