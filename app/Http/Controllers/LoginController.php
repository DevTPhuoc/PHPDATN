<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Người dùng đã được chứng thực
            return redirect('/home');
        }
        return view('/login');
    }
    public function login(Request $request){
        $credentials = $request->only('account_name','password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/home');
        }

        return redirect('/login')->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
