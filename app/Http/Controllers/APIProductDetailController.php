<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class APIProductDetailController extends Controller
{
    public function sanPhamTheoLoai(Request $request, $id)
    { 
        $loaiSP = ProductDetail::with('products')->find($id);
         if(empty($loaiSP))
         { return response()->json([
             'success'=>false, 
             'data'=>"Loại sản phẩm này không tồn tại" 
            ]); }

          return response()->json([ 
            'success'=>true, 
            'data'=>$loaiSP 
        ]); 
        }
    public function dsLoaiSanPham(){
        $dsLoaiSP = ProductDetail::with('products')->leftJoin('images', 'products.id', '=', 'images.product_id')
        ->where('products.id', $id)
        ->select('products.*', 'images.name as image_name')
        ->first()->get();
        
        return response()->json([
            'success' => true,
            'data' => $dsLoaiSP
        ]);
    }
    // public function chiTietLoaiSP($id){
    //     $loaiSP = LoaiSP::with('san_pham')->find($id);

    //     if(empty($loaiSP)){
    //         return response()->json([
    //             'success'=>false,
    //             'data'=>"Loại sản phẩm này không tồn tại"
    //         ]);
    //     }

    //     return response()->json([
    //         'success'=>true,
    //         'data'=>$loaiSP
    //     ]);
    // }

    // public function themMoi( Request $request){
    //     if($request->ten){
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>"Chưa nhập tên loại sản phẩm"
    //         ]);
    //     }

    //     $loaiSP = LoaiSP::where('ten',$request->ten)->first();
    //     if(!empty($loaiSP)){
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>"Loại sản phẩm này đã tồn tại"
    //         ]);
    //     }

    //     $loaiSanPham = new LoaiSP;
    //     $loaiSanPham->ten = $request->ten;
    //     $loaiSanPham->save();

    //     return response()->json([
    //         'success'=>true,
    //         'message'=>"Thêm mới thành công"
    //     ]);
    // }

    // public function capNhat(Request $request,$id){
    //     $loaiSP = LoaiSP::find($id);

    //     if(empty($loaiSP)){
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>"Loại sản phẩm không tồn tại"
    //         ]);
    //     }

    //     $count = LoaiSP::where('ten',$request->ten)->count();
    //     if($count > 0){
    //         return response()->json([
    //             'success'=>false,
    //             'message'=>"Loại sản phẩm đã tồn tại"
    //         ]);
    //     }

    //     $loaiSP->ten = $request->ten_loai;
    //     $loaiSP->save();
    //     return response()->json([
    //         'success'=>true,
    //         'message'=>"Cập nhật thành công"
    //     ]);
    // }

    // public function xoa($id){
    //     $loaiSP = LoaiSP::find($id);

    //     if (empty($loaiSP)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => "San pham {$id} khong ton tai"
    //         ]);
    //     }

    //     $loaiSP->delete();
    //     return response()->json([
    //         'success' => true,
    //         'message' => "xoa loai san pham thanh cong"
    //     ]);
    // }

    // public function timKiem(Request $request)
    // {
    //     $loaiSP = LoaiSP::where('ten', $request->ten)->first();
    //     if (empty($loaiSP)) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $loaiSP
    //         ]);
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'message' => $loaiSP
    //     ]);
    // }

}
