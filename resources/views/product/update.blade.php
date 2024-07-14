
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
  @extends('master')

@section('content')

<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    </h2>
    <div style="position: absolute; left: 260px; top: 90px;"
    onclick="window.location.href = '{{ route('product.detail', ['id' => $product->id]) }}';">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-8 h-8">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
</div>
<h1 style="font-size: 36px; margin-top: 50px;">CẬP NHẬT</h1>
<form class="row g-3" method="POST" action="{{ route('product.start-update', ['id' => $product->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-12">
        <div class="col-md-8">
            <label for="name" class="form-label">Tên Sản Phẩm</label>
            <input value="{{ $product->name }}" type="text" name="name" class="form-control" id="name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="selling_price" class="form-label">Giá Bán</label>
            <input value="{{ $product->selling_price }}" type="text" name="selling_price" class="form-control" id="price">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="categories_product_id" class="form-label">Loại sản phẩm</label>
            <select name="categories_product_id" class="form-select" id="categories_product_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->categories_product_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="suppliers_id" class="form-label">Nhà cung cấp</label>
            <select name="suppliers_id" class="form-select" id="suppliers_id">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $product->suppliers_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
</div>
    <div class="row">
        <div class="col-md-8">
            <label for="images" class="form-label">Hình ảnh</label>
            <input type="file" name="images[]" class="form-control" id="images" multiple>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</form>
            <script>
                function previewImages(event) {
                    var files = event.target.files;
                    var preview = document.getElementById('image-preview');
                    preview.innerHTML = '';

                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'img-thumbnail';
                            img.style = 'width: 100px; margin: 5px;';
                            preview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            </script>
                </main>                 
      </div>
    </div>
</body>
</html>

@endsection
