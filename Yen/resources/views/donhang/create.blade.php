@extends('layouts.app')

@section('content')
    <h1>Thêm đơn hàng</h1>
    <form action="{{ route('don-hang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="khach_hang_id">Khách hàng</label>
            <select class="form-control" id="khach_hang_id" name="khach_hang_id" required>
                @foreach ($khachHangs as $khachHang)
                    <option value="{{ $khachHang->id }}">{{ $khachHang->ho_ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="san_pham_id">Sản phẩm</label>
            <select class="form-control" id="san_pham_id" name="san_pham_id" required>
                @foreach ($sanPhams as $sanPham)
                    <option value="{{ $sanPham->id }}">{{ $sanPham->ten_san_pham }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_luong">Số lượng</label>
            <input type="number" class="form-control" id="so_luong" name="so_luong" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
