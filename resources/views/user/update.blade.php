
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

   
<h1 style="font-size: 36px; margin-top: 50px;">CẬP NHẬT</h1>

<form class="row g-3" method="POST" action="{{ route('user.start-update', ['id' => $user->id]) }}

">
    <div class="col-12">
    @csrf
        
            <div class="col-md-8">
                <label for="ten" class="form-label">Tên đăng nhập</label>
                <input value= " {{$user->account_name}}" type="text" name="account_name" class="form-control" id="account_name" >
            </div>
        </div>
       
       <div class="row">
            <div class="col-md-8">
                <label for="fullname" class="form-label">Họ và Tên</label>
                <input value= " {{$user->fullname}}" type="text" name="fullname" class="form-control" id="fullname" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="email" class="form-label">Email</label>
                <input value= " {{$user->email}}" type="text" name="email" class="form-control" id="email" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="phone" class="form-label">Số Điện Thoại</label>
                <input value= " {{$user->phone}}" type="text" name="phone" class="form-control" id="phone" >
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <label for="address" class="form-label">Địa Chỉ</label>
                <input value= " {{$user->address}}" type="text" name="address" class="form-control" id="address" >
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
