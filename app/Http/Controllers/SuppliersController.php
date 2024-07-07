<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class SuppliersController extends Controller
{
    public function index()
    {
        {
            $dsSuppliers = Suppliers::all();
            return view('suppliers.index',compact('dsSuppliers'));

        }
    }
    // public function index()
    // { 
    //     {
    //         $dsSuppliers = Suppliers::all();
    //         return view('suppliers.index');
    //     }
    // }
    public function themMoi()
    { 
        {
            $dsSuppliers = Suppliers::all();
            return view('suppliers.add',compact('dsSuppliers'));
        }
    }
    public function xuLyThemMoi(Request $request)
    { 
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^0\d{9}$/',
            'address' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:10',
        ]);
    
        // Xử lý lưu nhà cung cấp vào database
        $suppliers = new Suppliers();
        $suppliers->name = $request->name;
        $suppliers->email = $request->email;
        $suppliers->phone = $request->phone;
        $suppliers->address = $request->address;
        $suppliers->status = $request->status;
        $suppliers->save();
    
        return redirect()->route('suppliers.index')->with(['themMoi' => "Thêm mới thành công"]);
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
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('suppliers')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('suppliers')->ignore($id),
            ],
            'phone' => ['required', 'regex:/^0[0-9]{9}$/'],
            'address' => 'required',
            'status' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên nhà cung cấp.',
            'name.unique' => 'Tên nhà cung cấp đã tồn tại trong hệ thống.',
            'email.required' => 'Vui lòng nhập địa chỉ Email.',
            'email.email' => 'Địa chỉ Email không hợp lệ.',
            'email.unique' => 'Địa chỉ Email đã tồn tại trong hệ thống.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'status.required' => 'Vui lòng nhập trạng thái.',
        ]);
    
        // If validation fails, return back with errors and input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the supplier to update
        $supplier = Suppliers::find($id);
    
        if (empty($supplier)) {
            return redirect()->back()->withErrors(['error' => "Nhà cung cấp không tồn tại"]);
        }
    
        // Update supplier information
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->status = $request->status;
        $supplier->save();
    
        return redirect()->route('suppliers.index')->with(['capNhap' => "Cập nhật thành công"]);
    }
    


    public function xoa(Request $request, $id)
    {

        $suppliers = Suppliers::find($id);
        Suppliers::where('id', $suppliers->id)->delete();  //Xóa chi tiết sản phẩm liên quan         
        $suppliers->delete();
        return redirect()->route('suppliers.index')->with(['xoa' => "Xóa nhà cung câpt thành công"]);
    }
    public function timKiemNCC(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsSuppliers = Suppliers::where('name', 'LIKE', '%' . $keyword . '%')
                ->paginate(20);
        } else {
            $dsSuppliers = Suppliers::paginate(20); // Nếu không có từ khóa, lấy tất cả nhà cung cấp
        }
    
        return view('suppliers.index', compact('dsSuppliers'));
    }


}
