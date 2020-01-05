@extends('layouts.master')
@section('master')
<div class="card text-white bg-white mt-5 container">
    <div class="card-body">
        <div class="container">
            <div class="row mt-3 mb-4">
                <div class="col-md-4 m-top-ward"></div>
            </div>
            <div class="row justify-content-center ">
                <div id="mapid" style="height: 530px;"></div>
            </div>
            
            <!-- Make sure you put this AFTER Leaflet's CSS -->
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
                                                    @foreach ($dsNhatro as $nhatro )
                                                    {
                                                        "type": "Feature",
                                                        "properties": {
                                                            "marker-color": "#ff0000",
                                                            "marker-size": "medium",
                                                            "marker-symbol": "",
                                                            "tennhatro": "\"{{$nhatro->tennhatro}}\"",
                                                            "tenchutro": "\"{{$nhatro->tenchutro}}\"",
                                                            "dienthoai": "0"+{{$nhatro->sodienthoai}},
                                                            "diachi": "\"{{$nhatro->diachi}}\""
                                                        },
                                                        "geometry": {
                                                            "type": "Point",
                                                            "coordinates": [
                                                                {{$nhatro->x}},
                                                                {{$nhatro->y}}
                                                            ]
                                                        }
                                                    },
                                                    @endforeach
                                                ]
                                            };
                </script>
            <script src="./js/geojsondata.js"></script>
            <script src="./js/geojson.js"></script>
        </div>
    </div>
</div>
@endsection