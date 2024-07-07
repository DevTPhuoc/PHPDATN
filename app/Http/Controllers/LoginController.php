<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{ public function showLoginForm()
    {
        // Kiểm tra nếu đã đăng nhập
        if (Auth::guard('admins')->check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function loginHandle(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Xác thực thành công
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('login');
    }
    
}
