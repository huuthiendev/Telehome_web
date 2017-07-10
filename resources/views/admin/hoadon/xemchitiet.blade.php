@extends('admin.layout.index')    

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>{{$hoadon-> nguoidung -> tennd}}</small>
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
                <button type="button" class="btn btn-default btn-sm" onclick="location.href='admin/hoadon/danhsach';">
                    <span class="fa fa-chevron-left"></span> Trở về
                </button>
                <form action="admin/hoadon/chitiet/{{$hoadon->id}}" method="POST" enctype="multipart/form-data">
                    <br/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>ID hóa đơn</label>
                        <input class="form-control" name="id" value="{{$hoadon -> id}}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Tên người mua</label>
                        <input class="form-control" name="ten" placeholder="Vui lòng điền tên người mua" value="{{$hoadon-> nguoidung -> tennd}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="number" name="sdt" placeholder="Vui lòng điền số điện thoại người mua" value="{{$hoadon->sdt}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="diachi" placeholder="Vui lòng điền địa chỉ người mua" value="{{$hoadon->diachi}}" />
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input class="form-control" name="tongtien" placeholder="Vui lòng điền tổng tiền" value="{{{number_format($hoadon->tongtien)}}}đ" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea class="form-control" rows="3" name="ghichu" placeholder="Vui lòng điền ghi chú">{{$hoadon->ghichu}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label><br/>
                        <label class="radio-inline">
                            <input name="trangthai" 
                            @if($hoadon->trangthai == 0) 
                                {{"checked"}}
                            @endif
                                type="radio" value="0">Chờ xữ lý
                        </label>
                        <label class="radio-inline">
                            <input name="trangthai" 
                            @if($hoadon->trangthai == 1) 
                                {{"checked"}}
                            @endif
                                type="radio" value="1">Đã xữ lý
                        </label>
                        <label class="radio-inline">
                            <input name="trangthai" 
                            @if($hoadon->trangthai == 2) 
                                {{"checked"}}
                            @endif
                                type="radio" value="2">Đã giao
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                <form>
            </div>

            <div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Cập nhật số lượng</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dscthoadon as $item)
                            <tr class="odd gradeX" align="center">
                                <td>{{$item->sanpham->id}}</td>
                                <td>{{$item->sanpham->tensp}}</td>
                                <td><img src="{{$item->sanpham->hinhsanpham->first()->duongdan}}" class="img-rounded" alt="{{$item->sanpham->tensp}}" width="100" height="100"></td>
                                <td>{{{number_format($item->sanpham->gia)}}}<u>đ</u></td>
                                <td>{{$item->soluong}}</td>
                                <td>{{{number_format($item->sanpham->gia * $item->soluong)}}}<u>đ</u></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a id="capnhat" href="admin/hoadon/soluong/{{$item->id}}">Cập nhật</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return confirm('Bạn có chắc chắn muốn xóa?');" href="admin/hoadon/xoasp/{{$item->id}}">Xóa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection