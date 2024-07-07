@extends('master')

@section('content')


<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">


    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">


    </div>

    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
      onclick="window.location.href = '{{ route('user.add') }}';">
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
          Thêm Mới User
        </p>

      </div>
    </div>
    
    <!-- New Table -->
    <form action="{{ route('search.user') }}" method="GET">
    <div class="flex justify-center flex-1 lg:mr-32 mb-10">
        <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input
                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                type="text" placeholder="Tìm Kiếm Theo Email User" aria-label="Search" name="keyword">
        </div>
        <button type="submit"
            class="ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Search</button>
    </div>
</form>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Họ Và Tên</th>
              <th class="px-4 py-3">Ngày Tạo</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Số Điện Thoại</th>
              <th class="px-4 py-3">Địa Chỉ</th>
              <th class="px-4 py-3">Trạng Thái</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($dsUser as $user)

        <tr class="text-gray-700 dark:text-gray-400"
          onclick="window.location.href = '{{ route('user.update', ['id' => $user->id]) }}';">
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
            <p class="font-semibold"></p>
            <p class="text-xs text-gray-600 dark:text-gray-400">
              {{$user->id}}
            </p>
            </div>
          </div>
          </td>
          <td class="px-4 py-3 text-sm">
          {{$user->fullname}}
          </td>

          <td class="px-4 py-3 text-sm">
          {{$user->created_at}}
          </td>
          <td class="px-4 py-3 text-sm">
          {{$user->email}}
          </td>
          <td class="px-4 py-3 text-sm">
          {{$user->phone}}
          </td>
          <td class="px-4 py-3 text-sm">
          {{$user->address}}
          </td>
          <td class="px-4 py-3 text-xs">
          <span
            class="text-md  px-2 py-1 font-semibold{{ $user->role == 1 ? 'leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100' : 'leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100' }}">
            {{ $user->role == 1 ? 'Hoạt Động' : 'Không Hoạt Động' }}
          </span>
          </td>
          <td class="px-4 py-3 text-sm">
          <form action="{{ route('delete-detailu', ['id' => $user->id]) }}">

            <button type="submit" class="text-red-500 hover:text-red-700">
            Delete
            </button>
          </form>
          </td>
        </tr>



      @endforeach 



            <tr class="text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">



                </div>
      </div>



    </div>
</main>


<body>
  @endsection