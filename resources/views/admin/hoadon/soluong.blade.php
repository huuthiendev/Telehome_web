@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>{{$cthoadon->sanpham->tensp}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">                
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/hoadon/chitiet/{{$cthoadon->mahd}}';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/hoadon/soluong/{{$cthoadon->id}}" method="POST">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="idHD" value="{{$cthoadon->id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>ID hóa đơn</label>
                        <input class="form-control" name="idHD" value="{{$cthoadon->mahd}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>ID sản phẩm</label>
                        <input class="form-control" name="idSP" value="{{$cthoadon->masp}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" value="{{$cthoadon->sanpham->tensp}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Số lượng mua</label>
                        <input class="form-control" type="number" name="soluong" placeholder="Vui lòng điền số lượng mua" value="{{$cthoadon->soluong}}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection