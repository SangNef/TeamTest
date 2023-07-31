@extends('layouts.app')

@section('content')
    <h1>Danh sách sản phẩm</h1>
    <a href="{{ route('san-pham.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPhams as $sanPham)
                <tr>
                    <td>{{ $sanPham->id }}</td>
                    <td>{{ $sanPham->ten_san_pham }}</td>
                    <td>{{ $sanPham->mo_ta }}</td>
                    <td>{{ $sanPham->gia }}</td>
                    <td>
                        <a href="{{ route('san-pham.edit', $sanPham->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('san-pham.destroy', $sanPham->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
