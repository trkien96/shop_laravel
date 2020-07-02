@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </div>
    <div class="table-responsive">
        <h1>Quản lý danh mục <a href="{{ route('admin.get.create.category') }}" type="button" class="btn btn-primary">Thêm
                mới</a></h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Title seo</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if( isset($categories))
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->c_name }}</td>
                        <td>{{ $category->c_title_seo }}</td>
                        <td>
                            <a href="{{ route('admin.get.action.category',['active',$category->id])}}"
                               class="label {{ $category->getStatus($category->c_active)['class'] }}">{{ $category->getStatus($category->c_active)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn-action" href="{{ route('admin.get.edit.category',$category->id) }}"><i
                                        class="fas fa-edit"></i> Cập nhật</a>
                            <a class="btn-action btn-delete"
                               href="{{ route('admin.get.action.category',['delete',$category->id]) }}"><i
                                        class="fas fa-trash-alt"></i> Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection