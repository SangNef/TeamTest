<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangController extends Controller
{

    public function index()
    {
        $gioHangs = GioHang::with('donHang', 'sanPham')->get();
        return view('giohang.index', compact('gioHangs'));
    }

    public function create()
    {
        $donHangs = DonHang::all();
        $sanPhams = SanPham::all();
        return view('giohang.create', compact('donHangs', 'sanPhams'));
    }
    
    public function edit(GioHang $gioHang)
    {
        $sanPhams = SanPham::all();
        return view('giohang.edit', compact('gioHang', 'sanPhams'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'san_pham_id' => 'required|exists:san_phams,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        $sanPham = SanPham::findOrFail($validatedData['san_pham_id']);
        $validatedData['tong_tien'] = $sanPham->gia * $validatedData['so_luong'];

        GioHang::create($validatedData);

        return redirect()->route('gio-hang.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
    }

    public function destroy(GioHang $gioHang)
    {
        $gioHang->delete();
        return redirect()->route('gio-hang.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    }

    public function update(Request $request, GioHang $gioHang)
    {
        $validatedData = $request->validate([
        'san_pham_id' => 'required|exists:san_phams,id',
        'so_luong' => 'required|integer|min:1',
        ]);

        $sanPham = SanPham::findOrFail($validatedData['san_pham_id']);
        $validatedData['tong_tien'] = $sanPham->gia * $validatedData['so_luong'];
        $gioHang->update($validatedData);
        return redirect()->route('gio-hang.index')->with('success', 'Sản phẩm trong giỏ hàng đã được cập nhật thành công!');
    }
}
