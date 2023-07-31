@extends('layouts.app')

@section('content')
    <h1>Danh sách đơn hàng</h1>
    <a href="{{ route('don-hang.create') }}" class="btn btn-primary">Thêm đơn hàng</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donHangs as $donHang)
                <tr>
                    <td>{{ $donHang->id }}</td>
                    <td>{{ $donHang->khachHang->ho_ten }}</td>
                    <td>{{ $donHang->sanPham?->ten_san_pham }}</td>
                    
                    <td>{{ $donHang->so_luong }}</td>
                    <td>
                        <a href="{{ route('don-hang.show', $donHang->id) }}" class="btn btn-sm btn-primary">Xem</a>
                        <form action="{{ route('don-hang.destroy', $donHang->id) }}" method="POST" style="display: inline-block;">
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
