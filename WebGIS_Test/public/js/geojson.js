
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
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Tân An</div>');
    },
    color: '#555555',
    fillColor: '#8080ff',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongHIEPAN = L.geoJson(HIEPAN, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Hiệp An</div>');
    },
    color: '#555555',
    fillColor: '#808080',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongHIEPTHANH = L.geoJson(HIEPTHANH, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Hiệp Thành</div>');
    },
    color: '#555555',
    fillColor: '#ff8000',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongTUONGBINHHIEP = L.geoJson(TUONGBINHHIEP, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Tương Bình Hiệp</div>');
    },
    color: '#555555',
    fillColor: '#ff0080',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongCHANHMY = L.geoJson(CHANHMY, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Chánh Mỹ</div>');
    },
    color: '#555555',
    fillColor: '#ffff80',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongDINHHOA = L.geoJson(DINHHOA, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Định Hoà</div>');
    },
    color: '#555555',
    fillColor: '#008000',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongCHANHNGHIA = L.geoJson(CHANHNGHIA, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Chánh Nghĩa</div>');
    },
    color: '#555555',
    fillColor: '#804040',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHUCUONG = L.geoJson(PHUCUONG, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Cường</div>');
    },
    color: '#555555',
    fillColor: '#400040',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongHOAPHU = L.geoJson(HOAPHU, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Hoà Phú</div>');
    },
    color: '#555555',
    fillColor: '#ff8080',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHULOI = L.geoJson(PHULOI, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Lợi</div>');
    },
    color: '#555555',
    fillColor: '#00ff80',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHUHOA = L.geoJson(PHUHOA, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Hoà</div>');
    },
    color: '#555555',
    fillColor: '#008080',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHUTHO = L.geoJson(PHUTHO, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Thọ</div>');
    },
    color: '#555555',
    fillColor: '#00ffff',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHUTAN = L.geoJson(PHUTAN, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Tân</div>');
    },
    color: '#555555',
    fillColor: '#0080c0',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);

var phuongPHUMY = L.geoJson(PHUMY, {
    onEachFeature: function (feature, layer)
    {
        layer.bindPopup('<div style="font-weight: bold;">Phú Mỹ</div>');
    },
    color: '#555555',
    fillColor: '#808000',
    fillOpacity: 0.3,
    radius: 500
}).addTo(map);