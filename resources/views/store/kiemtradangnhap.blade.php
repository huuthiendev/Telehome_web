@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="Giỏ hàng">Giỏ hàng</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="login">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Thông báo</h3>
			<p style="font-size: 20px;" class="est animated wow zoomIn" data-wow-delay=".5s">Bạn vui lòng đăng nhập trước khi tiến hành mua sắm</p>
			
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <a href="dangnhap"><input type="submit" value="Tiến hành đăng nhập"></a>
                <a href="dangky"><input type="submit" value="Đăng ký thành viên"></a>
			</div>
		</div>
	</div>
@endsection