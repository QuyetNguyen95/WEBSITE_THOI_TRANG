 <div class="col-sm-3">
 <div class="left-sidebar">
     <div class="box-title">
        <h3><i class="fa fa-bullhorn"></i>  Bài viết nổi bật </h3>
     </div>
     <div class="content">
          <ul>
             @if(isset($getListHotArticle))
             	@foreach($getListHotArticle as $getSingleHotArticle)
             		<li class="clearfix">
		                 <a href="{{route('get.detail.article',[$getSingleHotArticle->a_slug,$getSingleHotArticle->id])}}">
		                     <img src="{{pare_url_file($getSingleHotArticle->a_avatar)}}" class="img-responsive pull-left" width="80" height="80">
		                     <div class="info pull-right">
		                         <p class="name"> {{$getSingleHotArticle->a_name}}</p>
		                         <div style="width: 141px;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;"> <b class="price">{{$getSingleHotArticle->a_description}}</b><br></div>
		                     </div>
		                 </a>
		             </li>
             	@endforeach
             @endif
         </ul>
     </div>   
 </div>
  <div class="shipping text-center"><!--shipping-->
         <img src="{{asset('images/home/shipping.jpg')}}" alt="" />
  </div><!--/shipping-->
</div>