<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        {
            $dsCategories =Categories::all();
            return view('categories.index',compact('dsCategories')); 
        }
    }
    public function chiTiet(Request $request,$id){

        $categories = Categories::find($id);
        $dsProducts = Products::where('categories_product_id',$id)->paginate(20);
        return view('categories.detail',compact('categories','dsProducts'));
    }

    public function themMoi()
    {   
        {  
            $dsCategories = categories::all();
            return view('categories.add');
        }
    }

    public function xuLyThemMoi(Request $request){
        
        $categories = new Categories();
        $categories->name = $request->name;      
        $categories->save();
        return redirect()->action([CategoriesController::class, 'index'])->with(['themMoi'=>"Thêm mới thành công"]);
    }

    public function capNhat($id){
        $categories = Categories::find($id);
        
        if(empty($categories)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"không tồn tại"]);
        }
        return view('categories.update',compact('categories'));
    }

    public function xuLyCapNhat(Request $request,$id){
        $categories = Categories::find($id);
        if(empty($categories)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"không tồn tại"]);
        }
        $categories->name = $request->name;
        $categories->save();
        return redirect()-> action([CategoriesController::class, 'chiTiet'],['id'=>$categories->id])->with(['capNhap'=>"Cập nhật thành công"]);
    }

    public function xoa(Request $request,$id){
        $categories = Categories::find($id);

        $dsProducts = Products::where('categories_product_id',$id)->get();
        foreach($dsProducts as $categories){
            Products::where('categories_product_id',$categories -> $id);
            $categories->delete();
        }
        $categories -> delete();
        return redirect()->action([CategoriesController::class, 'danhSach']);
    }

}
