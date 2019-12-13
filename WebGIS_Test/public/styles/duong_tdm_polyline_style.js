var size = 0;

var styleCache_duong_tdm_polyline={}
var style_duong_tdm_polyline = function(feature, resolution){
    var value = ""
    var size = 0;
    var style = [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(253,17,49,1.0)', lineDash: null, lineCap: 'square', lineJoin: 'bevel', width: 0}),
    })];
    if ("" !== null) {
        var labelText = String("");
    } else {
        var labelText = ""
    }
    var key = value + "_" + labelText

    if (!styleCache_duong_tdm_polyline[key]){
        var text = new ol.style.Text({
              font: '10.725px \'MS Shell Dlg 2\', sans-serif',
              text: labelText,
              textBaseline: "center",
              textAlign: "left",
              offsetX: 5,
              offsetY: 3,
              fill: new ol.style.Fill({
                color: 'rgba(0, 0, 0, 255)'
              }),
            });
        styleCache_duong_tdm_polyline[key] = new ol.style.Style({"text": text})
    }
    var allStyles = [styleCache_duong_tdm_polyline[key]];
    allStyles.push.apply(allStyles, style);
    return allStyles;
};