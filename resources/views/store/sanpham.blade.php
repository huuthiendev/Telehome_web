@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Chi tiết sản phẩm</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 products-left">
				<div style="margin: 0px" class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Loại sản phẩm</h3>
					<ul class="cate">
					@foreach($dsloaisp as $item)
						<li><a href="loaisanpham/{{$item -> id}}">{{$item -> tenloaisp}}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-8 single-right">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
				<link href="store_asset/css/slider.css" rel="stylesheet" type="text/css" media="all" />
				<div class="w3-content">
					@foreach($sanpham -> hinhsanpham as $hinh)
						<img class="mySlides" src="{{$hinh -> duongdan}}" style="width:100%">
					@endforeach
					<div class="w3-row-padding w3-section">
					@php $i = 0; @endphp
					@foreach($sanpham -> hinhsanpham as $hinh)
						@php $i = $i + 1; @endphp
						<div class="w3-col s4">
							<img class="demo w3-opacity w3-hover-opacity-off" src="{{$hinh -> duongdan}}" style="width:100%" onclick="currentDiv({{$i}})">
						</div>
					@endforeach
					</div>
				</div>
				
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3>{{$sanpham -> tensp}}</h3>
					<h4>{{{number_format($sanpham -> gia)}}}</h4>
					<div class="description">
						<h5><i>Mô tả</i></h5>
						<p>{{$sanpham -> mota}}</p>
					</div>
					<div class="occasion-cart">
						<a class="item_add" href="giohang/them/{{$sanpham -> id}}">Thêm vào giỏ </a>
					</div>
					<div class="social">
						<div class="social-left">
							<p>Chia sẻ:</p>
						</div>
						<div class="social-right">
							<ul class="social-icons">
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
								<li><a href="#" class="g"></a></li>
								<li><a href="#" class="instagram"></a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //single -->
<!-- single-related-products -->
	<div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp" data-wow-delay=".5s">Sản phẩm liên quan</h3>
			<div class="new-collections-grids">
				@foreach($dssplienquan as $item)
					<div class="col-md-3 products-right-grids-bottom-grid">
						<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
							<div class="new-collections-grid1-image">
								<a href="sanpham/{{$item -> id}}" class="product-image"><img width="300" height="300" src="{{$item -> hinhsanpham -> first() -> duongdan}}" alt="{{$item -> tensp}}" class="img-responsive"></a>
								<div class="new-collections-grid1-image-pos products-right-grids-pos">
									<a href="sanpham/{{$item -> id}}">Xem chi tiết</a>
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
	</div>
<!-- //single-related-products -->
@endsection

@section('script')
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function currentDiv(n) {
			showDivs(slideIndex = n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			if (n > x.length) {slideIndex = 1}
			if (n < 1) {slideIndex = x.length}
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
			}
			x[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " w3-opacity-off";
		}
	</script>
@endsection