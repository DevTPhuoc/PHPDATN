<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Suppliers;
use App\Models\ProductDetail;
use App\Models\Promotion;
use App\Models\Size;
use App\Models\Color;
use App\Models\Image;

class ProductController extends Controller
{


    public function index()
    {
        $dsProducts = Products::with('suppliers', 'categories', 'promotion', 'productDetails')->paginate(5);
        $tongProducts = Products::count();

        return view('product.index', compact('tongProducts', 'dsProducts'));
    }

    public function themMoi()
    {
        $dsLoaiSP = Categories::all();
        $dsNhaCungCap = Suppliers::all();
        $dsKhuyenMai = Promotion::all();
        $dsSize = Size::all();
        $dsMauSac = Color::all();
        $product = new Products();
        return view('product.add', compact('dsLoaiSP', 'dsNhaCungCap', 'dsKhuyenMai', 'dsSize', 'dsMauSac', 'product'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $request->validate([
            'selling_price' => 'required|numeric|min:0',
            // Thêm các validation rule khác cho các trường khác nếu cần
        ]);

        $product = new Products();
        $product->categories_product_id = $request->categories_product_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->sex_product_id = $request->sex_product_id;
        $product->image_product_id = $request->image_product_id;
        $product->color_product_id = $request->color_product_id;
        $product->size_id = $request->size_id;
        $product->selling_price = $request->selling_price;
        $product->description = $request->description;
        $product->suppliers_product_id = $request->suppliers_id;
        $product->quantity = $request->quantity;
        $product->promotion_id = $request->promotion_id;

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/images', $imageName); // Lưu hình ảnh vào thư mục storage/app/public/images

                Image::create([
                    'product_id' => $product->id,
                    'name' => $imageName,
                ]);
            }
        }

        return redirect()->route('product.index')->with(['themMoi' => "Thêm mới sản phẩm thành công"]);
    }

    public function capNhat($id)
    {
        $product = Products::with('categories', 'suppliers', 'promotion')->find($id);

        if (empty($product)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Sản phẩm không tồn tại"]);
        }

        $categories = Categories::all(); // Lấy danh sách loại sản phẩm
        $suppliers = Suppliers::all(); // Lấy danh sách nhà cung cấp

        return view('product.update', compact('product', 'categories', 'suppliers'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'price' => 'required|numeric|min:0',
            'categories_product_id' => 'required',
            'suppliers_id' => 'required',
        ]);

        // Find the product by ID
        $product = Products::find($id);

        // If product not found, redirect back with error message
        if (!$product) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Sản phẩm không tồn tại"]);
        }

        // Update product details from request
        $product->name = $request->name;
        $product->price = $request->price;
        $product->categories_product_id = $request->categories_product_id;
        $product->suppliers_id = $request->suppliers_id;
        // Update other attributes as needed

        // Save the updated product
        $product->save();

        // Redirect to the product detail page with success message
        return redirect()->route('product.detail', ['id' => $product->id])->with(['capNhap' => "Cập nhật sản phẩm thành công"]);
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
        } else {
            $dsProducts = Products::paginate(20);
        }

        // Tính tổng số lượng của tất cả chi tiết sản phẩm và trạng thái hàng
        foreach ($dsProducts as $product) {
            $product->total_quantity = $product->productDetails->sum('quantity_detail');
            $product->status = ($product->total_quantity > 0) ? 'Còn hàng' : 'Hết hàng';
        }

        return view('product.index', compact('dsProducts'));
    }

    public function trangThaiHang()
    {
        $tongProducts = Products::count();
        $conHang = Products::whereHas('productDetails', function ($query) {
            $query->where('quantity_detail', '>', 0);
        })->count();
        $hetHang = Products::whereHas('productDetails', function ($query) {
            $query->where('quantity_detail', '=', 0);
        })->count();

        return view('product.index', compact('tongProducts', 'conHang', 'hetHang'));
    }



    public function chiTiet(Request $request, $id)
    {

        $Products = Products::find($id);

        // Lấy danh sách chi tiết sản phẩm (sắp xếp theo size_id)
        $dsChiTietSP = ProductDetail::where('product_id', $id)
            ->orderBy('size_id')
            ->get();

        // Tính tổng số lượng sản phẩm
        $tongSoLuong = $dsChiTietSP->sum('quantity_detail');

        // Trả về view 'product.detail' với các biến compact
        return view('product.detail', compact('Products', 'dsChiTietSP', 'tongSoLuong'));
    }



}
