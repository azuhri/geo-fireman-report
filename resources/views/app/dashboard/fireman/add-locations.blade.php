@extends('app.dashboard.template.master')
@section('dashboard_title')
    Tambah Titik Lokasi
@endsection
@section('dashboard_css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
@endsection
@section('dashboard_content')
    <div class="h-screen">
        <p class="mt-4 font-bold relative">Titik Lokasi Unit Kebakaran</p>
        <div class="w-full flex justify-end">
            <small id="latlong" class="font-bold text-[10px]" style="display: none"></small>
        </div>
        <div id="map" class="min-h-[300px] border-2 border-slate-500 rounded-lg sm:min-w-[300px]  md:min-h-[300px] max-w-[600px]"></div>
        <form action="{{route('fireman.geolocation.post')}}" method="post">
            @csrf
            <input type="hidden"  name="latitude" id="latitude">
            <input type="hidden"  name="longitude" id="longitude">
            <button id="btnSubmitTitikLokasi" class="my-2 px-4 py-2 bg-yellow-500 w-full text-white rounded-lg font-bold" disabled>SIMPAN TITIK LOKASI</button>
        </form>
    </div>
@endsection

@section('dashboard_js')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script> 
<script>
    $.Toast("Pesan","Anda belum menentukan titik lokasi kebakaran. Silahkan tambahkan titik lokasi unit kebakaran", "warning");
    var map = L.map('map').setView([-7.275612, 112.6301103], 13);
    googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        maxZoom: 30,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
    let icon = L.icon({
        iconUrl: '{{url("/")}}/icons/pin-red.png',

        iconSize:     [25, 25], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [12, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    let circle =   L.circle([-7.275612, 112.6301103], {
                        color: 'pink',
                        fillColor: '#f03',
                        fillOpacity: 0.4,
                        radius: 200
                    }).addTo(map);
    let marker =  L.marker([-7.275612, 112.6301103], {icon}).addTo(map);
    marker.setOpacity(0);          
    circle.setStyle({ fillOpacity: 0, weight: 0 });
    map.on('click', function(ev) {
        console.log(ev);
        let {lat, lng}= ev.latlng;
        $("#latlong").html(`(LatLong: ${lat}, ${lng})`)
        $("#latitude").val(lat);
        $("#longitude").val(lng);
        $("#latlong").show(500)
        $("#btnSubmitTitikLokasi").attr("disabled", false);
        marker.setLatLng([lat, lng]);
        circle.setLatLng([lat, lng]);
        marker.setOpacity(1);
        circle.setStyle({ fillOpacity: 0.4, weight: 3 });
    });

    map.on('mouseover', function() {
        map.getContainer().style.cursor = 'crosshair';
    });
</script>
@endsection