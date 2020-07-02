@extends('admin::layouts.master')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </nav>
    <div class="">
        @include('admin::product.form')
    </div>
@endsection