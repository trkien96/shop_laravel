<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="p_name">Tên sản phẩm</label>
                <input type="text" name="p_name" class="form-control" placeholder="Tên sản phẩm"
                       value="{{ old('p_name', $product->p_name ?? '') }}">
                @if ($errors->has('p_name'))
                    <span class="text-danger">{{ $errors->first('p_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="p_description" class="form-control" id="" cols="30" rows="3"
                          placeholder="Mô tả sản phẩm ngắn">{{ old('p_description', $product->p_description ?? '') }}</textarea>
                @if ($errors->has('p_description'))
                    <span class="text-danger">{{ $errors->first('p_description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="p_content" class="form-control" id="" cols="30" rows="3"
                          placeholder="Nội dung">{{ old('p_content', $product->p_content ?? '') }}</textarea>
                @if ($errors->has('p_content'))
                    <span class="text-danger">{{ $errors->first('p_content') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="">Meta title</label>
                <input type="text" name="p_title_seo" class="form-control" placeholder="Meta title"
                       value="{{ old('p_title_seo', $product->p_title_seo ?? '') }}">
            </div>
            <div class="form-group">
                <label for="">Meta description</label>
                <input type="text" name="p_description_seo" class="form-control" placeholder="Meta description"
                       value="{{ old('p_description_seo', $product->p_description_seo ?? '') }}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Loại sản phẩm:</label>
                <select name="p_category_id" id="" class="form-control">
                    <option value="">--- Danh mục ---</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    {{ (isset($product) && $product->p_category_id == $category->id)? "selected" : "" }}
                            >{{$category->c_name}}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('p_category_id'))
                    <span class="text-danger">{{ $errors->first('p_category_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Giá sản phẩm:</label>
                <input type="number" name="p_price" placeholder="giá sản phẩm" class="form-control"
                       value="{{ old('p_price', $product->p_price ?? '') }}">
                @if ($errors->has('p_price'))
                    <span class="text-danger">{{ $errors->first('p_price') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Khuyến mãi:</label>
                <input type="number" name="p_sale" placeholder="Giảm giá" class="form-control"
                       value="{{ old('p_sale', $product->p_sale ?? 0) }}">
            </div>
            <div class="form-group">
                <label for="name">Avatar:</label>
                @if (isset($product->p_avatar) && !empty($product->p_avatar))
                    <div><img src="{{ pare_url_file($product->p_avatar) }}" class="img img-responsive img-avatar"></div>
                    <input type="file" name="p_avatar" class="form-control">
                @else
                    <input type="file" name="p_avatar" class="form-control">
                @endif
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="p_hot" class="form-check-input" {{ ($product->p_hot && $product->p_hot == 1)? "checked" : ""}}> Nổi bật
                    </label>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>