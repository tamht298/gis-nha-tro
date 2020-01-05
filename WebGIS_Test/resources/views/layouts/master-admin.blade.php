@if (!session()->has('tenadmin'))
    echo "<script>window.location='login'</script>";
@endif
<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('template-admin/Content/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Trang quản trị</title>
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
        <link rel="stylesheet" href="css/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <style>
        html, body, #mapid {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="trang-quan-tri">QUẢN LÝ TẠM TRÚ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                @if (session()->has('tenadmin'))
                                    <p class="nav-item">
                                        <span>Xin chào, <b>{{session('tenadmin')}}</b> || </span>
                                        <a class="" href="thoatadmin"><i class="fa fa-fw fa-rocket"></i>Thoát</a>
                                    </p>
                                @endif
                            </div>
                        </li>

                        <!-- <li class="nav-item text-center">
                            <div id="custom-search" class="top-search-bar">
                                <h5>Quản trị viên</h5>
                            </div>
                        </li> -->

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        @yield('master-admin')
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="template-admin/Scripts/jquery-1.10.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <!-- jquery 3.3.1 -->
    <script src="template-admin/Content/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="template-admin/Content/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="template-admin/Content/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="template-admin/Content/assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="template-admin/Content/assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="template-admin/Content/assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="template-admin/Content/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <!-- chart c3 js -->
    <script src="template-admin/Content/assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="template-admin/Content/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="template-admin/Content/assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="template/js/fade-alert.js"></script>
    <script src="{{asset('template/js/dssv.js')}}"></script>

</body>

</html>
