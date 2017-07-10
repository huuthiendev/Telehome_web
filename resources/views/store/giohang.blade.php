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
		<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Giỏ hàng của bạn hiện có: <span>{{$tongsl}} sản phẩm</span></h3>
		<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>ID</th>	
						<th>Tên</th>
						<th>Hình</th>
						<th>Số lượng</th>
						<th>Giá</th>
						<th>Tổng giá</th>
						<th>Xóa</th>
					</tr>
				</thead>
					@foreach($giohang as $item)
						<tr class="rem1">
							<td class="invert" id="idsp">{{$item->id}}</td>
							<td class="invert">{{$item->name}}</td>
							<td class="invert-image"><a href="sanpham/{{$item->id}}"><img src="{{$item->options->image}}" alt="{{$item->name}}" class="img-responsive" /></a></td>
							<td class="invert">
									<div class="quantity"> 
									<div class="quantity-select">                           
										<a href="giohang/capnhat/tru/{{$item -> id}}"><div class="entry value-minus">&nbsp;</div></a>
										<div class="entry value"><span id="soLuong">{{$item->qty}}</span></div>
										<a href="giohang/capnhat/cong/{{$item -> id}}"><div class="entry value-plus active">&nbsp;</div></a>
									</div>
								</div>
							</td>
							<td class="invert">{{{number_format($item -> price)}}}</td>
							<td class="invert" id="tonggia">{{{number_format($item -> price * $item -> qty)}}}</td>
							<td class="invert">
								<a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="giohang/xoa/{{$item -> id}}"><img src="store_asset/images/close_1.png"></a>
							</td>
						</tr>
					@endforeach		
				<!--quantity-->
					<script>
						$('.value-plus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) + 1;
							divUpd.text(newVal);
						});

						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10) - 1;
							if(newVal >= 1) {
								divUpd.text(newVal);
							}
						});
						
					</script>
				<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
			<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm trong giỏ hàng?');" href="giohang/lammoi"><h4>Làm mới</h4></a>
				<a href="giohang/thanhtoan"><h4>Thanh toán</h4></a>
				<ul>
					<li>Tổng tiền <i>-</i> <span id="tongTien">{{$tong}} đ</span></li>
				</ul>
			</div>
			<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
				<a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua hàng</a>
			</div>
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>
<!-- //checkout -->

@endsection