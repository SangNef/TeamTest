@extends('layouts.app')

@section('content')
    <h1>Thêm khách hàng</h1>
    <form action="{{ route('khach-hang.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ho_ten">Họ tên</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="so_dien_thoai">Số điện thoại</label>
            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection
