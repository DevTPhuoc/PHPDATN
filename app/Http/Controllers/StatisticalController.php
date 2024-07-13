<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    public function index(Request $request)
    {
        //Mặc định là ngày hôm nay nếu k có ngày được chọn 
        $selectedDate = $request->query('selected_date', Carbon::today()->toDateString());

       // Chuyển đổi ngày được chọn sang đối tượng Carbon để thực hiện truy vấn
        $selectedDateCarbon = Carbon::parse($selectedDate);
        if ($selectedDateCarbon->isFuture()) {
            return back()->with('error', 'Không thể chọn ngày lớn hơn ngày hiện tại. Vui lòng chọn lại.');
        }

        // Tổng doanh thu theo ngày đã chọn
        $dailyRevenue = Order::whereDate('order_date', $selectedDateCarbon)
            ->sum('totalPrice');

        // Tổng doanh thu theo tháng của tháng của ngày đã chọn
        $monthlyRevenue = Order::whereYear('order_date', $selectedDateCarbon->year)
            ->whereMonth('order_date', $selectedDateCarbon->month)
            ->sum('totalPrice');

        // Đếm số lượng đơn hàng theo trạng thái
        $ordersCount = Order::selectRaw('role, count(*) as total')
            ->whereDate('order_date', $selectedDateCarbon)
            ->groupBy('role')
            ->get();
        $cancelledOrders = $ordersCount->where('role', '-1')->first()->total ?? 0;
        $pendingOrders = $ordersCount->where('role', '0')->first()->total ?? 0;
        $confirmedOrders = $ordersCount->where('role', '1')->first()->total ?? 0;
        $deliveringOrders = $ordersCount->where('role', '2')->first()->total ?? 0;
        $completedOrders = $ordersCount->where('role', '3')->first()->total ?? 0;

        // Lấy doanh thu theo tháng của năm hiện tại
        $monthlyRevenues = Order::selectRaw('MONTH(order_date) as month, SUM(totalPrice) as revenue')
            ->whereYear('order_date', Carbon::now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = $monthlyRevenues->pluck('month')->toArray();
        $revenues = $monthlyRevenues->pluck('revenue')->toArray();

       
        return view(
            'statistical.index',
            compact(
                'selectedDate',//Mặc định là ngày hôm nay nếu k có ngày được chọn 
                'dailyRevenue',
                'monthlyRevenue',
                'cancelledOrders',
                'pendingOrders',
                'confirmedOrders',
                'deliveringOrders',
                'completedOrders',
                'months',
                'revenues'
            )
        );
    }
}
