<div class="">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-sm-8">
            <div class="form-group">
                <label for="ps_name">Tiêu đề trang</label>
                <input type="text" class="form-control" placeholder="Tên bài viết" name="ps_name" value="{{old('ps_name',isset($page_static->ps_name) ? $page_static->ps_name : '')}}">
                @if($errors->has('ps_name'))
                    <div class="error-text">
                        {{$errors->first('ps_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Chọn trang</label>
                <select class="form-control"  name="ps_type">
                    <option value="1" {{isset($page_static->id) && $page_static->id == 1  ? "selected = 'selected'" : ''}}>Về chúng tôi</option>
                    <option value="2" {{isset($page_static->id) && $page_static->id == 2 ? "selected = 'selected'" : ''}}>Thông tin giao hàng</option>
                    <option value="3" {{isset($page_static->id) && $page_static->id == 3 ? "selected = 'selected'" : ''}}>Chính sách bảo hành</option>
                    <option value="4" {{isset($page_static->id) && $page_static->id == 4 ? "selected = 'selected'" : ''}}>Điều khoản sử dụng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <textarea class="form-control" name="ps_content" rows="5" value="">{{old('ps_content',isset($page_static->ps_content) ? $page_static->ps_content : '')}}</textarea>
                @if($errors->has('ps_content'))
                    <div class="error-text">
                        {{$errors->first('ps_content')}}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </div>
    </form>
</div>
<script>
    CKEDITOR.replace( 'ps_content' );
</script>