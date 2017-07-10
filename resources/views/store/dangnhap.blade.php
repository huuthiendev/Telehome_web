@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang Chủ</a></li>
				<li class="active">Đăng Nhập</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Đăng nhập</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Vui lòng điền đầy đủ thông tin đăng nhập</p>
			
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				@if(count($errors) > 0)
	                <div class="alert alert-danger">
	                    @foreach($errors -> all() as $err)
	                        {{$err}}<br/>
	                    @endforeach
	                </div>
	            @endif
	            @if(session('thongbao'))
	                <div class="alert alert-danger">
	                    {{session('thongbao')}}
	                </div>
	            @endif
				<form action="dangnhap" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="email" name="email" placeholder="Vui lòng nhập địa chỉ email" required=" " >
					<input type="password" name="password" placeholder="Vui lòng nhập mật khẩu" required=" " >
					<input type="submit" value="Đăng Nhập">
				</form>
			</div>
			<h4 class="animated wow slideInUp" data-wow-delay=".5s">Dành cho thành viên mới</h4>
			<p class="animated wow slideInUp" data-wow-delay=".5s"><a href="dangky">Đăng ký tại đây</a> (hoặc) trở về <a href="">Trang chủ<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->

@endsection