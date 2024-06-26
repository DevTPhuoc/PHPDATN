@extends('master')

@section('content')


<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">


    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">


    </div>

    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      onclick="window.location.href = '{{ route('categories.add') }}';">
      <div class="p-3 mr-4 text-orange-500  rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" height="50" width="50">
          <g id="add-circle--button-remove-cross-add-buttons-plus-circle-+-mathematics-math">
            <path id="Vector" stroke="#06f08c" stroke-linecap="round" stroke-linejoin="round"
              d="M7 13.5c3.5899 0 6.5 -2.9101 6.5 -6.5C13.5 3.41015 10.5899 0.5 7 0.5 3.41015 0.5 0.5 3.41015 0.5 7c0 3.5899 2.91015 6.5 6.5 6.5Z"
              stroke-width="1"></path>
            <path id="Vector_2" stroke="#06f08c" stroke-linecap="round" stroke-linejoin="round" d="M7 4v6"
              stroke-width="1"></path>
            <path id="Vector_3" stroke="#06f08c" stroke-linecap="round" stroke-linejoin="round" d="M4 7h6"
              stroke-width="1"></path>
          </g>
        </svg>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
          Add new product
        </p>

      </div>
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Tên Đăng Nhập</th>
              <th class="px-4 py-3">Mật Khẩu</th>
              <th class="px-4 py-3">Ngày Tạo</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Trạng Thái</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="text-gray-700 dark:text-gray-400"
              onclick="window.location.href = ;">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt="" loading="lazy">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">Hans Burger</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      10x Developer
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                $ 863.45
              </td>
              <td class="px-4 py-3 text-xs">
                dantuncute
                </span>
              </td>
              <td class="px-4 py-3 text-sm">
                6/10/2020
              </td>
              <td class="px-4 py-3 text-sm">
                chochutdi227@gmail.com
              </td>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                  Không Hoạt Động
                </span>
              </td>
            </tr>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;facepad=3&amp;fit=facearea&amp;s=707b9c33066bf8808c934c8ab394dff6"
                      alt="" loading="lazy">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">Jolina Angelie</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Unemployed
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                Tuan
              </td>
              <td class="px-4 py-3 text-sm">
                acb123
              </td>
              <td class="px-4 py-3 text-sm">
                6/10/2020
              </td>
              <td class="px-4 py-3 text-sm">
                tuankupi@gmail.com
              </td>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                  Pending
                </span>
              </td>
            </tr>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <!-- Avatar with inset shadow -->
                  <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="object-cover w-full h-full rounded-full"
                      src="https://images.unsplash.com/photo-1551069613-1904dbdcda11?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                      alt="" loading="lazy">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                  </div>
                  <div>
                    <p class="font-semibold">Sarah Curry</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                      Designer
                    </p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">
                $ 86.00
              </td>
              <td class="px-4 py-3 text-sm">
                phuocngu
              </td>
              <td class="px-4 py-3 text-sm">
                6/10/2020
              </td>

              <td class="px-4 py-3 text-sm">
                phuoc123@gmail.com
              </td>
              <td class="px-4 py-3 text-xs">
                <span
                  class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                  Hoạt Động
                </span>
              </td>
            </tr>

            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">



                </div>
      </div>



    </div>
</main>


<body>
  @endsection