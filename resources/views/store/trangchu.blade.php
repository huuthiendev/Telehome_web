@extends('store.layout.index')

@section('content')


<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3>Mua sắm trực tuyến</h3>
				<h4>An toàn tin cậy</h4>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- collections -->
<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Sản phẩm mới</h3>
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
								<p style="color:#CC0000;"><span class="item_price" style="margin-left:-3px;">{{{number_format($item -> gia)}}} <u>đ</u></span><a class="item_add" href="giohang/them/{{$item -> id}}">Thêm vào giỏ </a></p>
							</div>
						</div>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
<!-- //collections -->
@endsection