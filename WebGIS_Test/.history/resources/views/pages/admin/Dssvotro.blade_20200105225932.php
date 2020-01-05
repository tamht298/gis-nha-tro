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
                        <a class="nav-link" href="../trang-quan-tri"><i class="fas fa-home"></i>Dashboard</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../danhsachSV"><i class="fa fa-list" aria-hidden="true"></i>Quản lý
                            thông tin sinh viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fa fa-fw fa-rocket"></i>Quản lý khu
                            trọ</a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="../QLDSKhuNhaTro"><i class="fa fa-fw fa-rocket"></i>Bản đồ quản lý khu
                                    trọ</a>

                            </li>
                    <li class="nav-item">

                        <a class="nav-link" href="../quan-ly-bai-viet"><i class="far fa-file"></i>Quản lý bài
                            viết</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1-2" aria-controls="submenu-1-2"><i
                                class="far fa-calendar-minus"></i>Quản lý thống kê</a>
                        <div id="submenu-1-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="../thong-ke-theo-phuong">Thống kê theo phường</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../thong-ke-theo-chu-tro">Thống kê theo chủ trọ</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../quan-ly-tai-khoan"><i class="fa fa-fw fa-rocket"></i>Quản lý tài
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
                                <li class="breadcrumb-item"><a class="text-primary" href="../trang-quan-tri/">Dashboard</a>
                                </li>
                            <li class="breadcrumb-item"><a class="text-primary" href="../quan-ly-khu-tro/">Quản lý khu trọ</a>
                                </li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách sinh viên tại nhà trọ
                                @foreach ($tenkhutro as $item)
                                    {{$item}}
                                @endforeach
                            </li>
                            </ol>
                        </nav>
                    </div>

                </div>

                <!-- <div class="table table-reponsive"> -->
                <div class="card-body">
                    <div class="row table-responsive mx-auto" style="font-size: 16px">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Mã sinh viên</th>
                                    <th scope="col">Tên sinh viên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày đến</th>
                                    <th scope="col">Số phòng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1
                                ?>
                                @foreach ($dsSVOtro as $dssv )
                                <tr>
                                    <td scope="row">{{$i++}}</th>
                                    <td scope="row" class="text-center">{{$dssv->mssv}}</td>
                                    <td scope="row">{{$dssv->ho}} {{$dssv->ten}}</td>
                                    <td scope="row" >{{$dssv->gioitinh}}</td>
                                    <td scope="row">{{$dssv->ngayden}}</td>
                                    <td scope="row">{{$dssv->sophong}}</td>
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

