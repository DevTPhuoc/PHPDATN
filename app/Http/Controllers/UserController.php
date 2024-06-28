<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        {
            $dsUser = User::all();
            return view("user.index",compact('dsUser'));
            
    
        }
    }
    public function themMoi()
    {
        $dsUser = User::all();
        return view('user.add', compact('dsUser'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $user = new User();
        $user->account_name = $request->account_name;
        $user->password = $request->password;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.index')->with(['themMoi' => "Thêm mới thành công"]);
    }

   
    
    public function  capNhat($id)
    {
        {
            $user = User::find($id);
          
            if(empty($user)){
                return redirect()->back()->withErrors(['loiCapNhap'=>"Admin khoong ton tai"]);
            }
           
            return view('user.update',compact('user'));
        }
    }
    public function xuLyCapNhat(Request $request,$id){
        $user = User::find($id);
        if(empty($user)){
            return redirect()->back()->withErrors(['loiCapNhap'=>"Sản phẩm không tồn tại"]);
        }
        $user->account_name = $request->account_name;
        $user->password = $request->password;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect()-> action([UserController::class, 'index'],['id'=>$user->id])->with(['capNhap'=>"Cập nhật Admin thanh cong"]);
    }

    public function xoa(Request $request, $id)
    {
        $user = User::find($id);
    
        if ($user !== null) {
            // Xóa chi tiết sản phẩm liên quan
            User::where('id', $user->id)->delete();
    
            // Xóa user
            $user->delete();
    
            return redirect()->route('user.index')->with(['xoa' => "Xóa user thành công"]);
        } else {
            // Xử lý khi không tìm thấy user
            return redirect()->route('user.index')->with(['error' => "User không tồn tại"]);
        }
    }
    
   
}
