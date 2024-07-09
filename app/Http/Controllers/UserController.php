<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    { 
        {
            $dsUser = User::paginate(10);
            return view("user.index", compact('dsUser'));


        }
    }
    public function themMoi()
    {
        $dsUser = User::all();
        return view('user.add', compact('dsUser'));
    }

    public function xuLyThemMoi(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^0\d{9}$/',
            'address' => 'required|string|max:255',
        ], [
            'account_name.required' => 'Tên tài khoản là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 số.',
            'address.required' => 'Địa chỉ là bắt buộc.',
        ]);

        $user = new User();
        $user->account_name = $request->account_name;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('user.index')->with('themMoi', 'Thêm mới người dùng thành công');
    }



    public function capNhat($id)
    { {
            $user = User::find($id);

            if (empty($user)) {
                return redirect()->back()->withErrors(['loiCapNhap' => "Admin khoong ton tai"]);
            }

            return view('user.update', compact('user'));
        }
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $request->validate([
            'account_name' => 'required|string|max:255',
            // 'password' => 'required|string|min:6',
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^0[0-9]{9}$/',
            'address' => 'required|string|max:255',
        ], [
            'account_name.required' => 'Tên tài khoản là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'fullname.required' => 'Họ tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.regex' => 'Số điện thoại phải bắt đầu bằng số 0 và có 10 số.',
            'address.required' => 'Địa chỉ là bắt buộc.',
        ]);

        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Người dùng không tồn tại"]);
        }

        $user->account_name = $request->account_name;
        $user->password = bcrypt($request->password); // Mã hóa mật khẩu trước khi lưu
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->action([UserController::class, 'index'], ['id' => $user->id])->with(['capNhap' => "Cập nhật Admin thành công"]);
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
    public function timKiemUser(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsUser = User::where('email', 'LIKE', '%' . $keyword . '%')
                ->paginate(20);
        } else {
            $dsUser = User::paginate(20); // Nếu không có từ khóa, lấy tất cả user
        }

        return view('user.index', compact('dsUser'));
    }


}
