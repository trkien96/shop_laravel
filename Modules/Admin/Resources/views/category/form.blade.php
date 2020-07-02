<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="c_name">Tên danh mục</label>
        <input type="text" name="c_name" class="form-control" placeholder="Tên danh mục" value="{{ old('c_name', $category->c_name ?? '') }}">
        @if ($errors->has('c_name'))
            <span class="text-danger">{{ $errors->first('c_name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="icon">Icon</label>
        <input type="text" name="c_icon" class="form-control" placeholder="fa fa-home" value="{{ old('c_icon', $category->c_icon ?? '') }}">
        @if ($errors->has('c_icon'))
            <span class="text-danger">{{ $errors->first('c_icon') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="c_title_seo">Meta title</label>
        <input type="text" name="c_title_seo" class="form-control" placeholder="Meta title" value="{{ old('c_title_seo',$category->c_title_seo ?? '') }}">
    </div>
    <div class="form-group">
        <label for="c_description_seo">Meta description</label>
        <input type="text" name="c_description_seo" class="form-control" placeholder="Meta description" value="{{ old('c_description_seo', $category->c_description_seo ?? '') }}">
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="c_active" class="form-check-input" {{ ($category->c_active && $category->c_active == 1)? "checked" : ""}}> Công khai
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>