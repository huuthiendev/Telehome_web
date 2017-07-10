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
<!-- checkout -->
	<div class="checkout">
        <div class="container">
            <img style="margin-left: 440px" src="images/cart_question.jpg"><br/>
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Bạn chưa có sản phẩm nào trong giỏ hàng</a>
            </div>
        </div>	
	</div>
<!-- //checkout -->

@endsection