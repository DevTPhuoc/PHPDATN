<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function registerHandle(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }

    public function showLoginForm()
    {

        if (Auth::guard('admins')->check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function loginHandle(Request $request)
    {
       
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ']);
    }


}
