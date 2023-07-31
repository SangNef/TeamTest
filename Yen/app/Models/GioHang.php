<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'san_pham_id', 
        'so_luong',
        'tong_tien'
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
