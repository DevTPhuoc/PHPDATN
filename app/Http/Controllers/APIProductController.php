<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Suppliers;
use App\Models\Image;

class APIProductController extends Controller
{
    public function sanPhamTheoNhaCungCap($id)
    {
        $nhaCungCap = Suppliers::find($id);
        $dsSanPham = $nhaCungCap->products;
        if (empty($dsSanPham)) {
            return response()->json([
                'success' => false,
                'data' => "Loại sản phẩm này không tồn tại"
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }

    public function dsSanPham()
    {
        $dsSanPham = Products::all();
        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }

    public function thongTinSanPham($id)
    {
        $sanPham = Products::with('images')->find($id);

        if (empty($sanPham)) {
            return response()->json([
                'success' => false,
                'data' => "Sản phẩm không tồn tại"
            ]);
        }

        $imageNames = $sanPham->images->pluck('name');

        return response()->json([
            'success' => true,
            'data' => [
                'product' => $sanPham,
                'image_names' => $imageNames,
            ]
        ]);
    }
    public function dsColors()
    {
        $colors = \DB::table('colors')->select('id', 'name')->get();
        return response()->json([
            'success' => true,
            'data' => $colors
        ]);
    }
    public function sanPhamTheoMau($id)
    {
        $dsSanPham = Products::where('color_product_id', $id)->get();
        if ($dsSanPham->isEmpty()) {
            return response()->json([
                'success' => false,
                'data' => "Không có sản phẩm nào với màu này"
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }
   

}
