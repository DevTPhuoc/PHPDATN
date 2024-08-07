<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link href="http://127.0.0.1:8000/bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/tailwind.output.css">
    <link rel="stylesheet" href="http://127.0.0.1:8000/assets/css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
</head>
<body>
    @extends('master')

    @section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">THÊM MỚI USER</h1>
    </div>
    <form class="row g-3" method="POST" action="{{ route('user.start-add') }}">
    @csrf
    <div class="col-md-8">
        <label for="account_name" class="form-label">Tên đăng nhập</label>
        <input type="text" name="account_name" class="form-control" id="account_name" value="{{ old('account_name') }}">
        @if ($errors->has('account_name'))
            <div class="alert alert-danger">{{ $errors->first('account_name') }}</div>
        @endif
    </div>

    <div class="col-md-8">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="password" name="password" class="form-control" id="password">
        @if ($errors->has('password'))
            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
        @endif
    </div>

    <div class="col-md-8">
        <label for="fullname" class="form-label">Họ và Tên</label>
        <input type="text" name="fullname" class="form-control" id="fullname" value="{{ old('fullname') }}">
        @if ($errors->has('fullname'))
            <div class="alert alert-danger">{{ $errors->first('fullname') }}</div>
        @endif
    </div>

    <div class="col-md-8">
        <label for="email" class="form-label">Email</label>
        <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="col-md-8">
        <label for="phone" class="form-label">Số Điện Thoại</label>
        <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
        @if ($errors->has('phone'))
            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
        @endif
    </div>

    <div class="col-md-8">
        <label for="address" class="form-label">Địa Chỉ</label>
        <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}">
        @if ($errors->has('address'))
            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
        @endif
    </div>

    <div class="col-md-12 pt-3">
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
    @endsection
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer=""></script>
    <script src="http://127.0.0.1:8000/assets/js/charts-lines.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/charts-pie.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/init-alpine.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/charts-bars.js"></script>
    <script src="http://127.0.0.1:8000/assets/js/focus-trap.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer=""></script>
</body>
</html>
