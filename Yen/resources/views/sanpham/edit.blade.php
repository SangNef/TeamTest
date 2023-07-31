
@extends('layouts.app')

@section('content')
    <h1>Sửa sản phẩm</h1>
    <form action="{{ route('san-pham.update', $sanPham->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_san_pham">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" value="{{ $sanPham->ten_san_pham }}" required>
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4">{{ $sanPham->mo_ta }}</textarea>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="number" class="form-control" id="gia" name="gia" value="{{ $sanPham->gia }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
