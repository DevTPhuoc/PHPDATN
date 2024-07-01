@extends('master')
<link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css')}}" rel="stylesheet">
@section('content')
<div style="position: absolute; left: 260px; top: 90px;" onclick="window.location.href = '{{ route('categories.detail',['id'=>$categories->id]) }}';">
   
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
      <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
    </svg>
    
</div>
<h1 style="font-size: 36px; margin-top: 50px;">CẬP NHẬT</h1>
<form method="POST" action="{{ route('categories.start-update', ['id' => $categories->id]) }}">   
        <div class="col-20">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <label for="ten" class="form-label">Tên loại sản phẩm</label>
                    <input type="text" name="ten" class="form-control" id="ten" " value="{{$categories->name}}">
                </div>
            </div>    
            <div class="row pt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
@endsection