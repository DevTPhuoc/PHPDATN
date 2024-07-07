@extends('master')


@section('content')
<div style="position: absolute; left: 260px; top: 90px;" onclick="window.location.href = '{{ route('order.index') }}';">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
    class="w-8 h-8">
    <path stroke-linecap="round" stroke-linejoin="round"
      d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
  </svg>

</div>

<main class="h-full overflow-y-auto">

  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Thông tin đơn Hàng
    </h2>

    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
      <!-- Card infor -->
      <div class="p-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center mb-2">
          <h2></h2>
          <svg class="w-12 h-8 mr-2 text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>

          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{$khachHang->fullname}}</p>
        </div>
        <div class="flex items-center mb-2">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-12 h-8 mr-2 text-black dark:text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
          </svg>

          <p class="text-lg text-gray-600 dark:text-gray-400">Email Khách Hàng: {{ $khachHang->email }}</p>
        </div>

        <div class="flex items-center mb-2">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-12 h-8 mr-2 text-black dark:text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
          </svg>

          <p class="text-lg text-gray-600 dark:text-gray-400">Số Điện Thoại: {{ $khachHang->phone }}</p>
        </div>

        <div class="flex items-center mb-2">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-12 h-8 mr-2 text-black dark:text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
          </svg>

          <p class="text-lg text-gray-600 dark:text-gray-400">Địa Chỉ Nhận Hàng: {{ $khachHang->address}}</p>
        </div>


      </div>

      <!-- Card infor -->
      <div class="p-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <div class="flex items-center mb-2">
          <svg class="w-12 h-8 mr-2 text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14" height="14" width="14">
            <g id="shipment-remove--shipping-parcel-shipment-remove-subtract">
              <path id="Vector" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M7 0.5v4"
                stroke-width="1"></path>
              <path id="Vector_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M0.5 4.5h13v8c0 0.2652 -0.1054 0.5196 -0.2929 0.7071s-0.4419 0.2929 -0.7071 0.2929h-11c-0.26522 0 -0.51957 -0.1054 -0.707107 -0.2929C0.605357 13.0196 0.5 12.7652 0.5 12.5v-8Z"
                stroke-width="1"></path>
              <path id="Vector_3" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M0.5 4.5 2 1.61c0.16171 -0.32573 0.40917 -0.6012 0.71576 -0.796785C3.02235 0.617632 3.37646 0.509344 3.74 0.5h6.52c0.3721 0.000197 0.7367 0.104188 1.053 0.300279 0.3162 0.196092 0.5714 0.476511 0.737 0.809721L13.5 4.5"
                stroke-width="1"></path>
              <path id="Vector_4" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M9.5 9h-5"
                stroke-width="1"></path>
            </g>
          </svg>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> Mã Đơn Hàng: {{ $donHang->order_code }}</p>
        </div>

        <div class="flex items-center mb-2">
          <svg class="w-12 h-8 mr-2 text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14" height="14" width="14">
            <g id="blank-calendar--blank-calendar-date-day-month-empty">
              <path id="Vector" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M1.5 2c-0.26522 0 -0.51957 0.10536 -0.707107 0.29289C0.605357 2.48043 0.5 2.73478 0.5 3v9.5c0 0.2652 0.105357 0.5196 0.292893 0.7071 0.187537 0.1875 0.441887 0.2929 0.707107 0.2929h11c0.2652 0 0.5196 -0.1054 0.7071 -0.2929s0.2929 -0.4419 0.2929 -0.7071V3c0 -0.26522 -0.1054 -0.51957 -0.2929 -0.70711C13.0196 2.10536 12.7652 2 12.5 2h-2"
                stroke-width="1"></path>
              <path id="Vector_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M0.5 5.5h13"
                stroke-width="1"></path>
              <path id="Vector_3" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M3.5 0.5v3"
                stroke-width="1"></path>
              <path id="Vector_4" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M10.5 0.5v3"
                stroke-width="1"></path>
              <path id="Vector_5" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M3.5 2h5"
                stroke-width="1"></path>
            </g>
          </svg>
          <p class="text-lg text-gray-600 dark:text-gray-400">Ngày Đặt: {{ $donHang->order_date }}</p>
        </div>

        <div class="flex items-center mb-2">
          <svg class="w-12 h-8 mr-2 text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14" height="14" width="14">
            <g id="bill-2--currency-billing-payment-finance-cash-bill-money-accounting">
              <path id="Vector" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M12.5 2.5h-11c-0.552285 0 -1 0.44772 -1 1v7c0 0.5523 0.447715 1 1 1h11c0.5523 0 1 -0.4477 1 -1v-7c0 -0.55228 -0.4477 -1 -1 -1Z"
                stroke-width="1"></path>
              <path id="Vector_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M7 9c1.10457 0 2 -0.89543 2 -2s-0.89543 -2 -2 -2 -2 0.89543 -2 2 0.89543 2 2 2Z" stroke-width="1">
              </path>
              <g id="Group 8">
                <path id="Ellipse 1" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                  d="M2.7749 7.25c-0.13807 0 -0.25 -0.11193 -0.25 -0.25s0.11193 -0.25 0.25 -0.25" stroke-width="1">
                </path>
                <path id="Ellipse 2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                  d="M2.7749 7.25c0.13807 0 0.25 -0.11193 0.25 -0.25s-0.11193 -0.25 -0.25 -0.25" stroke-width="1">
                </path>
              </g>
              <g id="Group 9">
                <path id="Ellipse 1_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                  d="M11.2251 7.25c-0.1381 0 -0.25 -0.11193 -0.25 -0.25s0.1119 -0.25 0.25 -0.25" stroke-width="1">
                </path>
                <path id="Ellipse 2_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                  d="M11.2251 7.25c0.1381 0 0.25 -0.11193 0.25 -0.25s-0.1119 -0.25 -0.25 -0.25" stroke-width="1"></path>
              </g>
            </g>
          </svg>
          <p class="text-lg text-gray-600 dark:text-gray-400">Tổng Tiền: {{ number_format($tongTien, 0, ',', '.') }} VND
          </p>
        </div>


        <div class="flex items-center mb-2">
          <svg class="w-12 h-8 mr-2 text-black dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 14 14" height="14" width="14">
            <g id="wallet--money-payment-finance-wallet">
              <path id="Vector" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M12 10.5v2c0 0.2652 -0.1054 0.5196 -0.2929 0.7071S11.2652 13.5 11 13.5H1.5c-0.26522 0 -0.51957 -0.1054 -0.707107 -0.2929C0.605357 13.0196 0.5 12.7652 0.5 12.5V5c0 -1.65685 1.34315 -3 3 -3H10v2.5"
                stroke-width="1"></path>
              <path id="Vector_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M13 7.5H9.5c-0.27614 0 -0.5 0.22386 -0.5 0.5v2c0 0.2761 0.22386 0.5 0.5 0.5H13c0.2761 0 0.5 -0.2239 0.5 -0.5V8c0 -0.27614 -0.2239 -0.5 -0.5 -0.5Z"
                stroke-width="1"></path>
              <path id="Vector_3" stroke="#000" stroke-linecap="round" stroke-linejoin="round"
                d="M12 7.5v-2c0 -0.26522 -0.1054 -0.51957 -0.2929 -0.70711C11.5196 4.60536 11.2652 4.5 11 4.5H3.5"
                stroke-width="1"></path>
            </g>
          </svg>
          <p class="text-lg text-gray-600 dark:text-gray-400">Tình trạng thanh toán:
            {{ $donHang->pay == 1 ? 'Đã thanh toán' : 'Chưa thanh toán' }}</p>
        </div>

      </div>
    </div>
    <div style="display: flex; align-items: center; justify-content: space-between;margin-bottom: 50px;">
      <div class="update-product">
        <button class="update-button">
          <a href="{{ route('order.update', ['id' => $donHang->id]) }}">Chỉnh Sửa Đơn Hàng</a>
        </button>
      </div>
      <div class="confirm-product">
        <button class="confirm-button">
          <a href="{{ route('order.pay', ['id' => $donHang->id]) }}">Thanh toán thành công</a>
        </button>
      </div>
    </div>

    <!-- New Table -->

    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap item-center">
          <thead>
            <tr
              class="text-center text-xs font-semibold tracking-wide  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3 ">Sản phẩm</th>
              <th class="px-4 py-3 ">Giá</th>
              <th class="px-4 py-3">Số lượng</th>
              <th class="px-4 py-3">Tổng Tiền</th>
              <th></th>
            </tr>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($dsCTDonHang as $item)
        <tr class="text-center text-gray-700 dark:text-gray-400">
          <td class="px-4 py-3 text-sm">
          {{ $item->product->name }}
          </td>
          <td class="px-4 py-3">
          {{ $item->price }}
          </td>
          <td class="px-4 py-3">
          {{ $item->quantity }}
          </td>
          <td class="px-4 py-3">
          {{ $item->price * $item->quantity }}
          </td>
        </tr>
      @endforeach
        </table>
      </div>

    </div>
    <div style="margin-top: 50px;">
      @if ($donHang->role == 0 || $donHang->role == -1)
      <button type="button" class="confirm-button">
      <a href="{{ route('order.confirm', ['id' => $donHang->id]) }}" class="nav-link active">Xác nhận đặt hàng</a>
      </button> ||
    @elseif ($donHang->role == 1)
      <button type="button" class="confirm-delivery-button">
      <a href="{{ route('order.confirm-delivery', ['id' => $donHang->id]) }}" class="nav-link active">Xác nhận giao
        hàng</a>
      </button> ||
    @elseif ($donHang->role == 2)
      <button type="button" class="confirm-button">
      <a href="{{ route('order.confirm-success', ['id' => $donHang->id]) }}" class="nav-link active">Xác nhận đã giao đơn</a>
      </button> ||
    @endif
    @if  ($donHang->role != -1 && $donHang->role != 2&& $donHang->role !=3)
        <button type="button" class="delete-button">
            <a href="{{ route('order.cancel', ['id' => $donHang->id]) }}" class="nav-link active">Hủy Đơn</a>
        </button>
    @endif
    </div>

  </div>
</main>
@endsection