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
        $dsSanPham = Products::leftJoin('images', 'products.id', '=', 'images.product_id')->select('products.*', 'images.name as image_name') ->get();
        // $dsSanPham = Products::with('images')->get();

        return response()->json([
            'success' => true,
            'data' => $dsSanPham
        ]);
    }

    public function thongTinSanPham($id)
{
    // Tìm sản phẩm trước
    $sanPham = Products::find($id);

    // Kiểm tra xem sản phẩm có tồn tại không
    if (empty($sanPham)) {
        return response()->json([
            'success' => false,
            'data' => "Loại sản phẩm này không tồn tại"
        ]);
    }

    // Thực hiện truy vấn với leftJoin
    $sanPham = Products::leftJoin('images', 'products.id', '=', 'images.product_id')
        ->where('products.id', $id)
        ->select('products.*', 'images.name as image_name')
        ->first(); // Sử dụng first() thay vì get() để lấy một bản ghi

    return response()->json([
        'success' => true,
        'data' => $sanPham
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
