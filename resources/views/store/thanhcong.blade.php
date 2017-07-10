@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- mail -->
	<div class="mail animated wow zoomIn" data-wow-delay=".5s">
		<div class="container">
			<h3>Đơn hàng đã được ghi nhận</h3>
			<p class="est">Cảm ơn bạn đã lựa chọn chúng tôi, sẽ có nhân viên nhanh chóng liên hệ đến bạn để xác nhận đơn hàng.</p><br/>
			<img style="margin-left: 440px" src="images/success_payment.png">
		</div>
	</div>
<!-- //mail -->

@endsection