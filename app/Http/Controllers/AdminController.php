<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    { {
            $dsAdmin = Admin::all();
            return view("Admin.index", compact('dsAdmin'));

        }
    }
    public function themMoi()
    { {

            $dsAdmin = Admin::all();
            return view('admin.add', compact('dsAdmin'));
        }
    }

    public function xuLyThemMoi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^0[0-9]{9}$/']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Thêm mới admin
        $admin = new Admin();
        $admin->account_name = $request->account_name;
        $admin->password = $request->password;
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->save();

        return redirect()->route('Admin.index')->with(['themMoi' => "Thêm mới thành công"]);
    }
    public function capNhat($id)
    { {
            $admin = Admin::find($id);

            if (empty($admin)) {
                return redirect()->back()->withErrors(['loiCapNhap' => "Admin khoong ton tai"]);
            }

            return view('admin.update', compact('admin'));
        }
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^0[0-9]{9}$/']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tìm admin
        $admin = Admin::find($id);

        if (empty($admin)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Admin không tồn tại"]);
        }

        // Cập nhật thông tin admin
        $admin->account_name = $request->account_name;
        $admin->password = $request->password;
        $admin->fullname = $request->fullname;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->save();

        return redirect()->action([AdminController::class, 'index'], ['id' => $admin->id])->with(['capNhap' => "Cập nhật Admin thành công"]);
    }

    public function xoa(Request $request, $id)
    {
        $admin = Admin::find($id);

        $admin = Admin::find($id);

        if (!$admin) {
            return redirect()->route('Admin.index')->with(['error' => "Admin không tồn tại"]);
        }

        $admin->delete();

        return redirect()->route('Admin.index')->with(['xoa' => "Xóa Admin thành công"]);
    }
    public function timKiemad(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsAdmin = Admin::where('email', 'LIKE', '%' . $keyword . '%')
                ->paginate(20);
        } else {
            $dsAdmin = Admin::paginate(20); // Nếu không có từ khóa, lấy tất cả admin
        }

        return view('admin.index', compact('dsAdmin'));
    }

}
