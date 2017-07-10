	<div class="header">
		<div class="container">
			<div class="header-grid">
				<div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
					<ul>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:huuthiendev@gmail.com">huuthiendev@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>0969453777</li>
						@if(Auth::check())
							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="">Xin chào: {{Auth::user()->tennd}}</a></li>
							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="dangxuat">Đăng xuất</a></li>
						@else
							<li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="dangnhap">Đăng nhập</a></li>
							<li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="dangky">Đăng ký</a></li>
						@endif
					</ul>
				</div>
				<div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
					<ul class="social-icons">
						<li><a href="#" class="facebook"></a></li>
						<li><a href="#" class="twitter"></a></li>
						<li><a href="#" class="g"></a></li>
						<li><a href="#" class="instagram"></a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="logo-nav">
				<div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
					<a href=""><img src="images/logo.png" /></a>
				</div>
				<div class="logo-nav-left1">
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li class="active"><a href="" class="act">Trang Chủ</a></li>	
							<!-- Mega Menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sản phẩm <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										@foreach($dsloaisp as $item)
											<div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<h6>{{$item -> tenloaisp}}</h6>
													<li><a href="loaisanpham/{{$item -> id}}"><img src="{{$item -> hinhloaisp}}" width="150" height="150" style="padding-bottom: 10px"></a></li>
												</ul>
											</div>
										@endforeach
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Thương hiệu <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										@foreach($dsthuonghieu as $item)
											<div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<h6>{{$item -> tenth}}</h6>
													<li><a href="thuonghieu/{{$item -> id}}"><img src="{{$item -> hinhth}}" width="100" height="100" style="padding-bottom: 10px"></a></li>
												</ul>
											</div>
										@endforeach
										<div class="clearfix"></div>
									</div>
								</ul>
							</li>
							<li><a href="timkiemtheogia">Tìm kiếm theo giá</a></li>
						</ul>
					</div>
					</nav>
				</div>
				<div class="logo-nav-right">
					<div class="search-box">
						<div id="sb-search" class="sb-search">
							<form method="post" action="timkiem"> 
								<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<input class="sb-search-input" name="chuoi" placeholder="Điền tên sản phẩm bạn cần..." type="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"> </span>
							</form>
						</div>
					</div>
						<!-- search-scripts -->
						<script src="store_asset/js/classie.js"></script>
						<script src="store_asset/js/uisearch.js"></script>
							<script>
								new UISearch( document.getElementById( 'sb-search' ) );
							</script>
						<!-- //search-scripts -->
				</div>
				<div class="header-right">
					<div class="cart box_1">
						<a href="giohang/danhsach">
							<h3>
								<div class="total">
									{{Cart::subtotal()}} <br> ({{Cart::count()}}</span> sản phẩm)
								</div>
								<img src="store_asset/images/bag.png" alt="" />
							</h3>
						</a>
						<p><a onclick="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm trong giỏ hàng?');" href="giohang/lammoi" class="simpleCart_empty">Làm mới</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>