@extends('layouts.app')

@section('content')
    <h1>Thêm sản phẩm vào giỏ hàng</h1>
    <form action="{{ route('gio-hang.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="san_pham_id">Chọn sản phẩm:</label>
            <select name="san_pham_id" id="san_pham_id" class="form-control">
                @foreach ($sanPhams as $sanPham)
                    <option value="{{ $sanPham->id }}">{{ $sanPham->ten_san_pham }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_luong">Số lượng:</label>
            <input type="number" name="so_luong" id="so_luong" class="form-control" value="1" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
    </form>

    <script>
        document.getElementById('tong_tien').textContent = '0.00';

        document.getElementById('so_luong').addEventListener('input', function() {
            const selectedOption = document.getElementById('san_pham_id').selectedOptions[0];
            const price = parseFloat(selectedOption.dataset.price);
            const quantity = parseInt(this.value);
            const totalPrice = price * quantity;
            document.getElementById('tong_tien').textContent = totalPrice.toFixed(2);
        });
    </script>
@endsection


