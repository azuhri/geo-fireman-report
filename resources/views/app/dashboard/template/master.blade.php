@extends('template.mobile')
@section('title')
    @yield('dashboard_title')
@endsection
@section('css')
    @yield('dashboard_css')
@endsection
@section('content')
<div class="min-h-[100vh] relative">
        <div class="loader">
            <div class="loader-circle"></div>
            <span class="loader-text">Loading...</span>
        </div>
        <div class="border-b-2 font-poppins shadow relative w-full text-center py-4 bg-slate-700 text-slate-50">
            @yield('back')
            <span class="font-bold text-2xl">Geo Fireman Report</span>
        </div>
        <div class="p-4 font-poppins">
            @yield('dashboard_content')
        </div>
        @if (Auth::user()->isFireman())
            @if (!Auth::user()->isNullLatLong())
                @include('app.dashboard.components.bottom-navbar-fireman')
            @endif
        @else
            @include('app.dashboard.components.bottom-navbar-user')
        @endif
    </div>
    <div id="containerAudio" class="hidden">
        {{-- <audio controls autoplay class="">
            <source src="{{ asset('sounds/notif.mp3') }}" type="audio/mpeg">
        </audio> --}}
    </div>
@endsection

@section('js')
    <script>
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
