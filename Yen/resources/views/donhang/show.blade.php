@extends('layouts.app')

@section('content')
    <h1>Chi tiết đơn hàng</h1>
    <p><strong>Khách hàng:</strong> {{ $donHang->khachHang->ho_ten }}</p>
    {{ $donHang->sanPham ? $donHang->sanPham->ten_san_pham : 'Sản phẩm không tồn tại' }}


    <p><strong>Số lượng:</strong> {{ $donHang->so_luong }}</p>
    <a href="{{ route('don-hang.edit', $donHang->id) }}" class="btn btn-primary">Sửa</a>
    <form action="{{ route('don-hang.destroy', $donHang->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
    </form>
@endsection
