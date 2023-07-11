@extends('template.mobile')
@section('title')
    @yield('dashboard_title')
@endsection
@section('css')
    @yield('dashboard_css')
    <style>
        .loader {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed;
            top: 0;
            z-index: 999999999999999;
        }

        .loader-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            animation: pulse 1.5s ease-in-out infinite;
        }

        .loader-circle:before {
            content: "";
            display: block;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 8px solid #fd5d26;
            border-color: #fd5d26 transparent #fd5d26 transparent;
            animation: loader 1.2s linear infinite;
        }

        .loader-text {
            animation: pulse 1.2s linear infinite;
        }


        @keyframes loader {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }
        }
    </style>
@endsection
@section('content')
    <div class="min-h-[100vh] relative">
        <div id="loader" class="loader h-screen w-full justify-center bg-[#000000bd] flex items-center">
            <div class="loader-circle"></div>
            <span class="loader-text text-[#fd5d26] text-sm mt-4">Loading...</span>
        </div>

        <div class="font-poppins relative w-full">
            @yield('back')
        </div>
        <div class="font-poppins">
            @yield('dashboard_content')
        </div>
        @if (strpos(url()->current(), 'update-point-location') === false &&
                strpos(url()->current(), 'report/detail') === false &&
                strpos(url()->current(), 'room-chat') === false)
            @if (Auth::user()->isFireman())
                @if (!Auth::user()->isNullLatLong())
                    @include('new_app.dashboard.components.bottom-navbar-fireman')
                @endif
            @else
                @include('new_app.dashboard.components.bottom-navbar-user')
            @endif
        @endif
    </div>
    <div id="containerAudio" class="hidden">
        {{-- <audio controls autoplay class="">
            <source src="{{ asset('sounds/notif.mp3') }}" type="audio/mpeg">
        </audio> --}}
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        moment.locale();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        var $loading = $('#loader').hide();
        $(document)
        .ajaxStart(function() {
            $loading.show();
        })
        .ajaxStop(function() {
            $loading.hide();
        });

        $(document).ready(function() {
            let jumlahNotif = parseInt('{{ count(getNotifNotBelled()) }}');
            if (jumlahNotif > 0) {
                let templateAudio = ` <audio controls autoplay class="">
                                    <source src="{{ asset('sounds/notif.mp3') }}" type="audio/mpeg">
                                </audio>`;
                $("#containerAudio").html(templateAudio);
                $.Toast("Notifikasi",
                    `Ada pesan notifikasi masuk, yuk check inbox notifikasi :')". Silahkan dicheck`, "success");
            }
        });
        // const getNotifications = async () => {
        //     await fetch(`{{ route('notif.get') }}`)
        //         .then(res => res.json())
        //         .then(json => {
        //             let data = json.data;
        //             console.log(data);
        //             if (totalNotif = data.length) {
        //                 $("#counterNotif").html(data.length);
        //                 totalNotif = 0;
        //                 $("#counterNotif").show(500);
        //                 $("#containerAudio").html(templateAudio);
        //             }
        //         })
        // }
        // const getIntervalNotification = (seconds) => {
        //     setInterval(() => {
        //         getNotifications();                
        //     }, seconds);
        // }

        // getIntervalNotification(3000);
    </script>
    @yield('dashboard_js')
@endsection
