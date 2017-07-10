@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khuyến mãi
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">                
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors -> all() as $err)
                            {{$err}}<br/>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif

                @if(session('loi'))
                    <div class="alert alert-warning">
                        {{session('loi')}}
                    </div>
                @endif
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/khuyenmai/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/khuyenmai/them" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên khuyến mãi</label>
                        <input class="form-control" name="tenkm" placeholder="Vui lòng điền tên khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Hình khuyến mãi</label>
                        <input type="file" class="form-control" name="hinh" />
                    </div>
                    <div class="form-group">
                        <label>Ngày bắt đầu</label>
                        <input type="date" class="form-control" name="ngaybd" placeholder="Vui lòng điền ngày bắt đầu khuyến mãi" />
                    </div>
                    <div class="form-group">
                        <label>Ngày kết thúc</label>
                        <input type="date" class="form-control" name="ngaykt" placeholder="Vui lòng điền ngày kết thúc khuyến mãi" />
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection