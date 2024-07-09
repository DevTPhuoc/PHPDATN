
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
    <h1 class="h2">THÊM MỚI ADMIN</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="row g-3" method="POST" action="{{ route('Admin.start-add') }}">
    <div class="col-12">
    @csrf
        
            <div class="col-md-8">
                <label for="ten" class="form-label">Tên đăng nhập</label>
                <input type="text" name="account_name" class="form-control" id="account_name" value="{{ old('account_name') }}">
            @if ($errors->has('account_name'))
                <div class="alert alert-danger">{{ $errors->first('account_name') }}</div>
            @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
            @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
            </div>
        </div>
       <div class="row">
            <div class="col-md-8">
                <label for="fullname" class="form-label">Họ và Tên</label>
                <input type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname') }}">
            @if ($errors->has('fullname'))
                <div class="alert alert-danger">{{ $errors->first('fullname') }}</div>
            @endif
            </div>
        </div>
        <div class="row">
        <div class="col-md-8">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
            @if ($errors->has('phone'))
                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
            @endif
        </div>
    </div>
        <div class="row">
            <div class="col-md-8">
                <label for="address" class="form-label">Địa Chỉ</label>
                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
            @if ($errors->has('address'))
                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
            @endif
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
    <!-- <script>
        document.getElementById('submit').addEventListener('click', function(event) {
            const email = document.getElementById('email').value;
            const error = document.getElementById('error');

            if (!email.includes('@')) {
                error.style.display = 'block';
                event.preventDefault(); // Ngăn chặn form submit
            } else {
                error.style.display = 'none';
                // Thực hiện submit form nếu email hợp lệ
                // Bạn có thể thêm mã để submit form tại đây
            }
        });
    </script> -->
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

