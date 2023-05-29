@extends('app.dashboard.template.master')
@section('dashboard_title')
    Detail Laporan
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
@endsection
@section('back')
    <button onclick="history.back()" class="absolute left-2 bottom-5">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
            stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </button>
@endsection
@section('dashboard_content')
    <div class="h-full">
        <p class="font-bold mb-2 text-xl">Detail Laporan</p>
        <div class="flex justify-between">
            <div class="my-2">
                <p class="text-sm">Tanggal Laporan:</p>
                <p class="bg-slate-500 font-bold text-xs text-center text-white rounded font-bold py-1">
                    {{ $report->created_at }}</p>
            </div>
            <div class="my-2">
                <p class="text-sm">Status Laporan:</p>
                <p class="{{statusColor($report->report_status) == 'green' ? 'bg-green-600' : 'bg-'.statusColor($report->report_status)."-500"}} font-bold text-xs text-center text-white rounded font-bold py-1">
                    {{ $report->report_status }}</p>
            </div>
            <div class="my-2">
                <p class="text-sm">Level Laporan:</p>
                <p class="bg-slate-500 font-bold text-xs text-center text-white rounded font-bold py-1">LEVEL
                    {{ $report->type_report }}</p>
            </div>
        </div>
        <div class="flex bg-slate-50 my-6 rounded-lg border-2 border-l-4 border-s-slate-500 hover:border-s-orange-900">
            <div class="p-4 w-1/3 flex justify-center items-center border-r-2">
                <img src="{{ asset('icons/fireman.png') }}" class="" alt="">
            </div>
            <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                <div class="my-1">
                    <p class="font-bold text-sm text-slate-700">Nama Unit Damkar</p>
                    <p class="text-[12px]">{{ $report->fireman->name }}</p>
                </div>
                <div class="my-1">
                    <p class="font-bold text-sm text-slate-700">Email</p>
                    <p class="text-[12px]">{{ $report->fireman->email }}</p>
                </div>
                <div class="my-1">
                    <p class="font-bold text-sm text-slate-700">Nomor Telp.</p>
                    <p class="text-[12px]">{{ $report->fireman->phonenumber }}</p>
                </div>
                @if ($report->report_status == "pending")
                    <button onclick="cancelReport();" class="mt-2 py-2 bg-red-500 text-white rounded-md text-xs">
                        Batalkan Laporan
                    </button>
                @endif
            </div>
        </div>
        <div class="relative">
            <p class="font-bold text-md">Peta</p>
            <div id="map"
                class="min-h-[300px] border-2 border-slate-500 rounded-lg sm:min-w-[300px]  md:min-h-[300px] max-w-[600px]">
            </div>
        </div>
        <div class="py-2 mb-24">
            <p class="font-bold text-slate-700 mb-2">Kotak Pesan</p>
            <div class="flex flex-col">
                <div id="messageBox" class="max-h-[400px] overflow-y-scroll">
                    <div class="my-1 flex flex-col" id="kolomChat">
                        {{-- <div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-end items-center">
                                    <p class="font-bold text-xs text-yellow-900 font-bold">Anda</p>
                                    <img src="{{asset('icons/male.png')}}" class=" w-[30px]" alt="">
                                </div>
                                <div class="mx-2 text-right font-bold">
                                    <p class="text-xs font-bold">Ini adalah sebuah pesan singkat</p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-start items-center">
                                    <img src="{{asset('icons/fireman.png')}}" class=" w-[30px]" alt="">
                                    <p class="font-bold text-xs text-yellow-900 mx-2 font-bold">Unit Kebakaran</p>
                                </div>
                                <div class="mx-2 text-left font-bold">
                                    <p class="text-xs font-bold">Ini adalah sebuah pesan singkat</p>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-start items-center">
                                    <img src="{{asset('icons/fireman.png')}}" class=" w-[30px]" alt="">
                                    <p class="font-bold text-xs text-yellow-900 mx-2 font-bold">Unit Kebakaran</p>
                                </div>
                                <div class="mx-2 text-left font-bold">
                                    <p class="text-xs font-bold">Ini adalah sebuah pesan singkat</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-start items-center">
                                    <img src="{{asset('icons/fireman.png')}}" class=" w-[30px]" alt="">
                                    <p class="font-bold text-xs text-yellow-900 mx-2 font-bold">Unit Kebakaran</p>
                                </div>
                                <div class="mx-2 text-left font-bold">
                                    <p class="text-xs font-bold">Ini adalah sebuah pesan singkat</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @if($report->report_status == "pending" || $report->report_status == "diproses")
                    <div class="flex my-1">
                        <input type="text" class="text-xs py-2 border-2 p-1 px-2 w-10/12 placeholder:text-sm" id="inputChat"
                            placeholder="ketikan sesuatu...">
                        <div class="w-2/12">
                            <button onclick="sendMessage();"
                                class="bg-blue-500 text-white w-full h-full flex justify-center items-center">
                                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        let currentPoint = [parseFloat('{{ $report->fireman->latitude }}'), parseFloat(
            '{{ $report->fireman->longitude }}')];
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

        let popupContent = `<b>{{ $report->fireman->name }}</b><br>(Telp: {{ $report->fireman->phonenumber }})<br>
                         {{ $report->fireman->address }}<br>
                        `;
        marker.bindPopup(popupContent).openPopup();
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

        let iconTarget = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [5, 5], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let targetPoint = [parseFloat('{{ $report->latitude }}'), parseFloat('{{ $report->longitude }}')];
        let circleTarget = L.circle(targetPoint, {
            color: '#93c5fd',
            fillColor: '#1d4ed8',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let markerTarget = L.marker(targetPoint, {
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
        const createRoute = (lat, lng, messsage = 'Lokasi Kejadian') => {
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
        createRoute(targetPoint[0], targetPoint[1]);
        const sendMessage = () => {
            let message = $("#inputChat").val();
            $.ajax(`{{ route('user.send.message', $report->id) }}`, {
                type: 'POST',
                data: {
                    message
                },
                success: function(data) {
                    console.log(data);
                    $("#inputChat").val("");
                    getMessages();
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);
                }
            });
        }

        const getMessages = async () => {
            let errorBanner =
                `<p id="errorBanner" style="display:none" class="text-center rounded text-xs bg-slate-500 text-white p-1">pesan kosong</p>`
            await fetch(`{{ route('user.get.message', $report->id) }}`)
                .then(res => res.json())
                .then(json => {
                    let data = json.data;
                    console.log(data);
                    let messages = "";
                    if (data.length < 1) {
                        $("#kolomChat").html(errorBanner);
                        $("#errorBanner").show(0);
                    } else {
                        data.forEach(val => {
                            messages += templateMessage(val);
                        })
                        $("#kolomChat").html(messages);
                        const element = document.getElementById("messageBox")
                        element.scrollTop = element.scrollHeight;
                    }
                })
        }
        const templateMessage = (data) => {
            if(data.user_id == '{{Auth::user()->id}}') {
                return `<div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-end items-center">
                                    <p class="font-bold text-xs text-yellow-900 font-bold">Anda</p>
                                    <img src="{{url("/")}}/icons/${data.user.gender == 'pria' ? 'male' : 'female'}.png" class=" w-[30px]" alt="">
                                </div>
                                <div class="mx-2 text-right font-bold">
                                    <p class="text-xs font-bold">${data.message}</p>
                                </div>
                            </div>
                        </div>`
            } else {
                return `<div class="">
                            <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                                <div class="py-1 flex mx-1 justify-start items-center">
                                    <img src="{{asset('icons/fireman.png')}}" class=" w-[30px]" alt="">
                                    <p class="font-bold text-xs text-yellow-900 mx-2 font-bold">{{$report->fireman->name}}</p>
                                </div>
                                <div class="mx-2 text-left font-bold">
                                    <p class="text-xs font-bold">${data.message}</p>
                                </div>
                            </div>
                        </div>`
            }
        }
        getMessages();
        @if($report->report_status == "pending" || $report->report_status == "diproses")
            const getMessageInterval = (time) => {
                setInterval(() => {
                    getMessages();
                }, time);
            }
            getMessageInterval(3000);   
        @endif
        const cancelReport = () => {
            let confirmation = confirm("Apakah Anda ingin membatalkan laporan ini? ");
            if(confirmation) {
                $.ajax(`{{ route('user.update.report', [$report->id, "dibatalkan"]) }}`, {
                    type: 'PUT',
                    data: {},
                    success: function(data) {
                        $.Toast("Pesan", "Berhasil membatalkan laporan", "success");
                        setTimeout(() => {
                            window.location.href = `{{route('user.report')}}`;
                        }, 2000);
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        console.log(errorMessage);
                    }
                });
            }
        }
    </script>
@endsection
