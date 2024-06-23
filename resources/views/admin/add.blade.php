
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
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="http://127.0.0.1:8000/products/start-add">
    <div class="col-12">
        <input type="hidden" name="_token" value="fQgAEk3NvJXKr882p4HXOburK2qztSc4elwcUvE3">        <div class="row">
            <div class="col-md-8">
                <label for="ten" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten" ">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="gia_ban" class="form-label">Giá bán sản phẩm</label>
                <input type="text" name="gia_ban" class="form-control" id="gia_ban" ">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="gia_nhap" class="form-label">Giá nhập sản phẩm</label>
                <input type="text" name="gia_nhap" class="form-control" id="gia_nhap" ">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="loaiSP" class="form-label">Loại sản phẩm</label>
                <select name="loai_id" class="form-select" aria-label="Default select example" id="loai_id">
                    <option selected>Chọn loại sản phẩm</option>
                                        <option value="4">ooo</option>
                                        <option value="5">gi vay choi</option>
                                        <option value="6">no size</option>
                                        <option value="7">Áo khoác gió</option>
                                        
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="nha_cung_cap_id" class="form-label">Nhà cung cấp</label>
                <select name="nha_cung_cap_id" class="form-select" aria-label="Default select example" id="nhaCungCap">
                    <option selected>Chọn nhà cung cấp</option>
                                        <option value="1">cosytinh</option>
                                        <option value="2">HipPOhop</option>
                                        
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="khuyen_mai_id" class="form-label">Khuyến mãi</label>
                <select name="khuyen_mai_id" class="form-select" aria-label="Default select example" id="khuyen_mai_id">
                    <option selected value="0">Chọn khuyến mãi</option>
                                        <option value="0">Không khuyễn mãi</option>
                                        <option value="1">giam 10%</option>
                                        
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="mo_ta" class="form-label">Mô tả sản phẩm</label>
                <input type="text" name="mo_ta" class="form-control" id="mo_ta" ">
            </div>
        </div>
            
        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Lưu</button>
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

