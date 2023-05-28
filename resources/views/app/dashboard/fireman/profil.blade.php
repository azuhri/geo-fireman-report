@extends('app.dashboard.template.master')
@section('dashboard_title')
    Profil Akun
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('dashboard_content')
    <div class="h-full">
        <form action="{{ route('fireman.profile.post') }}" method="post" class="w-full mb-16">
            @csrf
            <input type="hidden" name="latitude" id="latitude" value="{{ Auth::user()->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ Auth::user()->longitude }}">
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="name">Nama Unit Kebakaran</label>
                <input type="text" required id="name" value="{{ Auth::user()->name }}" name="name"
                    placeholder="Masukan nama unit kebakaran" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="email">Email</label>
                <input type="email" id="email" value="{{ Auth::user()->email }}" required name="email"
                    placeholder="Masukan email Anda" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="phonenumber">Nomor Telepon</label>
                <input type="number" required id="phonenumber" value="{{ Auth::user()->phonenumber }}" name="phonenumber"
                    placeholder="Masukan nomor telepon" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="address">Alamat</label>
                <textarea required id="address" name="address" cols="40" rows="2"
                    class="border border-slate-300 p-3 rounded-md">{{ Auth::user()->address }}</textarea>
            </div>
            <div class="my-2">
                <p class="mb-2">Titik Lokasi Unit Kebakaran</p>
                <div id="map"
                    class="min-h-[300px] border-2 border-slate-500 rounded-lg sm:min-w-[300px]  md:min-h-[300px] max-w-[600px]">
                </div>
            </div>
            <div class="my-2">
                <button class="text-center font-bold bg-slate-700 w-full text-white py-3 rounded-md">Simpan Data</button>
            </div>
            <a href="javascript:void(0);" type="button" onclick="logout();"
                class="py-2 bg-yellow-500 w-full rounded-md text-center text-white font-bold">Keluar Aplikasi</a>
        </form>
        <form action="{{ route('logout') }}" id="formLogout" method="post">
            @csrf
        </form>
    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script>
        @if (session('errors'))
            $.Toast("Pesan Peringatan", "{{ $errors->first() }}", "error");
        @elseif (session('success'))
            $.Toast("Pesan", "{{ session('success') }}", "success");
        @endif
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
        let popupContent = `<b>{{ Auth::user()->name }}</b><br>(Telp: {{ Auth::user()->phonenumber }})<br>
                         {{ Auth::user()->address }}<br>
                         `;
                        //  <div class="my-2 flex justify-center">
                        //      <img src="https://1.bp.blogspot.com/-Wjwv2CMHVFM/XeoFYB86N-I/AAAAAAAARE0/E5D0zEAvnyc8qbdOU5tsUJegTWZ8sOtgQCLcBGAsYHQ/s1600/IMG20191206113949.jpg" class="w-[200px] rounded" alt="">
                        //  </div> 
        marker.bindPopup(popupContent).openPopup();
        map.on('click', function(ev) {
            let {
                lat,
                lng
            } = ev.latlng;
            $("#latlong").html(`(LatLong: ${lat}, ${lng})`)
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            $("#latlong").show(500)
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            $("#btnSubmitTitikLokasi").attr("disabled", false);
            marker.setLatLng([lat, lng]);
            circle.setLatLng([lat, lng]);
            marker.setOpacity(1);
            circle.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
        });

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });

        const logout = () => {
            let confirmation = confirm("Apakah Anda ingin keluar dari aplikasi?");
            if (confirmation)
                $("#formLogout").submit();
        }

        var geocoder = L.Control.geocoder({
            defaultMarkGeocode: false
        }).on('markgeocode', function(e) {
            var result = e.geocode || e.target._lastGeocodeResult;
            if (result && result.center) {
                var roadName = result.name;
                console.log('Nama Jalan:', roadName);

                // Tambahkan popup dengan nama jalan
                marker.bindPopup(roadName).openPopup();
            }
        }).addTo(myMap);
    </script>
@endsection
