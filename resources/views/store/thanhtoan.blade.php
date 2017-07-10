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
			<h3>Thanh toán</h3>
			<p class="est">Vui lòng điền đầy đủ và chính xác thông tin thanh toán để việc mua hàng được diễn ra thuận lợi.</p>
			<div class="mail-grids">
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach($errors -> all() as $err)
							{{$err}}<br/>
						@endforeach
					</div>
				@endif
				<div class="col-md-7 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<form action="giohang/thanhtoan" method="post">
						<input type="hidden" name="_token" value="{{csrf_token()}}" />
						<div class="form-group">
							<label>Tên người nhận</label>
							<input class="form-control" value="{{Auth::user()->tennd}}" name="tennguoinhan" placeholder="Vui lòng điền họ và tên" required="" />
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input class="form-control" value="{{Auth::user()->sdt}}" name="sdt" type="number" placeholder="Vui lòng điền số điện thoại" required="" />
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<input class="form-control" value="{{Auth::user()->diachi}}" name="diachi" placeholder="Vui lòng điền địa chỉ" required=""/>
						</div>
						<div class="form-group">
							<label>Ghi chú</label>
							<textarea class="form-control" rows="3" name="ghichu" placeholder="Vui lòng điền ghi chú"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Thanh toán</button>
						<button type="reset" class="btn btn-default">Làm mới</button>
					</form>
				</div>
				<div class="col-md-5 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<div class="mail-grid-right1">
						<img src="images/bill.png" width="150" height="150" alt="shipping icon" class="img-responsive" />
						<h4>Chi tiết giỏ hàng</h4>
						<ul class="phone-mail">
							@foreach($giohang as $item)
								<li><a href="sanpham/{{$item->id}}">{{$item->name}} &nbsp x &nbsp {{$item->qty}} &nbsp  = &nbsp {{{number_format($item -> price * $item -> qty)}}} <u>đ</u></a></li>
							@endforeach
							<hr>
							<span>Tổng tiền: {{$tong}} <u>đ</u></span>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //mail -->

@endsection