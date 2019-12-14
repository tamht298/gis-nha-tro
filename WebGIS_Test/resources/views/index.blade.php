@extends('layouts.master') @section('master')
<div class="card text-white bg-white mt-5 container">
    <div class="card-body">
        <div class="container">
            <div class="row mt-3 mb-4">
                <div class="col-md-4 m-top-ward"></div>
            </div>
            <div class="row justify-content-center ">
                <div id="map" style="height: 530px;"></div>
            </div>
            <script src="js/leaflet.js"></script>
            <script src="js/leaflet-heat.js"></script>
            <script src="js/leaflet.rotatedMarker.js"></script>
            <script src="js/OSMBuildings-Leaflet.js"></script>
            <script src="js/leaflet-hash.js"></script>
            <script src="js/Autolinker.min.js"></script>
            <script src="js/leaflet.markercluster.js"></script>
            <script src="data/VungRanhGioiPhuongTxTDMregion0.js"></script>
            <script src="data/KhuNhaTroTDMpoint1.js"></script>
            <script>
                var highlightLayer;
                function highlightFeature(e) {
                    highlightLayer = e.target;

                    if (e.target.feature.geometry.type === "LineString") {
                        highlightLayer.setStyle({
                            color: "#ffff00"
                        });
                    } else {
                        highlightLayer.setStyle({
                            fillColor: "#ffff00",
                            fillOpacity: 1
                        });
                    }
                    highlightLayer.openPopup();
                }
                L.ImageOverlay.include({
                    getBounds: function() {
                        return this._bounds;
                    }
                });
                var map = L.map("map", {
                    zoomControl: true,
                    maxZoom: 28,
                    minZoom: 1
                }).fitBounds([
                    [10.943107482, 106.487880716],
                    [11.1233258276, 106.815759718]
                ]);
                var hash = new L.Hash(map);
                map.attributionControl.addAttribution(
                    '<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a>'
                );
                var feature_group = new L.featureGroup([]);
                var bounds_group = new L.featureGroup([]);
                var raster_group = new L.LayerGroup([]);
                var basemap0 = L.tileLayer(
                    "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                    {
                        attribution:
                            '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
                        maxZoom: 28
                    }
                );
                basemap0.addTo(map);
                function setBounds() {
                    map.setMaxBounds(map.getBounds());
                }
                function geoJson2heat(geojson, weight) {
                    return geojson.features.map(function(feature) {
                        return [
                            feature.geometry.coordinates[1],
                            feature.geometry.coordinates[0],
                            feature.properties[weight]
                        ];
                    });
                }
                function pop_VungRanhGioiPhuongTxTDMregion0(feature, layer) {
                    layer.on({
                        mouseout: function(e) {
                            layer.setStyle(
                                style_VungRanhGioiPhuongTxTDMregion0(feature)
                            );

                            if (typeof layer.closePopup == "function") {
                                layer.closePopup();
                            } else {
                                layer.eachLayer(function(feature) {
                                    feature.closePopup();
                                });
                            }
                        },
                        mouseover: highlightFeature
                    });
                    var popupContent =
                        '<table>\
                    <tr>\
                        <td colspan="2">' +
                        (feature.properties["tenphuong"] !== null
                            ? Autolinker.link(
                                  String(feature.properties["tenphuong"])
                              )
                            : "") +
                        "</td>\
                    </tr>\
                </table>";
                    layer.bindPopup(popupContent);
                }

                function style_VungRanhGioiPhuongTxTDMregion0(feature) {
                    switch (feature.properties["tenphuong"]) {
                        case "CHANH MY":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(68,1,84,1.0)"
                            };
                            break;
                        case "DINH HOA":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(72,28,110,1.0)"
                            };
                            break;
                        case "HIEP AN":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(69,53,128,1.0)"
                            };
                            break;
                        case "HIEP THANH":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(61,76,137,1.0)"
                            };
                            break;
                        case "HOA PHU":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(51,97,141,1.0)"
                            };
                            break;
                        case "PHU CUONG":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(42,116,142,1.0)"
                            };
                            break;
                        case "PHU HOA":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(35,134,142,1.0)"
                            };
                            break;
                        case "PHU LOI":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(30,153,138,1.0)"
                            };
                            break;
                        case "PHU MY":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(37,171,129,1.0)"
                            };
                            break;
                        case "PHU TAN":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(63,189,114,1.0)"
                            };
                            break;
                        case "PHU THO":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(103,203,92,1.0)"
                            };
                            break;
                        case "TAN AN":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(151,216,62,1.0)"
                            };
                            break;
                        case "TUONG BINH HIEP":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(203,225,30,1.0)"
                            };
                            break;
                        case "":
                            return {
                                pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                                opacity: 1,
                                color: "rgba(0,0,0,1.0)",
                                dashArray: "",
                                lineCap: "butt",
                                lineJoin: "miter",
                                weight: 1.0,
                                fillOpacity: 1,
                                fillColor: "rgba(253,231,37,1.0)"
                            };
                            break;
                    }
                }
                map.createPane("pane_VungRanhGioiPhuongTxTDMregion0");
                map.getPane(
                    "pane_VungRanhGioiPhuongTxTDMregion0"
                ).style.zIndex = 600;
                map.getPane("pane_VungRanhGioiPhuongTxTDMregion0").style[
                    "mix-blend-mode"
                ] = "normal";
                var layer_VungRanhGioiPhuongTxTDMregion0 = new L.geoJson(
                    json_VungRanhGioiPhuongTxTDMregion0,
                    {
                        pane: "pane_VungRanhGioiPhuongTxTDMregion0",
                        onEachFeature: pop_VungRanhGioiPhuongTxTDMregion0,
                        style: style_VungRanhGioiPhuongTxTDMregion0
                    }
                );
                bounds_group.addLayer(layer_VungRanhGioiPhuongTxTDMregion0);
                feature_group.addLayer(layer_VungRanhGioiPhuongTxTDMregion0);
                function pop_KhuNhaTroTDMpoint1(feature, layer) {
                    layer.on({
                        mouseout: function(e) {
                            layer.setStyle(style_KhuNhaTroTDMpoint1(feature));

                            if (typeof layer.closePopup == "function") {
                                layer.closePopup();
                            } else {
                                layer.eachLayer(function(feature) {
                                    feature.closePopup();
                                });
                            }
                        },
                        mouseover: highlightFeature
                    });
                    var popupContent =
                        '<table>\
                    <tr>\
                        <td colspan="2">' +
                        (feature.properties["TENNHATRO"] !== null
                            ? Autolinker.link(
                                  String(feature.properties["TENNHATRO"])
                              )
                            : "") +
                        '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' +
                        (feature.properties["TENCHUTRO"] !== null
                            ? Autolinker.link(
                                  String(feature.properties["TENCHUTRO"])
                              )
                            : "") +
                        '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' +
                        (feature.properties["SODIENTHOA"] !== null
                            ? Autolinker.link(
                                  String(feature.properties["SODIENTHOA"])
                              )
                            : "") +
                        '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2">' +
                        (feature.properties["DIACHI"] !== null
                            ? Autolinker.link(
                                  String(feature.properties["DIACHI"])
                              )
                            : "") +
                        "</td>\
                    </tr>\
                </table>";
                    layer.bindPopup(popupContent);
                }

                function style_KhuNhaTroTDMpoint1() {
                    return {
                        pane: "pane_KhuNhaTroTDMpoint1",
                        radius: 6.0,
                        opacity: 1,
                        color: "rgba(0,0,0,1.0)",
                        dashArray: "",
                        lineCap: "butt",
                        lineJoin: "miter",
                        weight: 1,
                        fillOpacity: 1,
                        fillColor: "rgba(227,26,28,1.0)"
                    };
                }
                map.createPane("pane_KhuNhaTroTDMpoint1");
                map.getPane("pane_KhuNhaTroTDMpoint1").style.zIndex = 601;
                map.getPane("pane_KhuNhaTroTDMpoint1").style["mix-blend-mode"] =
                    "normal";
                var layer_KhuNhaTroTDMpoint1 = new L.geoJson(
                    json_KhuNhaTroTDMpoint1,
                    {
                        pane: "pane_KhuNhaTroTDMpoint1",
                        onEachFeature: pop_KhuNhaTroTDMpoint1,
                        pointToLayer: function(feature, latlng) {
                            return L.circleMarker(
                                latlng,
                                style_KhuNhaTroTDMpoint1(feature)
                            )
                                .bindTooltip(
                                    feature.properties["TENNHATRO"] !== null
                                        ? String(
                                              "<div style=\"color: #000000; font-size: 8pt; font-family: 'MS Shell Dlg 2', sans-serif;\">" +
                                                  feature.properties[
                                                      "TENNHATRO"
                                                  ]
                                          ) + "</div>"
                                        : "",
                                    {
                                        permanent: true,
                                        offset: [-0, -16],
                                        className: "css_KhuNhaTroTDMpoint1"
                                    }
                                )
                                .openTooltip();
                        }
                    }
                );
                bounds_group.addLayer(layer_KhuNhaTroTDMpoint1);
                feature_group.addLayer(layer_KhuNhaTroTDMpoint1);
                raster_group.addTo(map);
                feature_group.addTo(map);
                var baseMaps = { OSM: basemap0 };
                L.control
                    .layers(
                        baseMaps,
                        {
                            '<img src="legend/KhuNhaTroTDMpoint1.png" /> KhuNhaTro_TDM_point': layer_KhuNhaTroTDMpoint1,
                            'VungRanhGioiPhuongTxTDM_region<br /><table><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_CHANHMY0.png" /></td><td>CHANH MY</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_DINHHOA1.png" /></td><td>DINH HOA</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_HIEPAN2.png" /></td><td>HIEP AN</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_HIEPTHANH3.png" /></td><td>HIEP THANH</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_HOAPHU4.png" /></td><td>HOA PHU</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHUCUONG5.png" /></td><td>PHU CUONG</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHUHOA6.png" /></td><td>PHU HOA</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHULOI7.png" /></td><td>PHU LOI</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHUMY8.png" /></td><td>PHU MY</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHUTAN9.png" /></td><td>PHU TAN</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_PHUTHO10.png" /></td><td>PHU THO</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_TANAN11.png" /></td><td>TAN AN</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_TUONGBINHHIEP12.png" /></td><td>TUONG BINH HIEP</td></tr><tr><td style="text-align: center;"><img src="legend/VungRanhGioiPhuongTxTDMregion0_13.png" /></td><td></td></tr></table>': layer_VungRanhGioiPhuongTxTDMregion0
                        },
                        { collapsed: false }
                    )
                    .addTo(map);
                setBounds();
            </script>
        </div>
    </div>
</div>
@endsection
