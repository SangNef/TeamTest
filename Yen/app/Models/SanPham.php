<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $fillable = ['ten_san_pham', 'mo_ta', 'gia'];

    public function donHangs()
    {
        return $this->belongsToMany(DonHang::class)->withPivot('ten_san_pham');
    }
    
}

