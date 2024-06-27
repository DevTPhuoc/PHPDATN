<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    public function index()
    { 
        {
            $dsSuppliers = Suppliers::all();
            return view('suppliers.index',compact('dsSuppliers'));
        }
    }
    public function themMoi()
    { 
        {
            $dsSuppliers = Suppliers::all();
            return view('suppliers.add',compact('dsSuppliers'));
        }
    }
    public function xuLyThemMoi(Request $request)
    { 
        {
            $suppliers = new Suppliers();
            $suppliers->id = $request->id;
            $suppliers->name = $request->name;
            $suppliers->email = $request->email;
            $suppliers->phone = $request->phone;
            $suppliers->address = $request->address;
            $suppliers->status = $request->status;
            $suppliers->save();
            return redirect()->route('index')->with(['themMoi' => "Thêm mới thành công"]);
        }
    }
    public function capNhat($id)
    { {
            $suppliers = Suppliers::find($id);

            if (empty($suppliers)) {
                return redirect()->back()->withErrors(['loiCapNhap' => "Nhà Cung Cấp Không Tồn Tại"]);
            }

            return view('suppliers.update', compact('suppliers'));
        }
    }
    public function xuLyCapNhat(Request $request, $id)
    {
        $suppliers = Suppliers::find($id);
        if (empty($suppliers)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Sản phẩm không tồn tại"]);
        }
        $suppliers->id = $request->id;
        $suppliers->name = $request->name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->address = $request->address;
        $suppliers->status = $request->status;
        $suppliers->save();
        return redirect()->action([SuppliersController::class, 'index'], ['id' => $suppliers->id])->with(['capNhap' => "Cập nhật Admin thanh cong"]);
    }

    public function xoa(Request $request, $id)
    {

        $suppliers = Suppliers::find($id);
        Suppliers::where('id', $suppliers->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $suppliers->delete();
        return redirect()->route('index')->with(['xoa' => "Xóa nhà cung câpt thành công"]);
    }

}
