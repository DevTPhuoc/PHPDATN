<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Carbon\Carbon;

class OrderController extends Controller
{


    public function danhSach()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Đếm tổng số đơn hàng trong tháng hiện tại
        $tongDonHang = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        // Lấy danh sách đơn hàng trong tháng hiện tại và phân trang
        $dsDonHang = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->paginate(20);

        // Truyền biến này đến view
        return view('order.index', compact('dsDonHang', 'tongDonHang'));
    }
    public function danhSachTrongThang(Request $request)
    {
        $tongDonHang = Order::count();

        // Lấy danh sách đơn hàng và phân trang
        $dsDonHang = Order::orderBy('role')
            ->paginate(20);

        // Truyền biến này đến view
        return view('order.index', compact('dsDonHang', 'tongDonHang'));
    }
    public function chiTiet(Request $request, $id)
    {
        $donHang = Order::with('orderDetails.product')->find($id);

        if (!$donHang) {
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        // Lấy danh sách chi tiết đơn hàng
        $dsCTDonHang = $donHang->orderDetails;

        // Lấy thông tin khách hàng
        $khachHang = User::find($donHang->user_order_id);

        // Tính tổng số lượng
        $tongSoLuong = $dsCTDonHang->sum('quantity');
        // Tính tổng tiền
        $tongTien = $dsCTDonHang->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        return view('order.detail', compact('donHang', 'dsCTDonHang', 'khachHang', 'tongSoLuong', 'tongTien'));
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
        $donHang = Order::find($ctDonHang->product_order_detail_id);

        if (empty($ctDonHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "không tồn tại"]);
        }
        $donHang->totalPrice -= ($ctDonHang->quantity * $ctDonHang->price);

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
            return redirect()->back()->withErrors(['loiCapNhap' => "Đơn hàng không tồn tại"]);
        }

        return view('order.update', compact('donHang'));
    }


    public function xuLyCapNhat(Request $request, $id)
    {
        $donHang = Order::find($id);

        if (empty($donHang)) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Đơn hàng không tồn tại"]);
        }

        // Lấy thông tin người dùng từ đơn hàng
        $user = $donHang->user;

        if (!$user) {
            return redirect()->back()->withErrors(['loiCapNhap' => "Người dùng không tồn tại"]);
        }

        // Cập nhật thông tin người dùng
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->action([OrderController::class, 'chiTiet'], ['id' => $id])->with(['capNhap' => "Cập nhật thành công"]);
    }

    public function xacNhan(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 1;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSachTrongThang']);
    }

    public function giaoHang(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 2;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSachTrongThang']);
    }
    public function hoanThanh(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->role = 3;
        $donHang->save();
        return redirect()->action([OrderController::class, 'danhSachTrongThang']);
    }
    public function thanhToan(Request $request, $id)
    {
        $donHang = Order::find($id);
        $donHang->pay = 1; // Đánh dấu đơn hàng đã thanh toán
        $donHang->save();

        return redirect()->route('order.index'); // Chuyển về trang danh sách đơn hàng
    }
    public function timKiem(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $dsDonHang = Order::where('order_code', 'LIKE', '%' . $keyword . '%')
                ->paginate(20);
        } else {
            $dsDonHang = Order::paginate(20); // Nếu không có từ khóa, lấy tất cả đơn hàng
        }

        return view('order.index', compact('dsDonHang'));
    }


    public function huy(Request $request, $id)
    {
        $donHang = Order::find($id);

        if (!$donHang) {
            // Xử lý khi không tìm thấy đơn hàng
            return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
        }

        // Lưu trạng thái hủy đơn hàng
        $donHang->role = -1;
        $donHang->save();

        // Lấy danh sách chi tiết đơn hàng
        $dsCTDonHang = $donHang->orderDetails;

        // Lặp qua từng chi tiết đơn hàng để cập nhật số lượng sản phẩm và tổng tiền
        foreach ($dsCTDonHang as $ctDonHang) {
            // Tăng số lượng sản phẩm lại
            $sanPham = Products::find($ctDonHang->product_order_detail_id);
            if ($sanPham) {
                $sanPham->quantity += $ctDonHang->quantity;
                $sanPham->save();
            }

            // Cập nhật tổng tiền của chi tiết sản phẩm
            $ctDonHang->total += $ctDonHang->total;
            $ctDonHang->save();
        }

        return redirect()->route('order.index')->with('success', 'Đã hủy đơn hàng thành công.');
    }
}
