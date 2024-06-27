
@extends('master')


@section('content')

<main class="h-full overflow-y-auto">
  
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            </h2>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
              <!-- Card infor -->
                <div class="p-3 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="flex items-center mb-2">
                        <svg class="w-12 h-8 mr-2 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-0.715 -0.715 20 20" >
                          <g id="business-card--name-card-business-information-money-payment"><path id="Vector" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M16.580357142857142 3.316071428571429h-14.590714285714286c-0.7325666035714287 0 -1.3264285714285715 0.5938686000000001 -1.3264285714285715 1.3264285714285715v9.285c0 0.7325865 0.5938619678571428 1.3264285714285715 1.3264285714285715 1.3264285714285715h14.590714285714286c0.7325865 0 1.3264285714285715 -0.5938420714285715 1.3264285714285715 -1.3264285714285715v-9.285c0 -0.7325599714285714 -0.5938420714285715 -1.3264285714285715 -1.3264285714285715 -1.3264285714285715Z" stroke-width="1.43"></path><path id="Vector_2" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M5.968928571428572 11.274642857142858C7.067781792857144 11.274642857142858 7.958571428571429 10.383853221428572 7.958571428571429 9.285s-0.8907896357142858 -1.9896428571428573 -1.9896428571428573 -1.9896428571428573S3.9792857142857145 8.186146778571429 3.9792857142857145 9.285s0.8907896357142858 1.9896428571428573 1.9896428571428573 1.9896428571428573Z" stroke-width="1.43"></path><path id="Vector_3" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M11.274642857142858 7.295357142857143H14.590714285714286" stroke-width="1.43"></path><path id="Vector_4" stroke="#000" stroke-linecap="round" stroke-linejoin="round" d="M11.274642857142858 11.274642857142858H14.590714285714286" stroke-width="1.43"></path></g>
                        </svg>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $loaiSP->ten }}</p>
                    </div>
                </div>  
              
            </div>
            <div class="update">
              <button class="update-button" > <a href="{{ route('types.update',['id'=>$loaiSP->id]) }}"> Cập nhật thông tin </a> </button>||
              <button class="delete-button" > <a href="{{ route('types.delete',['id'=>$loaiSP->id]) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa </a> </button>
            </div>
            
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                
            </h2>
            <!-- New Table -->
           
            <span style="display: inline-block; height: 15px;"></span>
            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-10">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr class="text-center text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                      <th class="px-4 py-3">ID</th>
                      <th class="px-4 py-3">TÊN</th>
                      <th class="px-4 py-3">GIÁ</th>
                      <th class="px-4 py-3">NHÀ CUNG CẤP</th>
                      <th class="px-4 py-3">TRẠNG THÁI</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($dsSanPham as $sanPham)
                    <tr class="text-center text-gray-700 dark:text-gray-400" onclick="window.location.href = '{{ route('products.detail',['id'=>$sanPham->id]) }}';">
                      <td class="px-4 py-3 text-sm">
                        {{$sanPham->id}}
                      </td>
                      <td class="px-4 py-3">                      
                          <div class="flex items-center text-sm">
                            <div>
                              <p class="font-semibold">{{$sanPham->ten}}</p>
                              <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                            </div>
                          </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$sanPham->gia_ban }}
                      </td>
                      <td class="px-4 py-3 text-sm">
                        {{$sanPham->nha_cung_cap->ten}}
                      </td>
                      <td class="px-4 py-3 text-xs"> 
                        @if($sanPham->trang_thai == 1 )
                        {{-- Còn hàng --}}
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                              In Stock
                            </span>
                        @elseif($sanPham->trang_thai == 2)
                        {{-- Hết hàng --}}
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                              Sold
                            </span>
                        @elseif($sanPham->trang_thai == 0)
                        {{-- Ngừng sản xuất --}}
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                              Discontinued
                            </span>
                        @endif            
                        
                      </td>
                      
                    </tr>      
                    @endforeach      
                  </tbody>
                </table>
                <div class="mt-4">
                  {{ $dsSanPham->links() }} <!-- Hiển thị thanh phân trang -->
                </div> 
                <tbody>

                </tbody>
              </div>
              
            </div>

            
            
          </div>
  </main>
@endsection
