@extends('master')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Thống kê
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Tổng Doanh Thu Theo Ngày
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ number_format($dailyRevenue, 0, ',', '.') }} VND
                    </p>
                </div>
            </div>


            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Tổng Doanh Thu Theo Tháng
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ number_format($monthlyRevenue, 0, ',', '.') }} VND
                    </p>
                </div>
            </div>
            <!-- Card -->
            <form id="revenueForm" class="mt-4">
                <div class="flex items-center">
                    <label for="selected_date" class="mr-2 text-gray-600">Chọn ngày:</label>
                    <input type="date" id="selected_date" name="selected_date"
                        class="p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Xem
                        doanh thu
                    </button>
                </div>
            </form>
            <!-- Card -->

            <!-- Card -->
            <!-- Đơn Hàng Đã Hủy -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn Hàng Đã Hủy
                    </p>
                    <p class="text-lg font-semibold text-red-700 dark:text-red-200">
                        {{ $cancelledOrders }}
                    </p>
                </div>
            </div>

            <!-- Đơn Hàng Chờ Xác Nhận -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn Hàng Chờ Xác Nhận
                    </p>
                    <p class="text-lg font-semibold text-orange-700 dark:text-orange-200">
                        {{ $pendingOrders }}
                    </p>
                </div>
            </div>

            <!-- Đơn Hàng Đã Xác Nhận -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div
                    class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn Hàng Đã Xác Nhận
                    </p>
                    <p class="text-lg font-semibold text-yellow-700 dark:text-yellow-200">
                        {{ $confirmedOrders }}
                    </p>
                </div>
            </div>

            <!-- Đơn Hàng Đang Giao -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn Hàng Đang Giao
                    </p>
                    <p class="text-lg font-semibold text-blue-700 dark:text-blue-200">
                        {{ $deliveringOrders }}
                    </p>
                </div>
            </div>

            <!-- Đơn Hàng Đã Giao Thành Công -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Đơn Hàng Đã Giao Thành Công
                    </p>
                    <p class="text-lg font-semibold text-green-700 dark:text-green-200">
                        {{ $completedOrders }}
                    </p>
                </div>
            </div>


        </div>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <!-- Doughnut/Pie chart -->
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Thống Kê Trạng Thái Đơn Hàng
                </h4>
                <canvas id="orderStatusPieChart"></canvas>

            </div>
            <!-- Lines chart -->

            <!-- Bars chart -->
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Doanh Thu Theo Tháng
                </h4>
                <canvas id="bar"></canvas>
                <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                    <div class="flex items-center">
                        <!-- <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                        <span>Doanh Thu</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('orderStatusPieChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Đã Hủy', 'Chờ Xác Nhận', 'Đã Xác Nhận', 'Đang Giao', 'Đã Giao'],
                datasets: [{
                    label: 'Số lượng đơn hàng',
                    data: [
            {{ $cancelledOrders }},
            {{$pendingOrders}},
            {{ $confirmedOrders }},
            {{ $deliveringOrders }},
                        {{ $completedOrders }}
                    ],
                    backgroundColor: [
                        '#EF4444',   // Đã Hủy - Màu đỏ
                        '#F59E0B',   // Chờ Xác Nhận - Màu cam
                        '#FCD34D',   // Đã Xác Nhận - Màu vàng
                        '#60A5FA',   // Đang Giao - Màu xanh dương
                        '#10B981'    // Đã Giao - Màu xanh lá
                    ],
                    hoverBackgroundColor: [
                        '#F87171',   // Đã Hủy - Màu đỏ (hover)
                        '#FBBF24',   // Chờ Xác Nhận - Màu cam (hover)
                        '#FDE68A',   // Đã Xác Nhận - Màu vàng (hover)
                        '#93C5FD',   // Đang Giao - Màu xanh dương (hover)
                        '#6EE7B7'    // Đã Giao - Màu xanh lá (hover)
                    ]
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                    labels: {
                        fontColor: 'rgb(46, 68, 78)'
                    }
                }
            }
        });
    });
</script>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('bar').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'Số Tiền',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: @json($revenues),
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Số Tiền (in VND)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value);
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Tháng'
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = 'Revenue: ';
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection