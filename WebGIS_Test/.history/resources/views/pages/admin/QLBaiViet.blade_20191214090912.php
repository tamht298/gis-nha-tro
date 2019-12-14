@extends('layouts.master-admin')
@section('title','Quản lý bài viết')
@section('master-admin')
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
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

                        <a class="nav-link active" href="#"><i class="far fa-file"></i>Quản lý bài
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


            <div class="card">
                <div class="card-header">
                    <div class="row float-left" style="font-size: 20px;">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-primary" href="Dashboard.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lý bài viết</li>
                            </ol>
                        </nav>
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
                                    <th scope="col" class="text-center">STT</th>

                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col" class="text-center">Trạng thái</th>
                                    <th scope="col" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $i=1
                                        ?>
                                @foreach ($dsBaiViet as $baiviet )
                                <?php $sua= "sua".$baiviet->id;
                                            $sua2="sua2".$baiviet->id;
                                            $sua3="sua3".$baiviet->id;
                                            $xoa = "xoa".$baiviet->id;
                                        ?>
                                <tr>
                                    <th scope="row">{{$i++ + ($dsBaiViet->currentPage() -1)* $pageSize }}</th>

                                    <td>{{$baiviet->tieude}}</td>
                                    <td class="text-wrap" style="width: 20rem">{{! $$baiviet->noidung !}}</td>
                                    <td>{{$baiviet->ngaytao}}</td>
                                    @switch($baiviet->trangthaiduyet)
                                    @case(0)
                                    <td class="text-center">
                                        <span class="text-warning mr-1" data-toggle="modal" data-target="#{{$sua}}"><i
                                                class="fas fa-dot-circle" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Chờ duyệt"></i></span>

                                    </td>
                                    {{-- modal trạng thái --}}
                                    <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('sua-trang-thai',['id' => $baiviet->id])}}"
                                                    method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="deleteModalLabel">Trạng thái bài
                                                            viết</h2>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label for="status1.{{$baiviet->id}}"><span
                                                                        class="text-success mr-1" data-toggle="modal"
                                                                        data-target="#statusModal"><i
                                                                            class="fas fa-check-circle"></i></span>Duyệt
                                                                    bài</label>
                                                                <div class="form-check">
                                                                    <input
                                                                        class="form-check-input position-static d-inline-block"
                                                                        type="radio" name="trangthai"
                                                                        id="status1.{{$baiviet->id}}" value="1" checked>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="status2.{{$baiviet->id}}"><span
                                                                        class="text-danger mr-1" data-toggle="modal"
                                                                        data-target="#statusModal"><i
                                                                            class="fas fa-ban"></i></span>Không
                                                                    duyệt</label>
                                                                <div class="form-check">
                                                                    <input
                                                                        class="form-check-input position-static d-inline-block"
                                                                        type="radio" name="trangthai"
                                                                        id="status2.{{$baiviet->id}}" value="2"
                                                                        aria-label="...">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-success float-left">Lưu</button>
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Hủy</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- end modal trạng thái --}}
                                    @break
                                    @case(1)
                                    <td class="text-center">

                                        <span class="text-success mr-1" data-toggle="modal" data-target="#{{$sua2}}"><i
                                                class="fas fa-check-circle" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Đã duyệt"></i></span>

                                    </td>


                                    {{-- end modal trạng thái --}}
                                    @break
                                    @case(2)
                                    <td class="text-center">

                                        <span class="text-danger mr-1" data-toggle="modal" data-target="#{{$sua3}}"><i
                                                class="fas fa-ban" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Không duyệt"></i></span>
                                    </td>

                                    @break
                                    @endswitch

                                    <td class="text-center">

                                        <span data-toggle="modal" data-target="#{{$xoa}}">
                                            <a href="#" class="text-danger" data-toggle="tooltip" data-placement="right"
                                                data-html="true" title="Xóa"><i class="fa fa-trash-alt fa-lg"></i></a>
                                        </span>



                                        <!-- Modal xóa -->

                                        <div class="modal fade" id="{{$xoa}}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title">Xóa bài viết</h2>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body mx-auto">
                                                        <span>Bạn có chắc muốn xóa bài viết này?</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('xoaBV',['id' => $baiviet->id])}}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger float-left">Xóa</button>
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Hủy</button>

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
                        {{ $dsBaiViet->links() }}

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
