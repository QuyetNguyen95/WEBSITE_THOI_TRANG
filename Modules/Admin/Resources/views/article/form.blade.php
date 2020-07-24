<div class="">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-8">
            <div class="form-group">
                <label for="a_name">Tên bài viết</label>
                <input type="text" class="form-control" placeholder="Tên bài viết" name="a_name" value="{{old('a_name',isset($article->a_name) ? $article->a_name : '')}}">
                @if($errors->has('a_name'))
                    <div class="error-text">
                        {{$errors->first('a_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <textarea id="" name="a_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn bài viết" value="">{{old('a_description',isset($article->a_description) ? $article->a_description : '')}}</textarea>
                @if($errors->has('a_description'))
                    <div class="error-text">
                        {{$errors->first('a_description')}} 
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <textarea class="form-control" name="a_content" rows="5" value="">{{old('a_content',isset($article->a_content) ? $article->a_content : '')}}</textarea>
                @if($errors->has('a_content'))
                    <div class="error-text">
                        {{$errors->first('a_content')}}
                    </div>
                @endif
            </div>
             <div class="form-group">
                <label for="name">Tác giả</label>
                <input type="text" class="form-control" placeholder="Tác giả" name="a_author" value="{{old('a_author',isset($article->a_author) ? $article->a_author : '')}}">
                 @if($errors->has('a_author'))
                    <div class="error-text">
                        {{$errors->first('a_author')}}
                    </div>
                @endif
            </div>
             <div class="form-group">
                <img src="{{isset($article->a_avatar) ? pare_url_file($article->a_avatar) : asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img">
            </div>
            <div class="form-group">
                <label for="name">Avatar</label>
                <input type="file" name="avatar" class="form-control" onchange="readURL(this);">
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace( 'a_content' );
</script>