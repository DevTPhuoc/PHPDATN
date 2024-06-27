<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        {
            $dsAdmin = Admin::all();
            return view("admin.index",compact('dsAdmin'));
            
        }
    }
    public function  themMoi()
    {
        {
            
            $dsAdmin = Admin::all();
            return view('admin.add',compact('dsAdmin'));
        }
    }
    public function xuLyThemMoi(Request $request)
    {
        {
            $admin = new Admin();
            $admin->account_name = $request->account_name;
            $admin->password = $request->password;
            $admin->fullname = $request->fullname;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->address = $request->address;
              
            $admin->save();
           
            return redirect()->route('index')->with(['themMoi'=>"Thêm mới thành công"]);
        }
    }
    public function  capNhat($id)
    {
        {
            $admin = Admin::find($id);
          
            if(empty($admin)){
                return redirect()->back()->withErrors(['loiCapNhap'=>"Admin khoong ton tai"]);
            }
           
            return view('admin.update',compact('admin'));
        }
    }
    public function xuLyCapNhat(Request $request,$id){
        $admin = Admin::find($id);
        if(empty($admin)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"Sản phẩm không tồn tại"]);
        }
        $admin->account_name = $request->account_name;
        $admin->password = $request->password;
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->save();
        return redirect()-> action([AdminController::class, 'index'],['id'=>$admin->id])->with(['capNhap'=>"Cập nhật Admin thanh cong"]);
    }

    public function xoa(Request $request,$id){

        $admin = Admin::find($id); 
        Admin::where('id', $admin->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $admin -> delete();
        return redirect()->route('index')->with(['xoa'=>"xoa Admin thanh cong"]);
    } 

}
