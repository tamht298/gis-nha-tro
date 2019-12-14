@extends('layouts.master-admin')
@section('title','Quản lý khu trọ')
@section('master-admin')
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="trang-quan-tri">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Quản trị
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="trang-quan-tri"><i class="fas fa-home"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="danhsachSV"><i class="fa fa-list" aria-hidden="true"></i>Quản lý
                            thông tin sinh viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fa fa-fw fa-rocket"></i>Quản lý khu
                            trọ</a>
                    </li>
                    <li class="nav-item">

                        <a class="nav-link" href="quan-ly-bai-viet"><i class="far fa-file"></i>Quản lý bài
                            viết</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1-2" aria-controls="submenu-1-2"><i
                                class="far fa-calendar-minus"></i>Quản lý thống kê</a>
                        <div id="submenu-1-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="thong-ke-theo-phuong">Thống kê theo phường</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="thong-ke-theo-chu-tro">Thống kê theo chủ trọ</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="quan-ly-tai-khoan"><i class="fa fa-fw fa-rocket"></i>Quản lý tài
                            khoản</a>

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- Noi dung -->

            <div class="row mb-3"></div>
            <div class="card">
                <div class="card-header">
                    <div class="row float-left" style="font-size: 20px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý khu trọ</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row float-right bg-success mr-3 mt-2">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                class="fa fa-plus"></i> Thêm</button>

                        <!-- Modal thêm -->

                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                            aria-labelledby="addModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="addModalLabel">Thêm Thông Tin Khu Trọ</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="themNhatro" method="POST">
                                            {{ csrf_field() }}
                                            <!-- <div class="form-group">
                                                        <label class="col-form-label font-weight-bold">Mã khu
                                                            trọ:</label>
                                                        <input type="text" class="form-control">
                                                    </div> -->
                                            <div class="form-group">
                                                <label class="col-form-label font-weight-bold">Tên khu
                                                    trọ<span class="text-danger" name="tennhatro"> (*)</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label font-weight-bold">Tên chủ trọ<span
                                                        class="text-danger"> (*)</span></label>
                                                <input type="text" name="tenchutro" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label font-weight-bold">Địa chỉ<span
                                                        class="text-danger"> (*)</span></label>
                                                <textarea type="text" name="diachi" class="form-control" placeholder="Thông tin địa chỉ khu trọ"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label font-weight-bold">Số điện
                                                    thoại<span class="text-danger"> (*)</span></label>
                                                <input type="text" name="sodienthoai" class="form-control">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Thêm</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- End modal thêm -->

                    </div>
                    <!-- Search bar -->

                    <div class="navbar-nav col-3 float-right">
                        <div id="custom-search" class="top-search-bar">
                            <input class="form-control" type="text" placeholder="Search..">

                        </div>
                    </div>

                    <!-- End search bar -->
                </div>
                <?php //Hiển thị thông báo thành công?>
                @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif

                <?php //Hiển thị thông báo lỗi?>
                @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
                <!-- <div class="table table-reponsive"> -->
                <div class="card-body">
                    <div class="row table-responsive mx-auto" style="font-size: 16px">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col" class="center">Mã khu trọ</th>
                                    <th scope="col">Tên khu trọ</th>
                                    <th scope="col">Chủ trọ</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1
                                ?>
                                @foreach ($dsNhatro as $nhatro )
                                <?php $them = $nhatro->gid."them";
                                        $sua = $nhatro->gid."$them";
                                        $xoa = $nhatro->gid."xoa"; ?>
                                <tr>
                                    <td scope="row">{{$i++}}</th>
                                    <td scope="row" class="text-center">{{$nhatro->gid}}</td>
                                    <td scope="row">{{$nhatro->tennhatro}}</td>
                                    <td scope="row">{{$nhatro->tenchutro}}</td>
                                    <td scope="row" class="text-wrap" style="width: 20em;" >{{$nhatro->diachi}}</td>
                                    <td scope="row">{{$nhatro->sodienthoai}}</td>
                                    <td scope="row">
                                        <span data-toggle="modal" data-target="#{{$sua}}">
                                            <a href="#" class="text-success" data-toggle="tooltip" data-placement="left"
                                                data-html="true" title="Sửa"><i class="fa fa-edit fa-lg"></i></a>
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
                                                        <h2 class="modal-title" id="editModalLabel">Sửa Thông
                                                            Tin Khu Trọ</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('SuaNT',['gid' => $nhatro->gid])}}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="col-form-label font-weight-bold">Mã khu
                                                                    trọ:</label>
                                                                <input type="text" name="tennhatro"
                                                                    value="{{$nhatro->gid}}" class="form-control"
                                                                    disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label font-weight-bold">Tên khu
                                                                    trọ:</label>
                                                                <input type="text" value="{{$nhatro->tennhatro}}"
                                                                    name="tennhatro" class="form-control"
                                                                    id="tensv-name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label font-weight-bold">Chủ
                                                                    trọ:</label>
                                                                <input type="text" value="{{$nhatro->tenchutro}}"
                                                                    name="tenchutro" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label font-weight-bold">Địa
                                                                    chỉ:</label>
                                                                    <textarea class="form-control" name="diachi">{{$nhatro->diachi}}</textarea>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-form-label font-weight-bold">Số điện
                                                                    thoại:</label>
                                                                <input type="text" value="{{$nhatro->sodienthoai}}"
                                                                    name="sodienthoai" class="form-control">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Đóng</button>

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
                                                    <form action="{{ route('XoaNT',['gid' => $nhatro->gid])}}" method="post">
                                                            @csrf
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="deleteModalLabel">Xóa Thông
                                                                Tin Khu Trọ</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>


                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-danger" value="Xóa">
                                                        <button type="button" class="btn btn-default float-left"
                                                            data-dismiss="modal">Hủy</button>

                                                    </div>
                                                </form>
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
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                             Copyright © 2019 Team 01. All rights reserved.
                        </div>
                    </div>
                </div>
            </div> -->
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
</div>
@endsection
