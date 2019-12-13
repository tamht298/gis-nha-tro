var baseLayer = new ol.layer.Group({
    'title': 'Base maps',
    layers: [
new ol.layer.Tile({
    'title': 'Stamen Toner',
    'type': 'base',
        source: new ol.source.Stamen({
        layer: 'toner'
        })
})
]
});
var format_VungRanhGioiPhuongTxTDM_region = new ol.format.GeoJSON();
var features_VungRanhGioiPhuongTxTDM_region = format_VungRanhGioiPhuongTxTDM_region.readFeatures(geojson_VungRanhGioiPhuongTxTDM_region, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_VungRanhGioiPhuongTxTDM_region = new ol.source.Vector();
jsonSource_VungRanhGioiPhuongTxTDM_region.addFeatures(features_VungRanhGioiPhuongTxTDM_region);var lyr_VungRanhGioiPhuongTxTDM_region = new ol.layer.Vector({
                source:jsonSource_VungRanhGioiPhuongTxTDM_region, 
                style: style_VungRanhGioiPhuongTxTDM_region,
                title: "VungRanhGioiPhuongTxTDM_region"
            });var format_duong_tdm_polyline = new ol.format.GeoJSON();
var features_duong_tdm_polyline = format_duong_tdm_polyline.readFeatures(geojson_duong_tdm_polyline, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_duong_tdm_polyline = new ol.source.Vector();
jsonSource_duong_tdm_polyline.addFeatures(features_duong_tdm_polyline);var lyr_duong_tdm_polyline = new ol.layer.Vector({
                source:jsonSource_duong_tdm_polyline, 
                style: style_duong_tdm_polyline,
                title: "duong_tdm_polyline"
            });var format_KhuNhaTro_TDM_point = new ol.format.GeoJSON();
var features_KhuNhaTro_TDM_point = format_KhuNhaTro_TDM_point.readFeatures(geojson_KhuNhaTro_TDM_point, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_KhuNhaTro_TDM_point = new ol.source.Vector();
jsonSource_KhuNhaTro_TDM_point.addFeatures(features_KhuNhaTro_TDM_point);var lyr_KhuNhaTro_TDM_point = new ol.layer.Vector({
                source:jsonSource_KhuNhaTro_TDM_point, 
                style: style_KhuNhaTro_TDM_point,
                title: "KhuNhaTro_TDM_point"
            });

lyr_VungRanhGioiPhuongTxTDM_region.setVisible(true);lyr_duong_tdm_polyline.setVisible(true);lyr_KhuNhaTro_TDM_point.setVisible(true);
var layersList = [baseLayer,lyr_VungRanhGioiPhuongTxTDM_region,lyr_duong_tdm_polyline,lyr_KhuNhaTro_TDM_point];
lyr_VungRanhGioiPhuongTxTDM_region.set('fieldAliases', {'tenphuong': 'tenphuong', });
lyr_duong_tdm_polyline.set('fieldAliases', {'tenduong': 'tenduong', });
lyr_KhuNhaTro_TDM_point.set('fieldAliases', {'ID': 'ID', 'TENNHATRO': 'TENNHATRO', 'TENCHUTRO': 'TENCHUTRO', 'SODIENTHOA': 'SODIENTHOA', 'DIACHI': 'DIACHI', });
lyr_VungRanhGioiPhuongTxTDM_region.set('fieldImages', {'tenphuong': 'TextEdit', });
lyr_duong_tdm_polyline.set('fieldImages', {'tenduong': 'TextEdit', });
lyr_KhuNhaTro_TDM_point.set('fieldImages', {'ID': 'TextEdit', 'TENNHATRO': 'TextEdit', 'TENCHUTRO': 'TextEdit', 'SODIENTHOA': 'TextEdit', 'DIACHI': 'TextEdit', });
lyr_VungRanhGioiPhuongTxTDM_region.set('fieldLabels', {'tenphuong': 'no label', });
lyr_duong_tdm_polyline.set('fieldLabels', {'tenduong': 'inline label', });
lyr_KhuNhaTro_TDM_point.set('fieldLabels', {'ID': 'no label', 'TENNHATRO': 'no label', 'TENCHUTRO': 'no label', 'SODIENTHOA': 'no label', 'DIACHI': 'no label', });
lyr_KhuNhaTro_TDM_point.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});