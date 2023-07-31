<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\SanPham;


class DonHangController extends Controller
{

    public function index()
    {
        $donHangs = DonHang::all();
        return view('donhang.index', compact('donHangs'));
    }

    public function create()
    {
        $khachHangs = KhachHang::all();
        $sanPhams = SanPham::all();
        return view('donhang.create', compact('khachHangs', 'sanPhams'));
    }

    public function edit(DonHang $donHang)
    {
        $khachHangs = KhachHang::all();
        $sanPhams = SanPham::all();
        return view('donhang.edit', compact('donHang', 'khachHangs', 'sanPhams'));
    }

    public function update(Request $request, DonHang $donHang)
    {
        $validatedData = $request->validate([
            'khach_hang_id' => 'required|exists:khach_hangs,id',
            'san_pham_id' => 'required|exists:san_phams,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        $donHang->update($validatedData);

        return redirect()->route('don-hang.index')->with('success', 'Đơn hàng đã được cập nhật thành công!');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'khach_hang_id' => 'required|exists:khach_hangs,id',
            'san_pham_id' => 'required|exists:san_phams,id',
            'so_luong' => 'required|integer|min:1',
        ]);

        DonHang::create($validatedData);

        return redirect()->route('don-hang.index')->with('success', 'Đơn hàng đã được thêm thành công!');
    }

    public function show(DonHang $donHang)
    {
        return view('donhang.show', compact('donHang'));
    }

    public function destroy(DonHang $donHang)
    {
        $donHang->delete();
        return redirect()->route('don-hang.index')->with('success', 'Đơn hàng đã được xóa thành công!');
    }

}
