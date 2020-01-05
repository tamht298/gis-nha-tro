
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
        var csrf = "<?php echo @csrf; ?>";
        popup
        .setLatLng(e.latlng)
        .setContent("<form class='form-group' action='themNhakhutro' method='POST'>"+csrf+" Tên nhà trọ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtTennhatro'> <br> Tên chủ trọ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtTenchutro'> <br> Điện thoại:<br> <input type='text' class='form-control' style='height: 1%;' name='txtSodienthoai'> <br> Địa chỉ:<br> <input type='text' class='form-control' style='height: 1%;' name='txtDiachi'> <br><input type='hidden' name='txtGeom'><input type='submit' class='btn btn-success btn-xs form-control' name='txtThem' value='Thêm Khu Trọ'> <br></form>" + e.latlng.toString())
        .openOn(map);
            //alert("Toa do vua chon la: " + e.latlng.toString());
    }
map.on('click',onMapClick);