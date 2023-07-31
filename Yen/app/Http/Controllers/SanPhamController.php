<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{

    public function index()
    {
        $sanPhams = SanPham::all();
        return view('sanpham.index', compact('sanPhams'));
    }

    public function create()
    {
        return view('sanpham.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|max:255',
            'mo_ta' => 'nullable|string',
            'gia' => 'required|numeric',
        ]);

        SanPham::create($validatedData);

        return redirect()->route('san-pham.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function edit(SanPham $sanPham)
    {
        return view('sanpham.edit', compact('sanPham'));
    }

    public function update(Request $request, SanPham $sanPham)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|max:255',
            'mo_ta' => 'nullable|string',
            'gia' => 'required|numeric',
        ]);

        $sanPham->update($validatedData);

        return redirect()->route('san-pham.index')->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    public function destroy(SanPham $sanPham)
    {
        $sanPham->delete();
        return redirect()->route('san-pham.index')->with('success', 'Sản phẩm đã được xóa thành công!');
    }

}
