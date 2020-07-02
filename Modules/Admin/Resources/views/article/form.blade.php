<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            <label for="a_name">Tiêu đề bài viết</label>
            <input type="text" name="a_name" class="form-control" placeholder="Tiêu đề bài viết"
                   value="{{ old('a_name', isset($article->a_name) ? $article->a_name:'') }}">
            @if ($errors->has('a_name'))
                <span class="text-danger">{{ $errors->first('a_name') }}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="">Mô tả</label>
            <textarea name="a_description" class="form-control" id="" cols="30" rows="3"
                      placeholder="Mô tả nội dung ngắn">{{ old('a_description', isset($article->a_description) ? $article->a_description:'') }}</textarea>
            @if ($errors->has('a_description'))
                <span class="text-danger">{{ $errors->first('a_description') }}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="">Nội dung</label>
            <textarea name="a_content" class="form-control" id="" cols="30" rows="3"
                      placeholder="Nội dung">{{ old('a_content', isset($article->a_content) ? $article->a_content:'') }}</textarea>
            @if ($errors->has('a_content'))
                <span class="text-danger">{{ $errors->first('a_content') }}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="">Meta title</label>
            <input type="text" name="a_title_seo" class="form-control" placeholder="Meta title"
                   value="{{ old('a_title_seo', isset($article->a_title_seo) ? $article->a_title_seo:'') }}">
        </div>
        <div class="form-group col-md-12">
            <label for="">Meta description</label>
            <input type="text" name="a_description_seo" class="form-control" placeholder="Meta description"
                   value="{{ old('a_description_seo', isset($article->a_description_seo) ? $article->a_description_seo:'') }}">
        </div>
        <div class="form-group col-md-6">
            <label for="name">Avatar:</label>
            <input type="file" name="avatar" class="form-control">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>
</form>