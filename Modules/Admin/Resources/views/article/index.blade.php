@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
        <div class="row">
            <div class="col-sm-12">
                <form class="form-inline" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="name"
                               value="{{ \Request::get('name') }}">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <h1>Quản lý bài viết <a href="{{ route('admin.get.create.article') }}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>  Thêm mới</a></h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên bài viết</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if( isset($articles))
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->a_name }}</td>
                        <td>{{ $article->a_description }}</td>
                        <td>
                            {{--                            <a href="{{ route('admin.get.action.product',['active',$article->id]) }}"--}}
                            {{--                               class="label {{ $article->getStatus($article->p_active)['class'] }}">{{ $article->getStatus($article->p_active)['name'] }}</a>--}}
                        </td>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a class="btn-action" href="{{ route('admin.get.edit.article',$article->id) }}"><i
                                        class="fas fa-edit"></i> Cập nhật</a>
                            <a class="btn-action btn-delete"
                               href="{{ route('admin.get.destroy.article',$article->id) }}"><i
                                        class="fas fa-trash-alt"></i> Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection