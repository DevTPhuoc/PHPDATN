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
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{


    public function index()
    {
        $dsProducts = Products::with(['images', 'categories', 'suppliers', 'promotion', 'productDetails'])->paginate(5);

        return view('product.index', compact('dsProducts'));
    }
    public function capNhat($id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();
        $suppliers = Suppliers::all();
        $promotions = Promotion::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('product.update', compact('product', 'categories', 'suppliers', 'promotions', 'sizes', 'colors'));
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->categories_product_id = $request->categories_product_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->suppliers_id = $request->suppliers_id;
        $product->save();
    
        // Xử lý hình ảnh (nếu có)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/add', $imageName); // Lưu hình ảnh vào thư mục storage/app/public/img/add
    
                Image::updateOrCreate(
                    ['product_id' => $product->id, 'name' => $imageName],
                    ['name' => $imageName]
                );
            }
        }
    
        return redirect()->route('product.index')->with(['capNhat' => "Cập nhật sản phẩm thành công"]);
    }
    public function themMoi()
    {
        $dsLoaiSP = Categories::all();
        $dsNhaCungCap = Suppliers::all();
        $dsKhuyenMai = Promotion::all();
        $dsSize = Size::all();
        $dsMauSac = Color::all();
        $product = new Products();
        $imagePath = public_path('img/add');
        $images = File::files($imagePath);
        $imageNames = [];
        foreach ($images as $image) {
            $imageNames[] = $image->getFilename();
        }
        return view('product.add', compact('dsLoaiSP', 'dsNhaCungCap', 'dsKhuyenMai', 'dsSize', 'dsMauSac', 'product', 'imageNames'));
    }



    public function xuLyThemMoi(Request $request)
{{
    // Kiểm tra xem sản phẩm có sẵn không dựa trên size và color
    // $existingProductDetail = ProductDetail::where('size_id', $request->size_id)
    //     ->where('color_id', $request->color_id)
    //     ->first();

    // if ($existingProductDetail) {
    //     // Nếu chi tiết sản phẩm đã tồn tại, cập nhật số lượng chi tiết sản phẩm
    //     // $existingProductDetail->increment('quantity_detail', 1);

    //     // Kiểm tra và cập nhật số lượng tổng của sản phẩm
    //     if ($existingProductDetail->product) {
    //         $existingProductDetail->product->increment('quantity', 1);
    //     } else {
    //         // Xử lý khi sản phẩm không tồn tại
    //         // Ví dụ: throw new Exception('Không tìm thấy sản phẩm');
    //     }
    // } else {
    //     // Nếu chi tiết sản phẩm chưa tồn tại, kiểm tra và tạo mới sản phẩm
    //     $product = Product::where('name', $request->name)->first();
    // $product = new Products();

    //     if (!$product) {
            // Tạo mới sản phẩm nếu chưa tồn tại
            $product = new Products();
            $product->categories_product_id = $request->categories_product_id;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->selling_price = $request->selling_price;
            $product->description = $request->description;
            $product->suppliers_id = $request->suppliers_id;
            $product->quantity = 1; // Tự động thêm 1 vào quantity khi tạo mới sản phẩm
            $product->promotions_id = $request->promotions_id;
            $product->save();
// }

        // Tạo mới chi tiết sản phẩm
        $productDetail = new ProductDetail();
        $productDetail->size_id = $request->size_id;
        $productDetail->color_id = $request->color_id;
        $productDetail->quantity_detail = 1; // Tự động thêm 1 vào quantity_detail khi tạo mới chi tiết sản phẩm
        $productDetail->product_id = $product->id;
        $productDetail->save();

        // Lưu hình ảnh
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/img/add', $imageName); // Lưu hình ảnh vào thư mục storage/app/public/img/add

                $imageRecord = Image::create([
                    'product_id' => $product->id,
                    'name' => $imageName,
                ]);
            }
        }
    }

    return redirect()->route('product.index')->with(['themMoi' => "Thêm mới sản phẩm thành công"]);
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
