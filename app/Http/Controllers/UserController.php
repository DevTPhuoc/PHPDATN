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
    public function  themMoi()
    {
        {
            
            $dsUser = User::all();
            return view('user.add',compact('dsUser'));
        }
    }
    public function xuLyThemMoi(Request $request)
    {
        {
            $user = new User();
            $user->account_name = $request->account_name;
            $user->password = $request->password;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
              
            $user->save();
           
            return redirect()->route('index')->with(['themMoi'=>"Thêm mới thành công"]);
        }
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
        $admin = User::find($id);
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

    public function xoa(Request $request,$id){

        $user= User::find($id); 
        User::where('id', $user->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $user -> delete();
        return redirect()->route('index')->with(['xoa'=>"xoa Admin thanh cong"]);
    } 
   
}
