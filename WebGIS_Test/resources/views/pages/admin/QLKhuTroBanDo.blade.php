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
                        <a class="nav-link active" href="quan-ly-khu-tro"><i class="fa fa-fw fa-rocket"></i>Quản lý khu
                            trọ</a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="QLDSKhuNhaTro"><i class="fa fa-fw fa-rocket"></i>Bản đồ quản lý khu
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
        <!-- Nội dung -->
        <div class="container-fluid dashboard-content ">

            <div class="row justify-content-center ">
                <div id="mapid" style="height: 530px;"></div>
            </div>
            <script src="./js/leaflet.js"
                integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
                crossorigin=""></script>
            <script>
                var map = L.map('mapid').setView([10.9805, 106.6745], 13);
            </script>
            <script src="./js/geojsonbackground.js"></script>
            <script>
                var geojsonFeature = {

                    "type": "FeatureCollection",
                    "features": [
                                    @foreach($dsNhatro as $nhatro)
                                {
                                    "type": "Feature",
                                    "properties": {
                                    "marker-color": "#ff0000",
                                    "marker-size": "medium",
                                    "marker-symbol": "",
                                    "tennhatro": "\"{{$nhatro->tennhatro}}\"",
                                    "tenchutro": "\"{{$nhatro->tenchutro}}\"",
                                    "dienthoai": "0" + {{ $nhatro -> sodienthoai }},
                                    "diachi": "\"{{$nhatro->diachi}}\""
                                },
                                    "geometry": {
                                    "type": "Point",
                                    "coordinates": [
                                                {{ $nhatro-> x}},
                                                {{ $nhatro-> y}}
                                        ]
                                    }
                                },
                                    @endforeach
                                ]
                            };
            </script>
            <script src="./js/geojsondata.js"></script>
            <script>
                
                    var khutro = L.geoJson(geojsonFeature, {
                        onEachFeature: function (feature, layer) {
                            layer.bindPopup('<div style="width: 400px;">Tên nhà trọ: ' + feature.properties.tennhatro + '<br /> Tên chủ trọ: ' + feature.properties.tenchutro + '<br /> Điện thoại: ' + feature.properties.dienthoai + '<br /> Địa chỉ: ' + feature.properties.diachi+"</div>");
                        }
                    }).addTo(map);

                    function createCustomIcon(feature, latlng) {
                        let myIcon = L.icon({
                            iconUrl: './img/iconruonghoc.png',

                            iconSize: [38, 50], // size of the icon
                            iconAnchor: [22, 45], // point of the icon which will correspond to marker's location
                        })
                        return L.marker(latlng, { icon: myIcon })
                    }

                    var truonghoc =L.geoJson(geojsonSchool,{
                        pointToLayer: createCustomIcon,
                        onEachFeature: function (feature, layer)
                        {
                            layer.bindPopup('<div style="width: 360px;">Tên trường: ' + feature.properties.tentruong + '<br /> Điện thoại: '+ feature.properties.dienthoai + '<br /> Địa chỉ: '+ feature.properties.diachi+"</div>");
                        }
                    }).addTo(map);

                    var phuongTANAN = L.geoJson(TANAN, {
                        color: '#555555',
                        fillColor: '#8080ff',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongHIEPAN = L.geoJson(HIEPAN, {
                        color: '#555555',
                        fillColor: '#808080',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongHIEPTHANH = L.geoJson(HIEPTHANH, {
                        color: '#555555',
                        fillColor: '#ff8000',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongTUONGBINHHIEP = L.geoJson(TUONGBINHHIEP, {
                        color: '#555555',
                        fillColor: '#ff0080',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongCHANHMY = L.geoJson(CHANHMY, {
                        color: '#555555',
                        fillColor: '#ffff80',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongDINHHOA = L.geoJson(DINHHOA, {
                        color: '#555555',
                        fillColor: '#008000',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongCHANHNGHIA = L.geoJson(CHANHNGHIA, {
                        color: '#555555',
                        fillColor: '#804040',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHUCUONG = L.geoJson(PHUCUONG, {
                        color: '#555555',
                        fillColor: '#400040',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongHOAPHU = L.geoJson(HOAPHU, {
                        color: '#555555',
                        fillColor: '#ff8080',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHULOI = L.geoJson(PHULOI, {
                        color: '#555555',
                        fillColor: '#00ff80',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHUHOA = L.geoJson(PHUHOA, {
                        color: '#555555',
                        fillColor: '#008080',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHUTHO = L.geoJson(PHUTHO, {
                        color: '#555555',
                        fillColor: '#00ffff',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHUTAN = L.geoJson(PHUTAN, {
                        color: '#555555',
                        fillColor: '#0080c0',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var phuongPHUMY = L.geoJson(PHUMY, {
                        color: '#555555',
                        fillColor: '#808000',
                        fillOpacity: 0.3,
                        radius: 500
                    }).addTo(map);

                    var popup = L.popup();
                        function onMapClick(e)
                        {
                            popup
                            .setLatLng(e.latlng)
                            .setContent("<form class='form-group' action='themNhakhutro' method='POST'> <input type='hidden' name='_token' value='<?php echo csrf_token(); ?>'> Tên nhà trọ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtTennhatro'> <br> Tên chủ trọ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtTenchutro'> <br> Điện thoại:<br> <input type='text' class='form-control' style='height: 1%;' name='txtSodienthoai'> <br> Địa chỉ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtDiachi'> <br><input type='hidden' name='x' value='"+e.latlng.lng+"' > <br><input type='hidden' name='y' value='"+e.latlng.lat+"'><input type='submit' class='btn btn-success btn-xs form-control' name='txtThem' value='Thêm Khu Trọ'> <br></form>" + e.latlng.toString())
                            .openOn(map);
                                //alert("Toa do vua chon la: " + e.latlng.toString());
                        }
                    map.on('click',onMapClick);
            </script>

        </div>
        <!-- Kết thúc nội dung -->
    </div>
</div>
</div>
</div>
@endsection