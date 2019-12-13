var size = 0;
function categories_VungRanhGioiPhuongTxTDM_region(feature, value) {
                switch(value) {case "CHANH MY":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(68,1,84,1.0)'})
    })];
                    break;
case "CHANH NGHIA":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(72,26,108,1.0)'})
    })];
                    break;
case "DINH HOA":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(69,49,126,1.0)'})
    })];
                    break;
case "HI?P AN":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(63,71,136,1.0)'})
    })];
                    break;
case "HIEP THANH":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(54,91,140,1.0)'})
    })];
                    break;
case "HOA PHU":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(45,109,142,1.0)'})
    })];
                    break;
case "PHU CUONG":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(39,127,142,1.0)'})
    })];
                    break;
case "PHU HOA":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(32,144,140,1.0)'})
    })];
                    break;
case "PHU LOI":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(31,161,135,1.0)'})
    })];
                    break;
case "PHU MY":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(44,177,124,1.0)'})
    })];
                    break;
case "PHU TAN":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(74,193,108,1.0)'})
    })];
                    break;
case "PHU THO":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(112,207,86,1.0)'})
    })];
                    break;
case "TAN AN":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(158,217,57,1.0)'})
    })];
                    break;
case "TUONG BINH HIEP":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(206,225,28,1.0)'})
    })];
                    break;
case "":
                    return [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(0,0,0,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 0}), fill: new ol.style.Fill({color: 'rgba(253,231,37,1.0)'})
    })];
                    break;}};
var styleCache_VungRanhGioiPhuongTxTDM_region={}
var style_VungRanhGioiPhuongTxTDM_region = function(feature, resolution){
    var value = feature.get("tenphuong");
    var style = categories_VungRanhGioiPhuongTxTDM_region(feature, value);
    if (feature.get("tenphuong") !== null) {
        var labelText = String(feature.get("tenphuong"));
    } else {
        var labelText = ""
    }
    var key = value + "_" + labelText

    if (!styleCache_VungRanhGioiPhuongTxTDM_region[key]){
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
        styleCache_VungRanhGioiPhuongTxTDM_region[key] = new ol.style.Style({"text": text})
    }
    var allStyles = [styleCache_VungRanhGioiPhuongTxTDM_region[key]];
    allStyles.push.apply(allStyles, style);
    return allStyles;
};