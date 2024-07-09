@extends('master')

@section('content')
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Danh Sách Loại Sản Phẩm
    </h2>

    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
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
            Thêm Mới Loại Sản Phẩm
          </p>
        </div>
      </div>
    </div>

    <form action="{{ route('categories.search') }}" method="GET">
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
            type="text" placeholder="Tìm kiếm theo tên loại sản phẩm" aria-label="Search" name="keyword">
        </div>
        <button type="submit"
          class="ml-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Search</button>
      </div>
    </form>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-center text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">ID</th>
              <th class="px-4 py-3">Tên Loại Sản Phẩm</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($dsCategories as $categories)
            <tr class="text-center text-gray-700 dark:text-gray-400"
              onclick="window.location.href = '{{ route('categories.detail', ['id' => $categories->id]) }}';">
              <td class="px-4 py-3 text-sm">
                {{$categories->id}}
              </td>
              <td class="px-4 py-3">
                <div class=" items-center text-sm">
                  <div>
                    <p class="font-semibold">{{$categories->name}}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $dsCategories->links() }}
      </div>
    </div>
  </div>
</main>
@endsection
