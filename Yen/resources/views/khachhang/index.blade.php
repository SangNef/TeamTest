@extends('layouts.app')

@section('content')
    <h1>Danh sách khách hàng</h1>
    <a href="{{ route('khach-hang.create') }}" class="btn btn-primary">Thêm khách hàng</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khachHangs as $khachHang)
                <tr>
                    <td>{{ $khachHang->id }}</td>
                    <td>{{ $khachHang->ho_ten }}</td>
                    <td>{{ $khachHang->email }}</td>
                    <td>{{ $khachHang->so_dien_thoai }}</td>
                    <td>
                        <a href="{{ route('khach-hang.edit', $khachHang->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('khach-hang.destroy', $khachHang->id) }}" method="POST" style="display: inline-block;">
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
