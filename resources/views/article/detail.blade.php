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
	<div class="breadcrumb-area product-breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<ul>
					<li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="{{route('get.list.article')}}">Blog <i class="fa fa-angle-right"></i></a></li>
					<li>{{$articleDetail->a_name}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- blog-main-area start -->
	<div class="blog-main-area blog-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- blog start -->
					<article class="blog-full">
						<!-- post-thumbnail start -->
						<div class="post-thumbnail">
							<a href="#"><img src="{{pare_url_file($articleDetail->a_avatar)}}" alt="" style="width: 1140px; height: 451px"/></a>
						</div>
						<!-- post-thumbnail end -->
						<!-- post-wrapper start -->
						<div class="post-wrapper">
							<div class="post-date">
								<span class="day">{{$articleDetail->updated_at->format('d')}}</span>
								<span class="month">{{$articleDetail->updated_at->format('M')}}</span>
							</div>
							<div class="post-info-blog">
								<h2 class="post-tile">
									<a href="#">{{$articleDetail->a_name}}</a>
								</h2>
								<div class="entry-meta-small">
									/ Đăng bởi
									<span class="author-info"><a href="#">{{$articleDetail->a_author}}</a></span>
								</div>
								<div class="entry-summary">
                                    <p>{!!$articleDetail->a_content!!}</p>
								</div>
								<div class="entry-meta-small entry-meta">
									/
									<span class="author-info"><a href="#">3 comments</a></span>
									/
									<a href="#">Fashion</a>,
									<a href="#">Image</a>,
									<a href="#">WordPress</a>
								</div>
								<div class="social-sharaing">
									<h3>Chia sẽ bài viết</h3>
									<div class="sharing-icon">
										<a href="#"><i class="fa fa-facebook"></i></a>
										<a href="#"><i class="fa fa-twitter"></i></a>
										<a href="#"><i class="fa fa-pinterest"></i></a>
										<a href="#"><i class="fa fa-google-plus"></i></a>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</div>
								</div>
								<div class="autor-info-details">
									<div class="author-img">
										<img src="{{asset('img/blog/comments/3.jpg')}}" alt="" />
									</div>
									<div class="author-description">
										<h2>About the Author: <span><a href="#">admin</a></span></h2>
										<p>Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- post-wrapper end -->
						<div class="clear"></div>
						<div class="comments-area">
							<div class="comments-heading">
								<h3>3 comments</h3>
							</div>
							<div class="comments-list">
								<ul>
									<li>
										<div class="comments-details">
											<div class="comments-list-img">
												<img src="{{asset('img/blog/comments/2.jpg')}}" alt="" />
											</div>
											<div class="comments-content-wrap">
												<span>
													<b><a href="#">admin</a></b>
													Post author
													<span class="post-time">October 6, 2014 at 1:38 am</span>
													<a href="#">Reply</a>
												</span>
												<p>just a nice post</p>
											</div>
										</div>
									</li>
									<li class="threaded-comments">
										<div class="comments-details">
											<div class="comments-list-img">
												<img src="{{asset('img/blog/comments/1.jpg')}}" alt="" />
											</div>
											<div class="comments-content-wrap">
												<span>
													<b><a href="#">demo</a></b>
													Post author
													<span class="post-time">October 6, 2014 at 3:25 pm</span>
													<a href="#">Reply</a>
												</span>
												<p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
											</div>
										</div>
									</li>
									<li>
										<div class="comments-details">
											<div class="comments-list-img">
												<img src="{{asset('img/blog/comments/2.jpg')}}" alt="" />
											</div>
											<div class="comments-content-wrap">
												<span>
													<b><a href="#">admin</a></b>
													Post author
													<span class="post-time">October 6, 2014 at 2:18 pm </span>
													<a href="#">Reply</a>
												</span>
												<p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at justo dolor. Fusce ac sapien bibendum, scelerisque libero nec</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="comment-respond">
							<h3 class="comment-reply-title">Leave a Reply </h3>
							<span class="email-notes">Your email address will not be published.</span>
							<form action="#">
								<div class="row">
									<div class="col-md-4">
										<p>Name *</p>
										<input type="text" />
									</div>
									<div class="col-md-4">
										<p>Email *</p>
										<input type="email" />
									</div>
									<div class="col-md-4">
										<p>Website</p>
										<input type="text" />
									</div>
									<div class="col-md-12 comment-form-comment">
										<p>Website</p>
										<textarea id="message" cols="30" rows="10"></textarea>
										<input type="submit" value="Post Comment" />
									</div>
								</div>
							</form>
						</div>
					</article>
					<!-- blog end -->
				</div>
			</div>
		</div>
	</div>
	<!-- blog-main-area end -->
@stop
