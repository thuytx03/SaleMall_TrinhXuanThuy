@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Danh sách sản phẩm</h3>

        <div class="m-3 d-flex">
            <div>
                <a href="{{ route('create') }}" class="btn btn-success">Thêm mới</a>
            </div>

        </div>
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td scope="row">{{ $key + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ Storage::url($product->image) }}" width="50" alt=""></td>
                            @if (Auth::check())
                                <td>{{ $product->price }}</td>
                            @else
                                <td>Liên hệ</td>
                            @endif
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{{ route('delete', ['id' => $product->id]) }}" class="btn btn-danger"
                                    onclick="return confirmDelete();">Xoá</a>

                                <script>
                                    function confirmDelete() {
                                        return confirm('Bạn có chắc chắn muốn xoá không?');
                                    }
                                </script>
                                <a href="{{ route('edit', ['id' => $product->id]) }}" class="btn btn-primary">Sửa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p>{{ $products->links('pagination::bootstrap-5') }}</p>

        </div>
    </div>
@endsection
