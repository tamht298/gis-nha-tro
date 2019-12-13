var size = 0;

var styleCache_KhuNhaTro_TDM_point={}
var style_KhuNhaTro_TDM_point = function(feature, resolution){
    var value = ""
    var size = 0;
    var style = [ new ol.style.Style({
        image: new ol.style.Circle({radius: 6.0 + size,
            stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(255,127,0,1.0)'})})
    })];
    if (feature.get("TENNHATRO") !== null) {
        var labelText = String(feature.get("TENNHATRO"));
    } else {
        var labelText = ""
    }
    var key = value + "_" + labelText

    if (!styleCache_KhuNhaTro_TDM_point[key]){
        var text = new ol.style.Text({
              font: '10.725px \'MS Shell Dlg 2\', sans-serif',
              text: labelText,
              textBaseline: "center",
              textAlign: "left",
              offsetX: 5,
              offsetY: 3,
              fill: new ol.style.Fill({
                color: 'rgba(227, 26, 28, 255)'
              }),
            });
        styleCache_KhuNhaTro_TDM_point[key] = new ol.style.Style({"text": text})
    }
    var allStyles = [styleCache_KhuNhaTro_TDM_point[key]];
    allStyles.push.apply(allStyles, style);
    return allStyles;
};