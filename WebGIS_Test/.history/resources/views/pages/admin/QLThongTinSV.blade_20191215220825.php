@extends('layouts.master-admin')
@section('title','Quản lý sinh viên')
@section('master-admin')
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>

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
                        <a class="nav-link active" href="#"><i class="fa fa-list" aria-hidden="true"></i>Quản lý
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

            <div class=" mb-3"></div>
            <div class="card">
                <div class=" card-header">
                    <div class="row">
                        <div class="col-md-6 float-left" style="font-size: 20px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-primary" href="trang-quan-tri">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Quản lý thông tin sinh
                                        viên</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- Search bar -->

                        <div class="col-md-4 navbar-nav">
                            <form action="./tim-kiem-sinh-vien" method="GET">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" name="search" type="text" placeholder="Search..">
                            </div>
                        </form>
                        </div>

                        <!-- End search bar -->
                        <div class="col-md-2 d-flex align-items-center">
                            <button class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                    class="fa fa-plus"></i> Thêm</button>

                            <!-- Modal thêm -->


                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                                aria-labelledby="addModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="addModalLabel">Thêm Thông Tin Sinh Viên</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="themSV" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">MSSV<span
                                                                class="text-danger"> (*)</span></label>
                                                        <input type="text" name="mssv" class="form-control">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Số
                                                            điện thoại<span class="text-danger"> (*)</span></label>
                                                        <input type="text" name="dienthoai" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Họ
                                                            <span class="text-danger"> (*)</span></label>
                                                        <input type="text" name="ho" class="form-control">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Email<span
                                                                class="text-danger"> (*)</span></label>
                                                        <input type="text" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Tên
                                                            sinh viên<span class="text-danger"> (*)</span></label>
                                                        <input type="text" name="ten" class="form-control">
                                                    </div>

                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Giới
                                                            tính:</label>
                                                        <select name="gioitinh" class="form-control">
                                                            <option value="Nam">Nam</option>
                                                            <option value="Nữ">Nữ</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Lớp<span
                                                                class="text-danger"> (*)</span></label>
                                                        <select name="lop" class="form-control">
                                                            <option value="D16HT01">D16HT01</option>
                                                            <option value="D16PM01">D16PM01</option>
                                                            <option value="D16PM02">D16PM02</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-6">
                                                        <label class="col-form-label font-weight-bold">Ngày
                                                            sinh:</label>
                                                        <input type="date" name="ngaysinh" class="form-control">
                                                    </div>

                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" value="Thêm">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- End modal thêm -->
                    </div>


                    </div>



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
                                    <th scope="col">#</th>
                                    <th scope="col">MSSV</th>
                                    <th scope="col">Tên sinh viên</th>
                                    <th scope="col">Lớp</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1 ?>
                                @foreach ($student as $item)
                                <?php $them = $item->mssv."them";
                                        $sua = $item->mssv."sua";
                                        $xoa = $item->mssv."xoa"; ?>
                                <tr>

                                    <th scope="row">{{$i++ + ($student->currentPage() -1)* $pageSize }}</th>
                                    <td>{{$item->mssv}}</td>
                                    <td><form  action="thong-tin-tro" class="mb-0" method="post">
                                        @csrf
                                        <input type="hidden" name="getmssv" value="{{$item->mssv}}">
                                        <input type="submit" class="btn btn-link pl-0" style="font-size: 1rem" value="{{$item->ho}} {{$item->ten}}" data-toggle="tooltip" data-html="true"
                                        data-placement="top" title="Chi tiết quá trình trọ">
                                        </button>
                                            </form>
                                            </td>
                                    <td>{{$item->lop}}</td>
                                    <td>{{$item->dienthoai}}</td>
                                    <td>
                                        <span data-toggle="modal" data-target="#{{$them}}">
                                            <a href="#" class="text-dark" data-toggle="tooltip" data-html="true"
                                                data-placement="left" title="Chi tiết"><i class="fas fa-eye fa-lg"></i>
                                            </a>
                                        </span>
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

                                        <!-- Modal chi tiết -->

                                        <div class="modal fade" id="{{$them}}" tabindex="-1" role="dialog"
                                            aria-labelledby="detailModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="detailModalLabel">Thông
                                                            Tin Chi Tiết Sinh Viên</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">MSSV:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->mssv}}" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Tên
                                                                        sinh viên:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="tensv-name"
                                                                        value="{{$item->ho}} {{$item->ten}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Số
                                                                        điện thoại:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->dienthoai}}" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Ngày
                                                                        sinh:</label>
                                                                    <input type="date" class="form-control"
                                                                        value="{{$item->ngaysinh}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Giới
                                                                        tính:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->gioitinh}}" disabled>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->email}}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">Lớp:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="tensv-name" value="{{$item->lop}}" disabled>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sencondary"
                                                            data-dismiss="modal">Đóng</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- End modal chi tiết -->

                                        <!-- Modal sửa -->

                                        <div class="modal fade" id="{{$sua}}" tabindex="-1" role="dialog"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('suaSV',['mssv' => $item->mssv])}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="editModalLabel">Sửa Thông
                                                                Tin Sinh Viên</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">MSSV:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->mssv}}" name="mssv">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">Họ:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->ho}}" name="ho">
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">Tên:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->ten}}" name="ten">
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Ngày
                                                                        sinh:</label>
                                                                    <input type="date" class="form-control"
                                                                        value="{{$item->ngaysinh}}" name="ngaysinh">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Giới
                                                                        tính:</label>

                                                                    <select name="gioitinh" class="form-control">
                                                                        <option selected hidden value="{{$item->gioitinh}}">{{ $item->gioitinh=='Nam' ? 'Nam' : 'Nữ' }}</option>

                                                                        <option value="Nam">Nam</option>
                                                                        <option value="Nữ">Nữ</option>

                                                                    </select>


                                                                </div>

                                                                {{-- <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Giới
                                                                        tính:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->gioitinh}}" name="gioitinh">
                                                                </div> --}}
                                                                <div class="form-group col-6">
                                                                    <label
                                                                        class="col-form-label font-weight-bold">Email:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->email}}" name="email">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Lớp<span
                                                                            class="text-danger"> (*)</span></label>
                                                                    <select name="lop" class="form-control">
                                                                        <option value="D16HT01">D16HT01</option>
                                                                        <option value="D16PM01">D16PM01</option>
                                                                        <option value="D16PM02">D16PM02</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-6">
                                                                    <label class="col-form-label font-weight-bold">Số
                                                                        điện thoại:</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{$item->dienthoai}}" name="dienthoai">
                                                                </div>
                                                                <!-- <div class="form-group col-6">

                                                                            <label
                                                                                class="col-form-label font-weight-bold">Khoa:</label>
                                                                            <input type="text" class="form-control"
                                                                                value="KT-CN">
                                                                        </div> -->
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">


                                                            <button type="submit" class="btn btn-success">Sửa</button>
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
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="deleteModalLabel">Xóa Thông
                                                            Tin Sinh Viên</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body mx-auto">
                                                        <span>Bạn có chắc muốn xóa sinh viên này?</span>
                                                    </div>
                                                    <div class="modal-footer float-left ">
                                                        <form action="{{ route('xoaSV',['mssv' => $item->mssv])}}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                            <button type="button" class="btn btn-default "
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
                        {{ $student->links() }}

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
