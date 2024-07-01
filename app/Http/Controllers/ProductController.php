<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Suppliers;
use App\Models\ProductDetail;
use App\Models\Promotion;

class ProductController extends Controller
{


    public function index(){
        $dsProducts = Products::with('suppliers')->get();
    
        $tongProducts = Products::count();
    
        return view('product.index',compact('tongProducts','dsProducts'));

    }
    // public function chiTiet(Request $request,$id){

    //     $Products = Products::find($id);
    //     $dsChiTietSP = ProductDetail::where('san_pham_id',$id)
    //                                 ->orderBy('size_id')
    //                                 ->get();
    //     $tongSoLuong = $dsChiTietSP->sum('so_luong');
    //     return view('products.detail',compact('Products','dsChiTietSP','tongSoLuong'));
    // }

    public function themMoi()
    {
        $dsLoaiSP = Categories::all();
        $dsNhaCungCap = Suppliers::all();
        $dsKhuyenMai = Promotion::all();
        return view('product.add', compact('dsLoaiSP', 'dsNhaCungCap', 'dsKhuyenMai'));
    }
    public function xuLyThemMoi(Request $request)
    {

        $Products = new Products();
        $Products->categories_product_id = $request->categories_product_id;
        $Products->name = $request->name;
        $Products->price = $request->price;
        $Products->description = $request->description;


        $Products->suppliers_id  = $request->suppliers_id ;
        $Products->quantity = $request->quantity;
        $Products->promotions_id =$request->promotions_id ;     
        $Products->save();
        return redirect()->action([ProductController::class, 'index'])->with(['themMoi' => "Thêm mới thành công"]);
    }
    public function capNhat($id)
    {
        $Products = Products::find($id);
        // $dsLoaiSP = Categories::all();
        // $dsNhaCungCap = Suppliers::all();
        if (empty($Products)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Sản phẩm không tồn tại"]);
        }
        return view('product.update', compact('Products'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $Products = Products::find($id);
        if (empty($Products)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Sản phẩm không tồn tại"]);
        }
        $Products->categories_product_id = $request->categories_product_id;
        $Products->name = $request->name;
        $Products->price = $request->price;
        $Products->sex_product_id = $request->sex_product_id;
        $Products->image_product_id = $request->image_product_id;
        $Products->color = $request->color;
        $Products->size = $request->size;
        $Products->description = $request->description;
        $Products->suppliers_product_id = $request->suppliers_id;
        $Products->quantity = $request->quantity;
        $Products->promotion_product_id = $request->promation_id;
        $Products->save();
        return redirect()->action([ProductController::class, 'chiTiet'], ['id' => $Products->id])->with(['capNhap' => "Cập nhật sản phẩm thành công"]);
    }

    public function xoa(Request $request, $id)
    {

        $Products = Products::find($id);
        Products::where('id', $Products->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $Products->delete();
        return redirect()->action([ProductController::class, 'danhSach']);
    }
    public function timKiem(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsProducts = Products::where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('id', $keyword)
                ->paginate(20);
        }
        $tongProducts = Products::count();
        $conHang = Products::where('role', 1)->count();
        $hetHang = Products::where('role', 2)->count();
        return view('product.index', compact('tongProducts', 'conHang', 'hetHang', 'dsProducts'));
    }

    public function ProductsCon(Request $request)
    {
        $dsProducts = Products::where('role', 1)
            ->paginate(20);
        $tongProducts = Products::count();
        $conHang = Products::where('role', 1)->count();
        $hetHang = Products::where('role', 2)->count();
        return view('product.index', compact('tongProducts', 'conHang', 'hetHang', 'dsProducts'));
    }

    public function ProductsHet(Request $request)
    {
        $dsProducts = Products::where('role', 2)
            ->paginate(20);
        $tongProducts = Products::count();
        $conHang = Products::where('role', 1)->count();
        $hetHang = Products::where('role', 2)->count();
        return view('product.index', compact('tongProducts', 'conHang', 'hetHang', 'dsProducts'));
    }

    public function chiTiet(Request $request, $id)
    {

        $Products = Products::find($id);
        $dsNhaCungCap = Suppliers::all();
        $dsKhuyenMai = Promotion::all();
     
        $dsChiTietSP = Products::where('id', $id)
            ->orderBy('size')
            ->get();
        $tongSoLuong = $dsChiTietSP->sum('quantity');
        // $dsAnhProducts = $Products->anh_san_pham;
        return view('product.detail', compact('Products', 'dsChiTietSP', 'tongSoLuong', ));
    }
}
