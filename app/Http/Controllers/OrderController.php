<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
class OrderController extends Controller
{
    
    public function danhSach()
    {
        $dsDonHang = Order::where('role', '!=', '1')
            ->orderBy('role')
            ->paginate(20);

        $tongDonHangTrongThang = Order::whereMonth('order_date', '=', now()->month)->count();
        return view('order.index', compact('dsDonHang', 'tongDonHangTrongThang'));
    }
    public function danhSachTrongThang(Request $request){
        $dsDonHang = Order::whereMonth('order_date','=',now()->month)
            ->orderBy('role')
            ->paginate(20);
        $tongDonHangTrongThang = Order::whereMonth('order_date','=',now()->month)->count();
        return view('order.index', compact('dsDonHang','tongDonHangTrongThang'));
    }
    public function chiTiet(Request $request, $id)
    {
        $donHang = Order::find($id);
        $dsCTDonHang = $donHang->user_order_id;
        $khachHang = User::find($donHang->user_order_id);

        return view('order.detail', compact('donHang', 'dsCTDonHang', 'khachHang'));
    }
    public function capNhatChiTiet($id)
    {
        $donHang = Order::find($id);

        if (empty($donHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        return view('order.update', compact('donHang'));
    }

    public function xuLyCapNhatChiTiet(Request $request, $id)
    {
        $ctDonHang = OrderDetail::find($id);
        $donHang = Order::find($ctDonHang->order_id);

        if (empty($ctDonHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }

        $ctDonHang->totalPrice -= ($ctDonHang->quantity * $ctDonHang->price);
        
        $ctDonHang->quantity = $request->quantity;
        $ctDonHang->price = $request->price;
        $ctDonHang->save();

        $donHang->totalPrice += ($ctDonHang->price * $ctDonHang->quantity);
        $donHang->save();

        return redirect()->action([OrderController::class, 'chiTiet'], ['id' => $ctDonHang->order_id])->with(['capNhap' => "Cập nhật thành công"]);
    }

    public function xoaChiTiet(Request $request, $id)
    {
        $ctDonHang = OrderDetail::find($id);
        $donHang = Order::find($ctDonHang->order_id);

        if (empty($ctDonHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }

        $donHang->totalPrice -= ($ctDonHang->quantity * $ctDonHang->price);
        $donHang->save();
        $ctDonHang->delete();

        return redirect()->action([OrderController::class, 'chiTiet'], ['id' => $ctDonHang->user_order_id])->with(['capNhap' => "Cập nhật thành công"]);
    }

    public function capNhat($id)
    {
        $donHang = Order::find($id);
        
        if (empty($donHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        return view('order.update', compact('donHang'));
    }

    public function xuLyCapNhat(Request $request, $id)
    {
        $donHang = Order::find($id);
        if (empty($donHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        $donHang->shippingAddress = $request->shippingAddress;
        $donHang->phone= $request->phone;
        $donHang->save();

        return redirect()->action([OrderController::class, 'chiTiet'], ['id' => $id])->with(['capNhap' => "Cập nhật thành công"]);
    }
    public function xacNhan(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 1;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSach']);
    }

    public function giaoHang(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 2;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSach']);
    }
    public function hoanThanh(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 3;
        $donHang->role = 1;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSach']);
    }
    public function thanhToan(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->pay = 1;
        $donHang->save();
        return redirect()->action([OrderController::class, 'chiTiet'], ['id' => $id]);
    }
    public function timKiem(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsDonHang = Order::where('order_id', 'LIKE', '%' . $keyword . '%')
                ->paginate(20);
        }
        $tongDonHangTrongThang = Order::whereMonth('created_at', '=', now()->month)->count();
        return view('order.index', compact('dsDonHang', 'tongDonHangTrongThang'));
    }

    // public function huy(Request $request, $id)
    // {
    //     $donHang = Order::find($id);
    //     $donHang = Order::find($id);
    //     $size = Size::find($id);
    //     $color= Color::find($id);
    //     $donHang->role = -1;

    //     $dsCTDonHang = $donHang->size;
    //     $dsCTDonHang = $donHang->colors;
    //     foreach ($dsCTDonHang as $ctDonHang) {
    //         $ctSanPham = OrderDetail::where('order_id', $ctDonHang->order_id)
    //             ->where('price', $ctDonHang->price)
    //             ->where('quantity', $ctDonHang->quantity)
    //             ->first();
    //         $ctSanPham->total += $ctDonHang->total;
    //         $ctSanPham->save();
    //         $sanPham = Products::find($ctDonHang->categories_product_id);
    //         $sanPham->quantity += $ctDonHang->quantity;
    //         $sanPham->save();
    //     }
    //     $donHang->save();
    //     return redirect()->action([OrderController::class, 'danhSach']);
    // }
}
