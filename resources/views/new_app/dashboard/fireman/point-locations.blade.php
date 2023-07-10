@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Atur Titik Damkar
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        /* .leaflet-popup-content-wrapper, .leaflet-popup-tip  {
                --tw-bg-opacity: 1;
                background-color: rgb(219 234 254 / var(--tw-bg-opacity));
                ;
                color: #ffffff;
                color: rgb(59 130 246 / var(--tw-text-opacity));
                border-color: rgb(59 130 246 / var(--tw-border-opacity));
            } */
    </style>
@endsection
@section('back')
    <div class="mt-10 mb-4 flex justify-center absolute top-[-20px] z-[1001] w-full">
        <div
            class="bg-orange-100 text-orange-500 border-2 border-orange-500 flex w-[300px] py-[12px] rounded justify-center items-center relative rounded-lg shadow-lg">
            <button onclick="history.back()" class="absolute left-3 flex items-center ">
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </button>
            <p class="font-semibold text-sm">Titik Lokasi Damkar</p>
        </div>
    </div>
@endsection
@section('dashboard_content')
    <div class="h-screen relative">
        {{-- <p class="mt-4 font-bold relative">Titik Lokasi Unit Kebakaran</p>
        <div class="w-full flex justify-end">
            <small id="latlong" class="font-bold text-[10px]" style="display: none"></small>
        </div> --}}
        <div id="map" class="h-full border-2 border-slate-500">
        </div>
        <form onsubmit="saveLocation(event);" class="fixed z-[1000] w-[500px] flex justify-center bottom-10"
            action="{{ route('fireman.geolocation.post') }}" method="post">
            @csrf
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <button id="btnSubmitTitikLokasi"
                class="text-sm my-2 flex items-center justify-center px-4 py-[12px] bg-orange-600 text-white rounded-full shadow font-bold w-3/5">
                <svg class="" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>&nbsp;&nbsp;SIMPAN TITIK LOKASI PEMADAM</button>
        </form>
    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        $.Toast("Pesan","Jika Anda ingin mengubah titik lokasi pos pemadam kebakaran, silahkan ketuk dititik lokasi yang sesuai pada map!", "warning");

        let realLatLng = [
            parseFloat('{{ Auth::user()->latitude }}'),
            parseFloat('{{ Auth::user()->longitude }}')
        ];
        var map = L.map('map').setView(realLatLng, 13);
        googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 30,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        let icon = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [25, 25], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let circle = L.circle(realLatLng, {
            color: 'pink',
            fillColor: '#f03',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let marker = L.marker(realLatLng, {
            icon
        }).addTo(map);
        let popupContent =
            `<div class="bg-green-100 border border-green-800 p-2 rounded font-bold text-green-800"><span>Titik Lokasi Damkar Sekarang</span></div>`;
        marker.bindPopup(popupContent).openPopup().addTo(map);

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
            // $("#btnSubmitTitikLokasi").attr("disabled", false);
            circle.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
            marker.setOpacity(1);
            marker.setLatLng([lat, lng]);
            circle.setLatLng([lat, lng]);
            popupContent =
                `<div class="bg-blue-100 border border-blue-800 p-2 rounded font-bold text-blue-800"><span>Titik Lokasi Damkar Baru</span></div>`;
            marker.bindPopup(popupContent).openPopup();
        });

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });

        const saveLocation = (e) => {
            e.preventDefault();
            let lat = $("#latitude").val();
            let long = $("#longitude").val();
            $.ajax({
                url: '{{route('fireman.point-location.post')}}',
                dataType: "json",
                type: "Post",
                async: true,
                data: {lat, long},
                success: function(data) {
                    $.Toast("Pesan",data.message, "success");
                    setTimeout(() => {
                        window.location.href = '{{route('fireman.profile')}}';
                    }, 5000);            
                },
                error: function(xhr, exception) {
                    let {error} = xhr.responseJSON;
                    $.Toast("Pesan",error.message, "error");            
                }
            });
        }
    </script>
@endsection
