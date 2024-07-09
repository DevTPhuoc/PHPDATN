<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $dsCategories = Categories::paginate(10);;
        return view('categories.index', compact('dsCategories'));
    }

    public function chiTiet(Request $request, $id)
    {
        $categories = Categories::find($id);
        $dsProducts = Products::where('categories_product_id', $id)->paginate(20);
        return view('categories.detail', compact('categories', 'dsProducts'));
    }

    public function themMoi()
    {
        return view('categories.add');
    }

    public function xuLyThemMoi(Request $request)
    {
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->save();
        return redirect()->action([CategoriesController::class, 'index'])->with(['themMoi' => "Thêm mới thành công"]);
    }

    public function capNhat($id)
    {
        $categories = Categories::find($id);
        
        if (empty($categories)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        return view('categories.update', compact('categories'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $categories = Categories::find($id);
        if (empty($categories)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        $categories->name = $request->name;
        $categories->save();
        return redirect()->action([CategoriesController::class, 'chiTiet'], ['id' => $categories->id])->with(['capNhap' => "Cập nhật thành công"]);
    }

    public function xoa(Request $request, $id)
    {
        $categories = Categories::find($id);

        $dsProducts = Products::where('categories_product_id', $id)->get();
        foreach ($dsProducts as $product) {
            $product->delete();
        }
        $categories->delete();
        return redirect()->action([CategoriesController::class, 'index']);
    }

    public function timKiem(Request $request)
    {
        $keyword = $request->input('keyword');
    
        if (!empty($keyword)) {
            $dsCategories = Categories::where('name', 'LIKE', '%' . $keyword . '%')->paginate(20);
        } else {
            $dsCategories = Categories::paginate(20); // Nếu không có từ khóa, lấy tất cả loại sản phẩm
        }
    
        return view('categories.index', compact('dsCategories'));
    }
}
