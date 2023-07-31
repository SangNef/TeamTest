<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $fillable = ['khach_hang_id', 'san_pham_id', 'so_luong'];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}
