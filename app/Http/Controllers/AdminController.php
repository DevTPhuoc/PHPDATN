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
            return view("Admin.index",compact('dsAdmin'));
            
        }
    }
    public function  themMoi()
    {
        {
        
            $dsAdmin = Admin::all();
            return view('admin.add',compact('dsAdmin'));
        }
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải chứa ký tự @.',
        ]);

        // Xử lý logic khi email hợp lệ
        return "Email hợp lệ!";
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
           
            return redirect()->route('Admin.index')->with(['themMoi'=>"Thêm mới thành công"]);
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

    public function xoa(Request $request, $id)
    {
        $admin = Admin::find($id);
    
        if ($admin !== null) {
            // Xóa chi tiết sản phẩm liên quan
            Admin::where('id', $admin->id)->delete();
    
            // Xóa admin
            $admin->delete();
    
            return redirect()->route('Admin.index')->with(['xoa' => "Xóa Admin thành công"]);
        } else {
            // Xử lý khi không tìm thấy admin
            return redirect()->route('Admin.index')->with(['error' => "Admin không tồn tại"]);
        }
    }

}
