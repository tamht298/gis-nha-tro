<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">


    <style>
        html, body {
            background-color: #ffffff;

        }
        li.dropdown:hover > ul.dropdown-menu {
                color: red;
                display: block;
                border: none;
        }
        </style>
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="css/leaflet.css" />
        <link rel="stylesheet" type="text/css" href="css/qgis2web.css">
        <link rel="stylesheet" href="css/MarkerCluster.css" />
        <link rel="stylesheet" href="css/MarkerCluster.Default.css" />
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
        <title></title>
</head>

<body class="bg-transparent">
    <header class="bg-blue fixed-top">
        <div class="container" id="banner">
            <div class="row img-panel">
                <img src="{{asset('template/images/banner_tdmu.png')}}" class="img-fluid" alt="banner index">
            </div>
        </div>
        <div class="nav bg-nav-blue" id="myHeader">
            <div class="container ">
                <nav class="navbar navbar-expand-lg p-0 navbar-light ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse navbar-custom" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto font-weight-bold ">
                            <li class="nav-item active mr-1 p-1">
                                <a class="nav-link text-white navbar-text" href="trang-chu"><i class="fas fa-home"></i>
                                    Trang
                                    chủ
                                    <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item mr-1 p-1">
                                <a class="nav-link text-white navbar-text" href="trang-tin"><i
                                        class="fas fa-file-alt"></i> Bài Viết</a>
                            </li>

                            <li class="nav-item mr-1 p-1">
                                <a class="nav-link text-white navbar-text" href="lien-he"><i
                                        class="fas fa-address-book"></i> Liên Hệ</a>
                            </li>
                            @if(session()->has('tendn'))
                            <li class="nav-item mr-1 p-1 dropdown">

                                <a class="nav-link text-white navbar-text dropdown-toggle" data-toggle="dropdown"
                                    href="#"><i class="fas fa-file-alt"></i> Quản lý trọ </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="nav-link" href="thong-tin-chu-tro">Thông tin chủ trọ</a></li>
                                    <li><a class="nav-link" href="danh-sach-tro">Danh sách sinh viên</a></li>
                                    <li><a class="nav-link" href="danh-sach-bai-viet">Quản lý bài viết</a></li>
                                </ul>


                            </li>
                            <li class="nav-item mr-1 p-1" style="position: relative;">
                                <a class="nav-link text-white navbar-text" href="#"> Xin chào, {{session('tendn')}} </a>
                            </li>
                            <li class="nav-item mr-1 p-1" style="position: relative;">
                                <a class="nav-link text-white navbar-text" href="doi-mat-khau">Đổi mật khẩu</a>
                            </li>
                            <li class="nav-item mr-1 p-1" style="position: relative;">
                                <a class="nav-link text-white navbar-text" href="thoat"> <i
                                        class="fas fa-power-off"></i> thoát </a>
                            </li>
                            @else
                            <li class="nav-item mr-1 p-1">

                            <a class="nav-link text-white navbar-text" href="login"><i  class="fas fa-user"></i> Đăng nhập </a>

                        </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>
    <div class="jumbotron content mt-6">
        @yield('master')

    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4" style="background-color: rgb(66, 135, 245); color: #fff;">
        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">
                    <!-- Content -->
                    <h6 class="text-uppercase"><b>Phòng Công tác Sinh viên – Trường Đại học Thủ Dầu Một</b></h6>
                    <ul class="">
                        <li class="nav-item">
                            <p>Địa chỉ: Tòa nhà làm việc của Phòng, Ban, Viện và các Khoa - Khu H3</p>
                        </li>
                        <li class="nav-item">

                            <p>Số 06 Trần Văn Ơn, phường Phú Hòa, tp Thủ Dầu Một, tỉnh Bình Dương</p>
                        </li>
                        <li class="nav-item">
                            <p>Điện thoại: (0274)3822 518 - Số nội bộ 115</p>
                        </li>
                        <li class="nav-item">
                            <p>Website: congtacsinhvien.tdmu.edu.vn</p>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
        <hr class="separate py-0">
        <!-- Copyright -->
        <div class="footer-copyright text-center pb-2">© 2019 Copyright
            <a href="https://mdbootstrap.com/education/bootstrap/"> </a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
    <script src="{{asset('template/js/scroll-to-top.js')}}">
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace('editor1'); </script>
    <script>CKEDITOR.replace('editor2'); </script>
    <script>CKEDITOR.replace('editor3'); </script>
    <script>CKEDITOR.replace('editor4'); </script>
    <script>CKEDITOR.replace('editor5'); </script>
    <script src="template/js/fade-alert.js"></script>
</body>
</html>
