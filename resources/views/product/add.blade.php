
<link href="http://127.0.0.1:8000/bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet">
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en" class="theme-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Windmill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/tailwind.output.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    
    
  <style type="text/css">/* Chart.js */
  @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body>
   
      <!-- Desktop sidebar -->
      @extends('master')

    @section('content')
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
   
      <div style="position: absolute; left: 260px; top: 90px;"
    onclick="window.location.href = '{{ route('product.index') }}';">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM SẢN PHẨM MỚI </h1>
</div>

<form class="row g-3" method="POST" action="{{ route('product.start-add') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <!-- Tên sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" id="name" >
            </div>
        </div>

        <!-- Giá bán sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="price" class="form-label">Giá bán sản phẩm</label>
                <input type="text" name="price" class="form-control" id="price">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <label for="selling_price" class="form-label">Giá Nhập Sản Phẩm</label>
                <input type="text" name="selling_price" class="form-control" id="selling_price">
            </div>
        </div>

        <!-- Hình ảnh sản phẩm -->
        <div class="row">
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <label for="images" class="form-label">Thêm Hình Ảnh</label>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
        </div>
        <div class="row" id="image-preview" style="margin-top: 20px;"></div>
        <!-- Loại sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="categories_product_id" class="form-label">Loại sản phẩm</label>
                <select name="categories_product_id" class="form-select" aria-label="Default select example" id="categories_product_id">
                    <option selected>Chọn loại sản phẩm</option>
                    @foreach($dsLoaiSP as $loaiSP)
                        <option value="{{ $loaiSP->id }}">{{ $loaiSP->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Nhà cung cấp -->
        <div class="row">
            <div class="col-md-8">
                <label for="suppliers_id" class="form-label">Nhà cung cấp</label>
                <select name="suppliers_id" class="form-select" aria-label="Default select example" id="suppliers_id">
                    <option selected>Chọn nhà cung cấp</option>
                    @foreach($dsNhaCungCap as $nhaCungCap)
                        <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Size sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="size_id" class="form-label">Size sản phẩm</label>
                <select name="size_id" class="form-select" aria-label="Default select example" id="size_id">
                    <option selected>Chọn size sản phẩm</option>
                    @foreach($dsSize as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Màu sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="color_id" class="form-label">Màu sản phẩm</label>
                <select name="color_id" class="form-select" aria-label="Default select example" id="color_id">
                    <option selected>Chọn màu sản phẩm</option>
                    @foreach($dsMauSac as $mauSac)
                        <option value="{{ $mauSac->id }}">{{ $mauSac->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Khuyến mãi -->
       

        <!-- Mô tả sản phẩm -->
        <div class="row">
            <div class="col-md-8">
                <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                <input type="text" name="mo_ta" class="form-control" id="mo_ta">
            </div>
        </div>

        <!-- Nút Lưu -->
        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Thêm Mới</button>
            </div>
        </div>
    </div>
    
</form>

</main>     
    </div>
    </div>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer=""></script>
    
    <script src="http://127.0.0.1:8000/assets/js/charts-lines.js" ></script>
    <script src="http://127.0.0.1:8000/assets/js/charts-pie.js" ></script>
    <script src="http://127.0.0.1:8000/assets/js/init-alpine.js" ></script>
    <script src="http://127.0.0.1:8000/assets/js/charts-bars.js" ></script>
    <script src="http://127.0.0.1:8000/assets/js/focus-trap.js" ></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>
</body></html>
@endsection

