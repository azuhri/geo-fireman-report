@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Atur Titik Damkar
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('dashboard_content')
    <div class="h-screen">
        {{-- <p class="mt-4 font-bold relative">Titik Lokasi Unit Kebakaran</p>
        <div class="w-full flex justify-end">
            <small id="latlong" class="font-bold text-[10px]" style="display: none"></small>
        </div> --}}
        <div id="map"
            class="h-full border-2 border-slate-500">
        </div>
        <form class="fixed z-[1000] w-full flex justify-center bottom-10" action="{{ route('fireman.geolocation.post') }}" method="post">
            @csrf
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <button id="btnSubmitTitikLokasi" class="my-2 flex items-center px-4 py-2 bg-orange-600 text-white rounded-full shadow font-bold w-1/2"
                disabled>
                <svg class="" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>&nbsp;&nbsp;ATUR LOKASI PEMADAM</button>
        </form>
    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        $.Toast("Pesan", "Anda belum menentukan titik lokasi kebakaran. Silahkan tambahkan titik lokasi unit kebakaran",
            "warning");

        var map = L.map('map').setView([-7.275612, 112.6301103], 13);
        let tileMap = 'http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}';
        let googleTerrain = L.tileLayer(tileMap, {
            maxZoom: 30,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        let icon = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-blue.png',

            iconSize: [25, 25], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        let circle = L.circle([-7.275612, 112.6301103], {
            color: 'pink',
            fillColor: '#f03',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let marker = L.marker([-7.275612, 112.6301103], {
            icon
        }).addTo(map);
        marker.setOpacity(0);
        circle.setStyle({
            fillOpacity: 0,
            weight: 0
        });
        map.on('click', function(ev) {
            console.log(ev);
            let {
                lat,
                lng
            } = ev.latlng;
            $("#latlong").html(`(LatLong: ${lat}, ${lng})`)
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            $("#latlong").show(500)
            $("#btnSubmitTitikLokasi").attr("disabled", false);
            circle.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
            marker.setOpacity(1);
            marker.setLatLng([lat, lng]);
            circle.setLatLng([lat, lng]);
        });

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });
        const getLocationsUser = () => {
            if ("geolocation" in navigator) {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    let lat = position.coords.latitude;
                    let lng = position.coords.longitude;
                    marker.setLatLng([lat, lng])
                    circle.setLatLng([lat, lng])
                    $("#latlong").html(`(LatLong: ${lat}, ${lng})`)
                    $("#latitude").val(lat);
                    $("#longitude").val(lng);
                    $("#latlong").show(500)
                    $("#btnSubmitTitikLokasi").attr("disabled", false);
                    circle.setStyle({
                        fillOpacity: 0.4,
                        weight: 3
                    });
                    marker.setOpacity(1);
                    map.flyTo(L.latLng(lat, lng), 14, {
                        animate: true,
                        duration: 2,
                        onComplete: function() {
                            // Callback saat animasi "flyTo" selesai
                            marker.openPopup();
                            // Tambahkan animasi lainnya pada popup marker jika diperlukan
                        }
                    });
                    console.log(position.coords.latitude, position.coords.longitude);
                }, function(error) {
                    console.log("Error:", error.message);
                });
            } else {
                console.log("Geolocation tidak tersedia pada peramban ini");
            }
        }
        getLocationsUser();
    </script>
@endsection
