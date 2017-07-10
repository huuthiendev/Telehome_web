@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Tìm kiếm</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="container">
		<div class="new-collections-grids">
			@foreach($dssanpham as $item)
			<div class="col-md-3 products-right-grids-bottom-grid">
				<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
					<div class="new-collections-grid1-image">
						<a href="sanpham/{{$item -> id}}" class="product-image"><img width="300" height="300" src="{{$item -> hinhsanpham -> first() -> duongdan}}" alt="{{$item -> tensp}}" class="img-responsive"></a>
						<div class="new-collections-grid1-image-pos products-right-grids-pos">
							<a href="sanpham/{{$item -> id}}">Xem chi tiết</a>
						</div>
						<div class="new-one">
							<p>Mới</p>
						</div>
					</div>
					<h4><a href="sanpham/{{$item -> id}}">{{$item -> tensp}}</a></h4>
					<div class="simpleCart_shelfItem products-right-grid1-add-cart">
						<p style="color:crimson;"><span class="item_price">{{{number_format($item -> gia)}}} <u>đ</u></span><a class="item_add" href="giohang/them/{{$item -> id}}">Thêm vào giỏ </a></p>
					</div>
				</div>
			</div>
			@endforeach
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->

@endsection