@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
				<li class="active">Loại sản phẩm</li>
			</ol>
		</div>
	</div>
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div style="margin: 0px" class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Loại sản phẩm</h3>
					<ul class="cate">
					@foreach($dsloaisp as $item)
						@if($item -> maloaicha != null)
							<li><a href="loaisanpham/{{$item -> id}}">{{$item -> tenloaisp}}</a></li>
						@endif
					@endforeach
					</ul>
				</div><br>
				<div style="margin: 0px" class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Thương hiệu</h3>
					<ul class="cate">
					@foreach($dsthuonghieu as $item)
						<li><a href="thuonghieu/{{$item -> id}}">{{$item -> tenth}}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="products-right-grid">
					<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
						<img src="images/banner.jpg" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="products-right-grids-bottom">
					@foreach($dssanpham as $item)
						<div class="col-md-4 products-right-grids-bottom-grid">
							<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
								<div class="new-collections-grid1-image">
									<a href="sanpham/{{$item -> id}}" class="product-image"><img src="{{$item -> hinhsanpham -> first() -> duongdan}}" alt="{{$item -> tensp}}" class="img-responsive"></a>
									<div class="new-collections-grid1-image-pos products-right-grids-pos">
										<a href="sanpham/{{$item -> id}}">Xem chi tiết</a>
									</div>
								</div>
								<h4><a href="sanpham/{{$item -> id}}">{{$item -> tensp}}</a></h4>
								<div class="simpleCart_shelfItem products-right-grid1-add-cart">
									<p style="color:#CC0000;"><span class="item_price">{{{number_format($item -> gia)}}} <u>đ</u></span><a class="item_add" href="giohang/them/{{$item -> id}}">Thêm vào giỏ </a></p>
								</div>
							</div>
						</div>
					@endforeach
					<div class="clearfix"> </div>
				</div>
				<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				  <ul class="pagination paging">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
@endsection