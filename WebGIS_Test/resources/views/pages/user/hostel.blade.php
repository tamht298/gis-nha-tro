@extends('layouts.master')
@section('master')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    };
    
</script>
<style>
    .modal-backdrop {
    z-index: 1040 !important;
    }
    .modal-dialog {
        margin: 2px auto;
        z-index: 1100 !important;
    }
</style>
<div class="card text-white bg-white mt-5 container">
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-size: 150%;">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Thông Tin Chủ Trọ</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Quản Lý Sinh Viên Trọ</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Quản Lý Bài Viết</a>
            </div>
        </nav>
        <div class="tab-content text-dark" id="nav-tabContent">
            <!--Thông tin chủ trọ-->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card-body">
                    <div class="container" style="color: #000000;">          
                        <div class="dashboard-wrapper">
                            <div class="dashboard-ecommerce">
                                <div class="container-fluid dashboard-content ">
                                    <!-- Noi dung -->
                                    <h3>Thông Tin Chủ Trọ</h3>

                                    <div class="card">
                                            <div class="card-header">
                                                <div class="row float-left" style="font-size: 20px;">
                                                </div>
                                                <div class="row float-right bg-success mr-3 mt-2">
                                                </div>
                                            </div>
                                            <!-- <div class="table table-reponsive"> -->
                                            <div class="card-body">
                                                
                                                <div class="row table-responsive mx-auto" style="font-size: 16px">
                                                    <table class="table table-striped">
                                                        <thead  style="background: #3CADF1; color: antiquewhite">
                                                            <tr>
                                                                <th scope="col">Tên nhà trọ</th>
                                                                <th scope="col">Tên chủ trọ</th>
                                                                <th scope="col">Số điện thoại</th>
                                                                <th scope="col">Địa chỉ</th>
                                                                <th scope="col"></th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=1; ?>
                                                            @foreach ($SVOTro as $item)
                
                                                            <?php 
                                                                $sua = "sua".$item->gid;
                                                            ?>
                                                            <tr>
                                                                <td>{{$item->tennhatro}}</td>
                                                                <td>{{$item->tenchutro}}</td>
                                                                <td>{{$item->sodienthoai}}</td>
                                                                <td>{{$item->diachi}}</td>
                                                                <td>
                                                                    <span data-toggle="modal" data-target="#{{$sua}}">
                                                                        <a href="#" class="text-success" data-toggle="tooltip"
                                                                            data-placement="left" data-html="true" title="Sửa"><i
                                                                                class="fa fa-edit fa-lg"></i></a>
                                                                    </span>
                    
                                                                    <!-- Modal sửa -->
                    
                                                                    <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog"
                                                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h2 class="modal-title" id="editModalLabel">Sửa Thông Tin Chủ Trọ
                                                                                        </h3>
                                                                                        <button type="button" class="close"
                                                                                            data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{ route('SuaTTChuTro',['gid' => $item->gid])}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Mã chủ trọ<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" readonly name="gid" value="{{$item->gid}}" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Tên nhà trọ<span class="text-danger"> (*)</span></label>
                                                                                        <input type="text" name="tennhatro" value="{{$item->tennhatro}}" class="form-control">
                                                                                        </div>
                                
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Tên chủ trọ<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" name="tenchutro" value="{{$item->tenchutro}}" class="form-control">
                                                                                        </div>
                                
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Số điện thoại<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" name="sodienthoai" value="{{$item->sodienthoai}}" class="form-control">
                                                                                        </div>

                                                                                        <div class="form-group">
                                                                                                <label class="col-form-label font-weight-bold">Địa chỉ<span class="text-danger"> (*)</span></label>
                                                                                                <input type="text" name="diachi" value="{{$item->diachi}}" class="form-control">
                                                                                            </div>
                                                                                    
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger"
                                                                                        data-dismiss="modal">Đóng</button>
                                                                                    <input type="submit"
                                                                                        class="btn btn-success" value="Cập nhật">
                                                                                </div>
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <!-- End modal sửa -->
                    
                                                                    
                                                                </td>
                                                            </tr>
                                                            @break
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="d-flex justify-content-end mt-4">
                                                        {{ $SVOTro->links() }}
                                                        
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Quản Lý Sinh Viên Trọ-->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card-body">
                    <div class="container" style="color: #000000;">                      
                        <div class="dashboard-wrapper">
                            <div class="dashboard-ecommerce">
                                <div class="container-fluid dashboard-content ">

                                    <h3>Quản Lý Sinh Viên Trọ</h3>

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row float-left" style="font-size: 20px;">
                                                
                                            </div>
                                            <div class="row float-right bg-success mr-3 mt-2">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                                        class="fa fa-plus"></i> Thêm</button>
                
                                                <!-- Modal thêm -->
                
                                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="addModalLabel">Thêm Sinh Viên</h3>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="ThemDSSVTro" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="col-form-label font-weight-bold">Mã sinh viên<span class="text-danger"> (*)</span></label>
                                                                        <input type="text" name="mssv" class="form-control">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label font-weight-bold">Ngày đến<span class="text-danger"> (*)</span></label>
                                                                        <input type="date" name="ngayden" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="hidden" name="ngaydi" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="hidden" name="makhutro" class="form-control">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label class="col-form-label font-weight-bold">Mã phòng<span class="text-danger"> (*)</span></label>
                                                                        <input type="text" name="sophong" class="form-control">
                                                                    </div>
                                                                    
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <input type="submit" class="btn btn-success" value="Thêm">
                                                            </div>

                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <!-- End modal thêm -->
                
                                            </div>
                                            <!-- Search bar -->
                
                                            <div class="navbar-nav col-3 float-right mt-2 mr-5">
                                                <div id="custom-search" class="top-search-bar">
                                                    <input class="form-control" type="text" placeholder="Search..">
                
                                                </div>
                                            </div>
                
                                            <!-- End search bar -->
                                        </div>                               
                                        <div class="card-body">
                                                <?php $tongsv=0; ?>
                                                @foreach ($SVOTro as $item)
                                                    <?php $tongsv++ ?>
                                                @endforeach
                                            <h5>Tổng số sinh viên: {{$tongsv}} /sinh viên</h5>
                                            <div class="row table-responsive mx-auto" style="font-size: 16px">
                                                    <table class="table table-striped">
                                                        <thead  style="background: #3CADF1; color: antiquewhite">
                                                            <tr>
                                                                <th scope="col">STT</th>
                                                                <th scope="col">MSSV</th>
                                                                <th scope="col">Ngày đến</th>
                                                                <th scope="col">Ngày đi</th>
                                                                <th scope="col">Khu trọ</th>
                                                                <th scope="col">Phòng</th>
                                                                <th scope="col">Thao tác</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i=1; ?>
                                                            @foreach ($SVOTro as $item)

                                                            <?php 
                                                                $sua = "sua".$item->mssv;
                                                                $xoa = "xoa".$item->mssv; ?>
                                                            <tr>
                                                                <th scope="row">{{$i++ + ($SVOTro->currentPage() -1)* $pageSize }}</th>
                                                            <td>{{$item->mssv}}</td>
                                                                <td>{{$item->ngayden}}</td>
                                                                <td>{{$item->ngaydi}}</td>
                                                                <td>{{$item->tennhatro}}</td>
                                                                <td>{{$item->sophong}}</td>
                                                                <td>
                                                                    <span data-toggle="modal" data-target="#{{$sua}}">
                                                                        <a href="#" class="text-success" data-toggle="tooltip"
                                                                            data-placement="left" data-html="true" title="Sửa"><i
                                                                                class="fa fa-edit fa-lg"></i></a>
                                                                    </span>
                                                                    <span data-toggle="modal" data-target="#{{$xoa}}">
                                                                        <a href="#" class="text-danger ml-3" data-toggle="tooltip"
                                                                            data-placement="right" data-html="true" title="Xóa"><i
                                                                                class="fa fa-trash-alt fa-lg"></i></a>
                                                                    </span>
                    
                                                                    <!-- Modal sửa -->
                    
                                                                    <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog"
                                                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h2 class="modal-title" id="editModalLabel">Sửa Sinh Viên
                                                                                        </h3>
                                                                                        <button type="button" class="close"
                                                                                            data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{ route('SuaDSSVTro',['id' => $item->id])}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Mã sinh viên<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" readonly name="mssv" value="{{$item->mssv}}" class="form-control">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Ngày đến<span class="text-danger"> (*)</span></label>
                                                                                        <input type="date" name="ngayden" value="{{$item->ngayden}}" class="form-control">
                                                                                        </div>
                                
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Ngày đi</label>
                                                                                            <input type="date" name="ngaydi" value="{{$item->ngaydi}}" class="form-control">
                                                                                        </div>
                                
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" name="makhutro" class="form-control">
                                                                                        </div>
                                
                                                                                        <div class="form-group">
                                                                                            <label class="col-form-label font-weight-bold">Mã phòng<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" name="sophong" value="{{$item->sophong}}" class="form-control">
                                                                                        </div>
                                                                                    
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger"
                                                                                        data-dismiss="modal">Đóng</button>
                                                                                    <input type="submit"
                                                                                        class="btn btn-success" value="Cập nhật">
                                                                                </div>
                                                                            </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <!-- End modal sửa -->
                    
                                                                    <!-- Modal xóa -->
                    
                                                                    <div class="modal fade" id="{{$xoa}}" tabindex="-1" role="dialog"
                                                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h2 class="modal-title" id="deleteModalLabel">Xóa Sinh Viên</h3>
                                                                                        <button type="button" class="close"
                                                                                            data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                </div>
                    
                                                                                <div class="modal-footer">
                                                                                        <form action="{{ route('XoaDSSVTro',['id' => $item->id])}}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                            <button type="button" class="btn btn-danger float-left"
                                                                                                data-dismiss="modal">Hủy</button>
                                                                                            <button type="submit" class="btn btn-dark">Xóa</button>
                                                                                        </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <!-- End modal xóa -->
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="d-flex justify-content-end mt-4">
                                                        {{ $SVOTro->links() }}
                                                        
                                                </div>
                                            </div>                                      
                                        </div>
                                    </div>
                                </div>
                            <div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!--Quản Lý Bài Viết-->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="card-body">
                        <div class="container" style="color: #000000;">                      
                            <div class="dashboard-wrapper">
                                <div class="dashboard-ecommerce">
                                    <div class="container-fluid dashboard-content ">

                                        <h3>Quản Lý Bài Viết</h3>

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row float-left" style="font-size: 20px;">
                                                    
                                                </div>
                                                <div class="row float-right bg-success mr-3 mt-2">
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#addModalBaiViet"><i
                                                            class="fa fa-plus"></i> Thêm</button>
                    
                                                    <!-- Modal thêm -->
                    
                                                    <div class="modal fade" id="addModalBaiViet" tabindex="-1" role="dialog"
                                                        aria-labelledby="addModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="modal-title" id="addModalLabel">Thêm Bài Viết</h3>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="ThemBaiViet" method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="makhutro" value="{{$khunhatro->gid}}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"> (*)</span></label>
                                                                            <input type="text" name="tieude" class="form-control">
                                                                        </div>

                                                                        <div class="form-group">                                                                          
                                                                            <label class="col-form-label font-weight-bold">Nội dung<span class="text-danger"> (*)</span></label>
                                                                            <textarea name="noidung" class="form-control " id="editor1"></textarea>
                                                                        </div>
                                                                        
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <input type="submit" class="btn btn-success" value="Thêm">
                                                                </div>

                                                            </form>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                    <!-- End modal thêm -->
                    
                                                </div>
                                                <!-- Search bar -->
                    
                                                <div class="navbar-nav col-3 float-right mt-2 mr-5">
                                                    <div id="custom-search" class="top-search-bar">
                                                        <input class="form-control" type="text" placeholder="Search..">
                    
                                                    </div>
                                                </div>
                    
                                                <!-- End search bar -->
                                            </div>                               
                                            <div class="card-body">
                                                    
                                                <div class="row table-responsive mx-auto" style="font-size: 16px">
                                                        <table class="table table-striped">
                                                            <thead  style="background: #3CADF1; color: antiquewhite">
                                                                <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th scope="col">Tiêu đề</th>
                                                                    <th scope="col">Nội dung</th>                                 
                                                                    <th scope="col">Ngày tạo</th>
                                                                    <th scope="col">Trạng thái duyệt</th>
                                                                    <th scope="col">Thao tác</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; $y=2 ?>
                                                                @foreach ($baiviet as $item)

                                                                <?php 
                                                                    $suabv = "suabv".$item->id;
                                                                    $xoabv = "xoabv".$item->id; ?>
                                                                <tr>
                                                                    <th scope="row">{{$i++ + ($baiviet->currentPage() -1)* $pageSize }}</th>
                                                                    <th>{{$item->tieude}}</th>
                                                                    <th style="width: 30%;">{!! $item->noidung !!}</th>                              
                                                                    <th>{{$item->ngaytao}}</th>
                                                                    <th>{{$item->trangthaiduyet===0 ? 'Chưa duyệt' : 'Đã duyệt'}}</th>
                                                                    
                                                                
                                                                    <td>
                                                                        <span data-toggle="modal" data-target="#{{$suabv}}">
                                                                            <a href="#" class="text-success" data-toggle="tooltip"
                                                                                data-placement="left" data-html="true" title="Sửa"><i
                                                                                    class="fa fa-edit fa-lg"></i></a>
                                                                        </span>
                                                                        <span data-toggle="modal" data-target="#{{$xoabv}}">
                                                                            <a href="#" class="text-danger ml-3" data-toggle="tooltip"
                                                                                data-placement="right" data-html="true" title="Xóa"><i
                                                                                    class="fa fa-trash-alt fa-lg"></i></a>
                                                                        </span>
                        
                                                                        <!-- Modal sửa -->
                        
                                                                        <div class="modal fade" id="{{$suabv}}" tabindex="-1" role="dialog"
                                                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h2 class="modal-title" id="editModalLabel">Sửa Bài Viết
                                                                                            </h3>
                                                                                            <button type="button" class="close"
                                                                                                data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="{{ route('SuaBaiViet',['id' => $item->id])}}" method="post">
                                                                                            @csrf
                                                                                            
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label font-weight-bold">Tiêu đề<span class="text-danger"> (*)</span></label>
                                                                                            <input type="text" name="tieude" value="{{$item->tieude}}" class="form-control">
                                                                                            </div>
                                    
                                                                                            <div class="form-group">
                                                                                                <label class="col-form-label font-weight-bold">Nội dung</label>
                                                                                                <textarea name="noidung" class="form-control " id="editor{{$y++}}">{!!$item->noidung!!}</textarea>
                                                                                                
                                                                                            </div>                                                                                                                      
                                                                                        
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger"
                                                                                            data-dismiss="modal">Đóng</button>
                                                                                        <input type="submit"
                                                                                            class="btn btn-success" value="Cập nhật">
                                                                                    </div>
                                                                                </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                        
                                                                        <!-- End modal sửa -->
                        
                                                                        <!-- Modal xóa -->
                        
                                                                        <div class="modal fade" id="{{$xoabv}}" tabindex="-1" role="dialog"
                                                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h2 class="modal-title" id="deleteModalLabel">Xóa Bài Viết</h3>
                                                                                            <button type="button" class="close"
                                                                                                data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                    <h5>Bạn có chắc muốn xóa bài viết <span>"{{$item->tieude}}"</span></h5>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                            <form action="{{ route('XoaBaiViet',['id' => $item->id])}}"
                                                                                                    method="post">
                                                                                                    @csrf
                                                                                                <button type="button" class="btn btn-danger float-left"
                                                                                                    data-dismiss="modal">Hủy</button>
                                                                                                <button type="submit" class="btn btn-dark">Xóa</button>
                                                                                            </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                        
                                                                        <!-- End modal xóa -->
                                                                    </td>
                                                                </tr>
                                                                
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-4">
                                                            {{ $baiviet->links() }}                                                          
                                                    </div>
                                                    

                                                </div>                                      
                                            </div>
                                        </div>
                                    </div>
                                <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection