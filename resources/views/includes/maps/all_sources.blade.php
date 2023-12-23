<div id="Map" style="width:100%; height:250px"></div>
<script src="{{ asset('openlayers/OpenLayers.js') }}"></script>
<script>

    var zoom           = 10;

    var fromProjection = new OpenLayers.Projection("EPSG:4326");   // Transform from WGS 1984
    var toProjection   = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection

    map = new OpenLayers.Map("Map");
    var mapnik         = new OpenLayers.Layer.OSM();
    map.addLayer(mapnik);

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);

    @foreach($sources as $key => $source)
        var {{ 'position_' . strval($key) }}       = new OpenLayers.LonLat({{ $source->lon }}, {{ $source->lat }}).transform( fromProjection, toProjection);
        markers.addMarker(new OpenLayers.Marker( {{ 'position_' . strval($key) }} ));
    @endforeach
    map.setCenter(position_0, zoom);
</script>
