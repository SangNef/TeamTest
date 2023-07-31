@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa đơn hàng</h1>
    <form action="{{ route('don-hang.update', $donHang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="khach_hang_id">Khách hàng:</label>
            <select name="khach_hang_id" id="khach_hang_id" class="form-control">
                @foreach ($khachHangs as $khachHang)
                    <option value="{{ $khachHang->id }}" {{ $khachHang->id === $donHang->khach_hang_id ? 'selected' : '' }}>
                        {{ $khachHang->ho_ten }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="san_pham_id">Sản phẩm:</label>
            <select name="san_pham_id" id="san_pham_id" class="form-control">
                @foreach ($sanPhams as $sanPham)
                    <option value="{{ $sanPham->id }}" {{ $sanPham->id === $donHang->san_pham_id ? 'selected' : '' }}>
                        {{ $sanPham->ten_san_pham }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_luong">Số lượng:</label>
            <input type="number" name="so_luong" id="so_luong" class="form-control" value="{{ $donHang->so_luong }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
