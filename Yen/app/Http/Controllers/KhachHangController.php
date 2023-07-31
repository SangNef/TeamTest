<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;


class KhachHangController extends Controller
{

    public function index()
    {
        $khachHangs = KhachHang::all();
        return view('khachhang.index', compact('khachHangs'));
    }

    public function create()
    {
        return view('khachhang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ho_ten' => 'required|max:255',
            'email' => 'required|email|unique:khach_hangs',
            'so_dien_thoai' => 'nullable|string',
        ]);

        KhachHang::create($validatedData);

        return redirect()->route('khach-hang.index')->with('success', 'Khách hàng đã được thêm thành công!');
    }

    public function edit(KhachHang $khachHang)
    {
        return view('khachhang.edit', compact('khachHang'));
    }

    public function update(Request $request, KhachHang $khachHang)
    {
        $validatedData = $request->validate([
            'ho_ten' => 'required|max:255',
            'email' => 'required|email|unique:khach_hangs,email,' . $khachHang->id,
            'so_dien_thoai' => 'nullable|string',
        ]);

        $khachHang->update($validatedData);

        return redirect()->route('khach-hang.index')->with('success', 'Khách hàng đã được cập nhật thành công!');
    }

    public function destroy(KhachHang $khachHang)
    {
        $khachHang->delete();
        return redirect()->route('khach-hang.index')->with('success', 'Khách hàng đã được xóa thành công!');
    }

}
