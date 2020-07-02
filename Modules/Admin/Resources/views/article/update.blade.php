@extends('admin::layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.article') }}">Bài viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
        </ol>
    </nav>
    <div class="">
        @include('admin::article.form')
    </div>
@endsection