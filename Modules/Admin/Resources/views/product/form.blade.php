<div class="">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="pro_name">Tên sản phẩm</label>
                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="pro_name" value="{{old('pro_name',isset($product->pro_name) ? $product->pro_name : '')}}">
                @if($errors->has('pro_name'))
                    <div class="error-text">
                        {{$errors->first('pro_name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <textarea id="" name="pro_description" class="form-control" cols="30" rows="3" placeholder="Mô tả ngắn sản phẩm" value="">{{old('pro_description',isset($product->pro_description) ? $product->pro_description : '')}}</textarea>
                @if($errors->has('pro_description'))
                    <div class="error-text">
                        {{$errors->first('pro_description')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Nội dung</label>
                <textarea class="form-control" name="pro_content" rows="5" value="">{{old('pro_content',isset($product->pro_content) ? $product->pro_content : '')}}</textarea>
                @if($errors->has('pro_content'))
                    <div class="error-text">
                        {{$errors->first('pro_content')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Thông tin thêm</label>
                <textarea class="form-control" name="pro_addInfo" rows="3" value="">{{old('pro_addInfo',isset($product->pro_addInfo) ? $product->pro_addInfo : '')}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Màu sản phẩm</label>
                <input type="text" class="form-control" placeholder="Màu sản phẩm" name="pro_color" value="{{old('pro_color',isset($product->pro_color) ? $product->pro_color : '')}}">
            </div>
            <div class="form-group">
                <label for="name">Size sản phẩm</label>
                <input type="text" class="form-control" placeholder="Size sản phẩm" name="pro_size" value="{{old('pro_size',isset($product->pro_size) ? $product->pro_size : '')}}">
            </div>
            <button type="submit" class="btn btn-success">Lưu thông tin</button>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="pro_category_id">Danh mục sản phẩm</label>
                <select name="pro_category_id" class="form-control">
                    <option value="">--Chọn danh mục sản phẩm--</option>
                    @if($categories)
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('pro_category_id',isset($product->pro_category_id) ? $product->pro_category_id : '')==$category->id ? "selected = 'selected'" : ''}}>{{$category->c_name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('pro_category_id'))
                    <div class="error-text">
                        {{$errors->first('pro_category_id')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_type">Loại sản phẩm</label>
                <input type="text" placeholder="Loại sản phẩm" class="form-control" name="pro_type" value="{{old('pro_type',isset($product->pro_type) ? $product->pro_type : '')}}" >
                @if($errors->has('pro_type'))
                    <div class="error-text">
                        {{$errors->first('pro_type')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="pro_price">Giá sản phẩm</label>
                <input type="number" placeholder="Giá sản phẩm" class="form-control" name="pro_price" value="{{old('pro_price',isset($product->pro_price) ? $product->pro_price : '')}}" min="0">
                @if($errors->has('pro_price'))
                    <div class="error-text">
                        {{$errors->first('pro_price')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">% Khuyến mãi</label>
                <input type="number" name="pro_sale" placeholder="% giảm giá" class="form-control" value="{{old('pro_sale',isset($product->pro_sale) ? $product->pro_sale : '0')}}" min="0">
            </div>
           @if (isset($product->id))
           <div class="form-group">
            <label for="name">Số lượng sản phẩm hiện tại trong kho là {{$product->pro_number}} cái</label>
            </div>
           @endif
            <div class="form-group">
                <label for="name">Số lượng sản phẩm</label>
                <input type="number" name="pro_number" placeholder="0" class="form-control" value="0" min="0">
            </div>
            <div class="form-group">
                <img src="{{isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img">
            </div>
            <div class="form-group">
                <label for="name">Avatar</label>
                <input type="file" name="avatar" class="form-control" onchange="readURL(this);">
            </div>
            <div class="form-group">
                <img src="{{isset($product->pro_img) ? pare_url_file($product->pro_img) : asset('images/no_image.png')}}" alt="" style="width: 300px; height: 300px;" id="output_img2">
            </div>
            <div class="form-group">
                <label for="name">Hình ảnh phụ</label>
                <input type="file" name="avatar2" class="form-control" onchange="readURL2(this);">
            </div>
        </div>
       </div>
    </form>
</div>
<script>
    CKEDITOR.replace( 'pro_content' );
</script>
<script>
    CKEDITOR.replace( 'pro_addInfo' );
</script>