@extends('layouts.app')

@section('content')
    <h1>Giỏ hàng</h1>
    <a href="{{ route('gio-hang.create') }}" class="btn btn-primary">Thêm sản phẩm vào giỏ hàng</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gioHangs as $gioHang)
                <tr>
                    <td>{{ $gioHang->id }}</td>
                    <td>{{ $gioHang->sanPham->ten_san_pham }}</td>
                    <td>{{ $gioHang->so_luong }}</td>
                    <td>{{ $gioHang->tong_tien }}</td>
                    <td>
                        <a href="{{ route('gio-hang.edit', $gioHang->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('gio-hang.destroy', $gioHang->id) }}" method="POST" style="display: inline-block;">
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
