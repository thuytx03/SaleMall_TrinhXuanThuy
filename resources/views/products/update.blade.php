@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    @endif
<div class="container">
    <form action="{{ route('update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group m-3">
                    <label for="my-input">Tên sản phẩm</label>
                    <input id="my-input" class="form-control" type="text" value="{{ $product->name }}" name="name" placeholder="Tên sản phẩm">
                </div>

            </div>
            <div class="col-6">
                <div class="form-group m-3">
                    <label for="my-input">Giá sản phẩm</label>
                    <input id="my-input" class="form-control" type="text" value="{{ $product->price }}" name="price" placeholder="Giá sản phẩm">
                </div>

            </div>
            <div class="col-6">
                <div class="form-group m-3">
                    <label for="my-input">Ảnh sản phẩm</label>
                    <input id="my-input" class="form-control" type="file" value="{{ $product->image }}" name="image"  alt="Ảnh sản phẩm">
                </div>

            </div>
            <div class="col-6">
                <div class="form-group m-3">
                    <label for="my-input">Mô tả sản phẩm</label>
                    <input id="my-input" class="form-control" type="text" value="{{ $product->description }}" name="description" placeholder="Mô tả sản phẩm">
                </div>
            </div>
            <div class="m-3">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <button type="reset" class="btn btn-danger">Nhập lại</button>
                <a href="{{ route('index') }}" class="btn btn-success">Danh sách</a>
            </div>
        </div>
    </form>

</div>
@endsection
