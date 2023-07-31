<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $fillable = ['ho_ten', 'email', 'so_dien_thoai'];

    public function donHangs()
    {
        return $this->hasMany(DonHang::class);
    }
}
