@extends('store.layout.index')

@section('content')

<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang Chủ</a></li>
				<li class="active">Tìm kiếm theo giá</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h3>Tìm kiếm theo giá sản phẩm</h3>
			
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="timkiemtheogia" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="form-group">
                        <label>Giá bắt đầu</label>
                        <input class="form-control" name="giabd" type="number" placeholder="Vui lòng điền giá bắt đầu" required/>
                    </div>
					<div class="form-group">
                        <label>Giá kết thúc</label>
                        <input class="form-control" name="giakt" type="number" placeholder="Vui lòng điền giá kết thúc" required/>
                    </div>
					<input type="submit" value="Tìm kiếm">
				</form>
			</div>
		</div>
	</div>
<!-- //login -->

@endsection