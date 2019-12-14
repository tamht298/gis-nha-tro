@extends('layouts.master')

@section('master')
<div class="card text-white bg-white mt-5 container">
    <div class="card-body">
        <div class="container">
            <div class="row mt-3 mb-4">
                <div class="col-md-4 m-top-ward">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="" class="mr-1 text-label">Chọn phường</label>
                            <select class="custom-select" name="" id="">
                                <option selected>Select one</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>

                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center ">
                <div id="map" style="color:black">
                    <div id="popup" class="ol-popup">
                        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                        <div id="popup-content"></div>
                    </div>
                </div>
                <script src="resources/polyfills.js"></script>
                <script src="./resources/ol.js"></script>
                <script src="http://cdn.polyfill.io/v2/polyfill.min.js?features=Element.prototype.classList,URL">
                </script>
                <script src="resources/horsey.min.js"></script>
                <script src="resources/ol3-search-layer.min.js"></script>
                <script src="./resources/ol3-layerswitcher.js"></script>
                <script src="layers/VungRanhGioiPhuongTxTDM_region.js"></script>
                <script src="layers/duong_tdm_polyline.js"></script>
                <script src="layers/KhuNhaTro_TDM_point.js"></script>
                <script src="styles/VungRanhGioiPhuongTxTDM_region_style.js"></script>
                <script src="styles/duong_tdm_polyline_style.js"></script>
                <script src="styles/KhuNhaTro_TDM_point_style.js"></script>
                <script src="./layers/layers.js" type="text/javascript"></script>
                <script src="./resources/qgis2web.js"></script>
                <script src="./resources/Autolinker.min.js"></script>
            </div>
        </div>
    </div>
</div>
@endsection
