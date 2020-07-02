@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.get.list.product') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
        <div class="row">
            <div class="col-sm-12">
                <form class="form-inline" action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Tên sản phẩm ..." name="name"
                               value="{{ \Request::get('name') }}">
                    </div>
                    <div class="form-group">
                        <select name="cate" id="" class="form-control">
                            <option value="">--- Danh mục ---</option>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            {{ (\Request::get('cate') == $category->id)? "selected":"" }}
                                    >{{$category->c_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <h1>Quản lý sản phẩm <a href="{{ route('admin.get.create.product') }}" type="button" class="btn btn-primary">Thêm
                mới</a></h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @if( isset($products))
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><b>{{ $product->p_name }}</b>
                            <ul style="padding:0;list-style: none">
                                <li><strong style="font-size: 14px;color: #e10c00;line-height: 15px;">{{ number_format($product->p_price, 0, ',', '.') }} vnđ</strong></li>
                                <li><span style="text-decoration: line-through;">{{ number_format($product->p_sale, 0, ',', '.') }} vnđ</span></li>
                            </ul>
                        </td>
                        <td>{{ isset($product->category->c_name)? $product->category->c_name:'[N\A]' }}</td>
                        <td><img src="{{ pare_url_file($product->p_avatar) }}" class="img img-responsive img-avatar"></td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['active',$product->id]) }}"
                               class="label {{ $product->getStatus($product->p_active)['class'] }}">{{ $product->getStatus($product->p_active)['name'] }}</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.get.action.product',['hot',$product->id]) }}"
                               class="label {{ $product->getHot($product->p_hot)['class'] }}">{{ $product->getHot($product->p_hot)['name'] }}</a>
                        </td>
                        <td>
                            <a class="btn-action" href="{{ route('admin.get.edit.product',$product->id) }}"><i
                                        class="fas fa-edit"></i> Cập nhật</a>
                            <a class="btn-action btn-delete"
                               href="{{ route('admin.get.action.product',['delete',$product->id]) }}"><i
                                        class="fas fa-trash-alt"></i> Xoá</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection