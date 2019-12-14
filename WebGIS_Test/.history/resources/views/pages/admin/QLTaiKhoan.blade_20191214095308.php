@extends('layouts.master-admin')
@section('title','Quản lý tài khoản')
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
                                <a class="nav-link" href="quan-ly-khu-tro"><i class="fa fa-fw fa-rocket"></i>Quản lý khu
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
                                <a class="nav-link active" href="#"><i class="fa fa-fw fa-rocket"></i>Quản lý tài khoản</a>

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
                                        <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Quản lý tài khoản</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="row float-right bg-success mr-3 mt-2">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                        class="fa fa-plus"></i> Thêm</button>

                                <!-- Modal thêm -->
                                <form action="themTK" method="POST">
                                @csrf
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                    aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="addModalLabel">Thêm Tài Khoản</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Tên tài khoản<span class="text-danger"> (*)</span></label>
                                                        <input type="text" class="form-control" name="tendangnhap">
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Mật khẩu<span class="text-danger"> (*)</span></label>
                                                        <input type="password" class="form-control" name="matkhau">
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Tên nhà trọ<span class="text-danger"> (*)</span></label>

                                                        <select name="makhutro" class="form-control">
                                                        <option value=""></option>
                                                        @foreach($khunhatro as $knt)
                                                            <option value="{{$knt->gid}}">{{$knt->tennhatro}}</option>
                                                        @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Quyền<span class="text-danger"> (*)</span></label>
                                                        <select name="quyen" class="form-control">
                                                            <option value="0">Chủ trọ</option>
                                                            <option value="1">Admin</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Thêm</button>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
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



                        <!-- Hiển thị thông báo thành công>-->
                        @if ( Session::has('success') )
                        <div class="alert alert-success alert-dismissible m-2" role="alert" id="success-alert">
                            <strong>{{ Session::get('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                        @endif

                        <!-- Hiển thị thông báo lỗi? -->
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
                                            <th scope="col">#</th>
                                            <th scope="col">Tên tài khoản</th>
                                            <th scope="col">Tên khu trọ</th>

                                            <th scope="col">Quyền</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1 ?>
                                    @foreach($taikhoan as $item)
                                    <?php
                                        $sua = $item->id."sua";
                                        $xoa = $item->id."xoa"; ?>
                                        <tr>
                                            <th scope="row">{{$i++ + ($taikhoan->currentPage() -1)* $pageSize }}</th>
                                            <td>{{$item->tendangnhap}}</td>
                                            <td>
                                                @foreach($khunhatro as $knt)
                                                @if($knt->gid == $item->makhutro)
                                                    {{$knt->tennhatro}}
                                                @endif
                                                @endforeach
                                            </td>

                                            <td>{{$item->quyen===0 ? 'Chủ trọ' : 'Admin'}}</td>
                                            <td>

                                                <span data-toggle="modal" data-target="#{{$sua}}">
                                                    <a href="#" class="text-success ml-3" data-toggle="tooltip"
                                                        data-placement="bottom" data-html="true" title="Sửa"><i
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
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                        <form action="{{route('suaTK',['id' => $item->id])}}" method="POST">
                                                        @csrf
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="editModalLabel">Sửa Tài Khoản</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Tên tài khoản</label>
                                                                            <input type="text" class="form-control" name="tendangnhap" value="{{$item->tendangnhap}}" readonly>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Mật khẩu</label>
                                                                            <input type="password" class="form-control"
                                                                            name="matkhau" value="{{$item->matkhau}}">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Tên nhà trọ</label>
                                                                                <select name="makhutro" class="form-control">

                                                                                    <option value=""></option>

                                                                                    @foreach($khunhatro as $knt)
                                                                                    <option
                                                                                        @if($knt->gid == $item->makhutro)
                                                                                            {{"selected"}}
                                                                                        @endif
                                                                                         value="{{$knt->gid}}">{{$knt->tennhatro}}</option>
                                                                                    @endforeach

                                                                                </select>
                                                                        </div>

                                                                        <div class="form-group col-6">
                                                                            <label
                                                                                class="col-form-label font-weight-bold">Quyền</label>
                                                                                <select name="quyen" class="form-control">
                                                                                    <option selected hidden value="{{$item->quyen}}">{{ $item->quyen===0 ? 'Chủ trọ' : 'Admin' }}</option>

                                                                                    <option value="0">Chủ trọ</option>
                                                                                    <option value="1">Admin</option>

                                                                                </select>
                                                                        </div>
                                                                    </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-success">Xác nhận</button>
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Đóng</button>

                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- End modal sửa -->

                                                <!-- Modal xóa -->
                                                <form action="{{route('xoaTK',['id' => $item->id])}}"
                                                            method="post">
                                                @csrf
                                                <div class="modal fade" id="{{$xoa}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h2 class="modal-title" id="deleteModalLabel">Xóa Tài Khoản</h3>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <h5>Bạn có chắc muốn xóa tài khoản <span>"{{$item->tendangnhap}}"</span></h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                                                <button type="button" class="btn btn-default float-left"
                                                                    data-dismiss="modal">Hủy</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                                <!-- End modal xóa -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                {{ $taikhoan->links() }}

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
@endsection
