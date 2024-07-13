<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function registerHandle(Request $request)
    {
        $admin = new Admin();
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return redirect()->route('login')->withErrors(['email' => 'Đăng ký thành công. vui lòng đăng nhập để sử dụng']);
    }


    public function showLoginForm()
    {

        // if (Auth::guard('admins')->check()) {
        //     return redirect()->route('home');
        // }
        return view('login');
    }

    public function loginHandle(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('home');
        }

        // Debug thông tin đăng nhập
        // dd($credentials, Auth::guard('admins')->attempt($credentials));

        return redirect()->route('login')->withErrors(['email' => 'Thông tin đăng nhập không hợp lệ']);
    }
}
