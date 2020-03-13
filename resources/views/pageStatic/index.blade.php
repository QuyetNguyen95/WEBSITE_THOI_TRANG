@extends('layouts.app')
@section('content')
	<section>
         <div class="breadcrumbs" style="margin-left: 105px; margin-top: 60px;">
            <ol class="breadcrumb">
              <li><a href="{{route('home')}}">Trang chủ</a></li>
              <li class="active">{{$page_statics->ps_name}}</li>
            </ol>
         </div>

		<div class="container">
			<div>
				{!!$page_statics->ps_content!!}
			</div>
		</div>
	</section>
@stop
