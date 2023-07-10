@extends('template.mobile')
@section('title')
    @yield('dashboard_title')
@endsection
@section('css')
    @yield('dashboard_css')
@endsection
@section('content')
    <div class="min-h-[100vh] relative">
        <div class="font-poppins relative w-full">
            @yield('back')
        </div>
        <div class="font-poppins">
            @yield('dashboard_content')
        </div>
        @if (strpos(url()->current(), 'update-point-location') === false)
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
