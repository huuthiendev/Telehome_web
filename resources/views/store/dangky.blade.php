@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang Chủ</a></li>
				<li class="active">Đăng Ký</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Đăng Ký</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Vui lòng điền đầy đủ thông tin đăng ký cần thiết.</p>
			
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
				<form action="dangky" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="text" name="name" placeholder="Vui lòng nhập đầy đủ họ tên" required=" " >
					<input type="email" name="email" placeholder="Vui lòng nhập địa chỉ email" required=" " >
					<input type="password" name="password" placeholder="Vui lòng nhập mật khẩu" required=" " >
					<input type="password" name="passwordAgain" placeholder="Vui lòng nhập lại mật khẩu" required=" " >
					<input type="submit" value="Đăng Ký">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->

@endsection