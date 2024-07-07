<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
class ImageController extends Controller
{
    public function themMoi(Request $request,$id){    
       
        $images = $request->file('images');
        if($images == null){
            return redirect()->back()->withErrors(['loiUpAnh'=>"Có ảnh đâu mà up"]);
        }
        foreach ($images as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/img/product', $imageName);

            $anhSanPham = new Image();
            $anhSanPham->img_product_id = $id;
            $anhSanPham->img_url = $imagePath;
            $anhSanPham->img_name = $imageName;
            $anhSanPham->save();
        }
        return redirect()->back()->with(['upAnh'=>"Upload ảnh thành công "]);
    }

    public function xoa($id,)
    {
        $anhSP = Image::find($id);
        $anhSP->delete();
        return redirect()->back();
    }
}
