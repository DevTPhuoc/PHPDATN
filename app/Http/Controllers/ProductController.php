<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use APP\Models\Suppliers;
class ProductController extends Controller
{
    // public function index()
    // {
    //     // {
    //     //     return view('product.index');
    
    //     // }
    // }
    // public function  themMoi()
    // {
    //     {
    //         return view('product.add');
    //     }
    // }
    public function index()
    {
        {
            $dsProduct = Product::all();
            return view('product.index');
        }
    }
    public function themMoi()
    {
       {
            $dsProduct = Product::all();
            return view('product.add');
       }
    }
    public function xuLyThemMoi(Request $request){
        
        $sanPham = new Product();
        $sanPham->categories_product_id = $request->categories_product_id;
        $sanPham->name = $request->name;
        $sanPham->price = $request->price;
        $sanPham->sex_product_id = $request->sex_product_id;
        $sanPham->image_product_id = $request->image_product_id;
        $sanPham->color = $request->color;
        $sanPham->size = $request->size;
        $sanPham->description = $request->description;
        $sanPham->suppliers_product_id = $request->suppliers_product_id;
        $sanPham->quantity = $request->quantity;
        $sanPham->promotion_product_id=$request->promation_product_id;     
        $sanPham->save();
        return redirect()->action([ProductController::class, 'danhSach'])->with(['themMoi'=>"Thêm mới thành công"]);
    }
    public function capNhat($id){
        $sanPham = Product::find($id);
        // $dsLoaiSP = Categories::all();
        // $dsNhaCungCap = Suppliers::all();
        if(empty($sanPham)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"Sản phẩm không tồn tại"]);
        }
        return view('product.update',compact('sanPham'));
    }

    public function xuLyCapNhat(Request $request,$id){
        $sanPham = Product::find($id);
        if(empty($sanPham)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"Sản phẩm không tồn tại"]);
        }
        $sanPham->categories_product_id = $request->categories_product_id;
        $sanPham->name = $request->name;
        $sanPham->price = $request->price;
        $sanPham->sex_product_id = $request->sex_product_id;
        $sanPham->image_product_id = $request->image_product_id;
        $sanPham->color = $request->color;
        $sanPham->size = $request->size;
        $sanPham->description = $request->description;
        $sanPham->suppliers_product_id = $request->suppliers_product_id;
        $sanPham->quantity = $request->quantity;
        $sanPham->promotion_product_id=$request->promation_product_id;     
        $sanPham->save();
        return redirect()-> action([ProductController::class, 'chiTiet'],['id'=>$sanPham->id])->with(['capNhap'=>"Cập nhật sản phẩm thành công"]);
    }

    public function xoa(Request $request,$id){

        $sanPham = Product::find($id);  
        Product::where('id', $sanPham->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $sanPham -> delete();
        return redirect()->action([ProductController::class, 'danhSach']);
    }   
    public function timKiem(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsSanPham=Product::where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('id', $keyword)
                            ->paginate(20);                                  
        }
        $tongSanPham = Product::count();
        $conHang =Product::where('role', 1)->count();
        $hetHang = Product::where('role', 2)->count();
        return view('product.index',compact('tongSanPham','conHang','hetHang','dsSanPham'));
    }

    public function sanPhamCon(Request $request)
    {       
        $dsSanPham=Product::where('role', 1)
                            ->paginate(20);                                  
        $tongSanPham = Product::count();
        $conHang = Product::where('role', 1)->count();
        $hetHang = Product::where('role', 2)->count();
        return view('product.index',compact('tongSanPham','conHang','hetHang','dsSanPham'));
    }

    public function sanPhamHet(Request $request)
    {       
        $dsSanPham=Product::where('role', 2)
                            ->paginate(20);                                  
        $tongSanPham =Product::count();
        $conHang = Product::where('role', 1)->count();
        $hetHang = Product::where('role', 2)->count();
        return view('product.index',compact('tongSanPham','conHang','hetHang','dsSanPham'));
    }

     public function chiTiet(Request $request,$id){

        $sanPham = Product::find($id);
        $dsChiTietSP = Product::where('id',$id)
                                    ->orderBy('size')
                                    ->get();
        $tongSoLuong = $dsChiTietSP->sum('quantity');
        // $dsAnhSanPham = $sanPham->anh_san_pham;
        return view('product.detail',compact('sanPham','dsChiTietSP','tongSoLuong',));
    }
}
