<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        if (Auth::check()) {           
            
                return redirect('/master');
            }            
        return view('/login');
    }
    public function login(Request $request){
        
        if(Auth::guard('web')->attempt(['account_name' => $request->account_name,'password' => $request->password])){
            return redirect('/master');
        }
        
        return redirect('/login')->withInput()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
