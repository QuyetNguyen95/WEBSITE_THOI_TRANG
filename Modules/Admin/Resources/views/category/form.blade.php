 <div class="row">
    <div class="col-md-12">
        <div class="">
            <form action="" method="POST">
              @csrf
                <div class="form-group">
                    <label for="name">Tên danh mục:</label>
                    <input type="text" class="form-control" id="email" placeholder="Tên danh mục" name="name" value="{{old('name',isset($category->c_name) ? $category->c_name : '')}}">
                    @if($errors->has('name'))
                        <div class="error-text">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Icon</label>
                    <input type="text" class="form-control" id="email" placeholder="fa fa-home" value="{{old('icon',isset($category->c_icon) ? $category->c_icon : '')}}" name="icon">
                     @if($errors->has('icon'))
                        <div class="error-text">
                            {{$errors->first('icon')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Meta Title</label>
                    <input type="text" class="form-control" id="email" placeholder="Meta title" name="c_title_seo" value="{{old('c_title_seo',isset($category->c_title_seo) ? $category->c_title_seo : '')}}">
                </div>
                <div class="form-group">
                    <label for="name">Meta Description</label>
                    <input type="text" class="form-control" id="email" placeholder="Meta Description" name="c_description_seo" value="{{old('c_description_seo',isset($category->c_description_seo) ? $category->c_description_seo : '')}}">
                </div>
                <button type="submit" class="btn btn-success">Lưu thông tin</button>
            </form>
        </div>
    </div>
</div>