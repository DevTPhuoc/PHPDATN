<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Suppliers;

class APIProductController extends Controller
{
    public function sanPhamTheoNhaCungCap($id){
        $nhaCungCap = Suppliers::find($id);
        $dsSanPham = $nhaCungCap->products;
        if(empty($dsSanPham)){
            return response()->json([
                'success'=>false,
                'data'=>"Loại sản phẩm này không tồn tại"
            ]);
        }

        return response()->json([
            'success'=>true,
            'data'=>$dsSanPham
        ]);
    }
    public function dsSanPham(){
        $dsSanPham = Products::All();
        return response()->json([
            'success'=>true,
            'data'=>$dsSanPham
        ]);
       }
    

    public function thongTinSanPham($id){
        $sanPham = Products::find($id);
        
        if(empty($sanPham)){
            return response()->json([
                'success'=>false,
                'data'=>"Loại sản phẩm này không tồn tại"
            ]);
        }

        return response()->json([
            'success'=>true,
            'data'=>$sanPham
        ]);
    }
}

