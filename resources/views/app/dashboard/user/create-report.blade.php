@extends('app.dashboard.template.master')
@section('dashboard_title')
    Buat Laporan
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
@endsection
@section('back')
<button onclick="history.back()" class="absolute left-2 bottom-5">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
</button>
@endsection
@section('dashboard_content')
    <div class="h-full">
        <form action="{{route('user.create.report.post')}}" method="post" class="mb-[100px]">
            @csrf
            <p class="font-bold mb-2 text-xl">Buat Laporan</p>
            <div class="py-2 flex flex-col">
                <label class="font-bold text-md">Pilih Unit Pemadam Kebakaran</label>
                <select onchange="flyTo(this)" name="fireman_id"
                    class="bg-transparent border-2 border-slate-500 shadow py-1 px-2 rounded-lg text-xs">
                    @foreach ($firemans as $fireman)
                        <option class="text-yellow-700"
                            value="{{ $fireman->latitude . ',' . $fireman->longitude . ',' . $fireman->id }}">
                            {{ $fireman->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <div class="relative">
                <div id="map"
                    class="min-h-[300px] border-2 border-slate-500 rounded-lg sm:min-w-[300px]  md:min-h-[300px] max-w-[600px]">
                </div>
                <button type="button" class="text-xs font-bold absolute left-1 font-bold text-white rounded shadow bg-yellow-500 px-4 bottom-1 z-[9999] py-2" onclick="buttonGetLocaltionUser();">Deteksi Lokasi Anda</button>
            </div>
            <div class="py-2 flex flex-col">
                <label class="font-bold 2 text-md">Level Laporan</label>
                <select onchange="flyTo(this)" name="type_report"
                    class="bg-transparent border-2 border-slate-500 shadow py-1 px-2 rounded-lg text-xs">
                    <option class="text-yellow-700" value="1">Level 1</option>
                    <option class="text-yellow-700" value="2">Level 2</option>
                    <option class="text-yellow-700" value="3">Level 3</option>
                </select>
            </div>
            <div class="flex flex-col mb-4">
                <label class="font-poppins font-bold text-md" for="address">Deskripsi Kejadian (Kronologi)</label>
                <textarea required id="desc" name="desc" cols="40" rows="5"
                    class="border text-xs border-slate-300 p-3 border-2 border-slate-500 bg-transparent rounded-md"></textarea>
            </div>
            <div class="my-2">
                <button class="text-center font-bold bg-slate-700 w-full text-white py-3 rounded-md">Buat Laporan</button>
            </div>
        </form>

    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        let currentPoint = [parseFloat('{{ $firemans[0]->latitude }}'), parseFloat('{{ $firemans[0]->longitude }}')];
        let map = L.map('map').setView(currentPoint, 13);
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
        let circle = L.circle(currentPoint, {
            color: 'pink',
            fillColor: '#f03',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let marker = L.marker(currentPoint, {
            icon
        }).addTo(map);

        let popupContent = `<b>{{ $firemans[0]->name }}</b><br>(Telp: {{ $firemans[0]->phonenumber }})<br>
                         {{ $firemans[0]->address }}<br>
                        `;
        marker.bindPopup(popupContent).openPopup();

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });

        const stringToLatLng = (string) => {
            let lat = parseFloat(string.split(',')[0]);
            let lng = parseFloat(string.split(',')[1]);
            let uuid = string.split(',')[2];

            return {
                lat,
                lng,
                uuid
            };
        }


        const flyTo = async (self) => {
            marker.closePopup();
            let stringLatLng = $(self).val();
            let {
                lat,
                lng,
                uuid
            } = stringToLatLng(stringLatLng);
            let data = null;
            await fetch(`{{ route('user.get-fireman', '') }}/${uuid}`)
                .then(response => response.json())
                .then(val => {
                    data = val;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            console.log(data);
            popupContent = `<b>${data.data.name}</b><br>(Telp: ${data.data.phonenumber})<br>
                         ${data.data.address}<br>
                        </div> 
                        `;
            marker.setPopupContent(popupContent);
            let selectedDamkarLatLng = L.latLng(lat, lng);
            let targetLatLng = L.latLng(markerTarget.getLatLng().lat, markerTarget.getLatLng().lng);
            let waypoint = [selectedDamkarLatLng, targetLatLng];
            var point = routes.getWaypoints();
            latPointPrevious = point[0].latLng.lat;
            console.log(latPointPrevious);
            if (latPointPrevious != 0) {
                routes.setWaypoints(waypoint);
            }
            let arrLatLng = [lat, lng];
            marker.setLatLng(arrLatLng);
            circle.setLatLng(arrLatLng);
            animateFlyTo(selectedDamkarLatLng, 14);
            marker.setOpacity(0); // Mengatur opasitas marker menjadi 0
            marker.openPopup();
            marker.setOpacity(1);
        }

        const animateFlyTo = (latlng, zoom) => {
            map.flyTo(latlng, zoom, {
                animate: true,
                duration: 2,
                onComplete: function() {
                    // Callback saat animasi "flyTo" selesai
                    marker.openPopup();
                    // Tambahkan animasi lainnya pada popup marker jika diperlukan
                }
            });
        }

        let iconTarget = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [5, 5], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let circleTarget = L.circle([-7.275612, 112.6301103], {
            color: '#93c5fd',
            fillColor: '#1d4ed8',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let markerTarget = L.marker([-7.275612, 112.6301103], {
            icon
        }).addTo(map);
        markerTarget.setOpacity(0);
        circleTarget.setStyle({
            fillOpacity: 0,
            weight: 0
        });
        let routes = L.Routing.control({
            waypoints: [
                L.latLng(0, 0),
                L.latLng(0, 0)
            ],
            createMarker: function() {},
        }).addTo(map);
        map.on("click", function(ev) {
            let {
                lat,
                lng
            } = ev.latlng;

            $("#latitude").val(lat);
            $("#longitude").val(lng);
            newPoint(lat, lng);
        })
        const newPoint = (lat,lng , messsage = 'Lokasi Kejadian') => {
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            markerTarget.setLatLng([lat, lng]);
            circleTarget.setLatLng([lat, lng]);
            markerTarget.setOpacity(1);
            markerTarget.bindPopup(`<b>${messsage}</b>`).openPopup();
            circleTarget.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
            let latLngTarget = L.latLng(lat, lng);
            let currentDamkarLatLng = L.latLng(marker.getLatLng().lat, marker.getLatLng().lng);
            let waypoint = [currentDamkarLatLng, latLngTarget];
            routes.setWaypoints(waypoint);
        }
        let realLatUser = 0;
        let realLngUser = 0;
        const getLocationsUser = () => {
            if("geolocation" in navigator) {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    realLatUser = position.coords.latitude;
                    realLngUser = position.coords.longitude;

                    newPoint(realLatUser, realLngUser, "Lokasi Anda")
                }, function(error) {
                    console.log("Error:", error.message);
                });
            } else {
                console.log("Geolocation tidak tersedia pada peramban ini");
            }
        }
        const buttonGetLocaltionUser = () => {
            newPoint(realLatUser, realLngUser, "Lokasi Anda")
        }

        getLocationsUser();
    </script>
@endsection
