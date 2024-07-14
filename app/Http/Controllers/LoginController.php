<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins')->except(['showLoginForm', 'loginHandle', 'showRegisterForm', 'registerHandle']);
    }
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

        return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập để sử dụng.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function loginHandle(Request $request)
    {
        // Lấy email và mật khẩu từ request
        $email = $request->email;
        $password = $request->password;

        // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
        $user = Admin::where('email', $email)->first();

        if (!$user) {
            // Nếu email không tồn tại, trả về lỗi email
            return redirect()->route('login')->withErrors(['email' => 'Email không tồn tại.']);
        }

        // Nếu email tồn tại, kiểm tra mật khẩu
        if (!Hash::check($password, $user->password)) {
            // Nếu mật khẩu không khớp, trả về lỗi mật khẩu
            return redirect()->route('login')->withErrors(['password' => 'Mật khẩu không đúng.']);
        }

        // Nếu email và mật khẩu đúng, đăng nhập và chuyển hướng đến trang chủ
        Auth::guard('web')->login($user);
        return redirect('/home')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập để sử dụng.');
    }

}
