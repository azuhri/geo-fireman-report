@extends('app.dashboard.template.master')
@section('dashboard_title')
    Beranda
@endsection
@section('dashboard_css')
@endsection
@section('dashboard_content')
    <div class="h-full">
        <div class="flex items-center">
            <div class="w-1/2">
                <p class="text-xs mb-1 text-center px-2 py-1 w-[70px] bg-yellow-500 rounded text-white font-bold">
                    USER
                </p>
                <p class="font-bold text-yellow-700">{{ Auth::user()->name }}</p>
            </div>
            <div class="w-1/2 flex justify-end">
                <div class="bg-slate-100 border-[2px] drop-shadow-md w-1/3 rounded-full">
                    <a href="{{ route('user.profile') }}">
                        @if (Auth::user()->isMale())
                            <img class="" src="{{ asset('icons/male.png') }}" alt="">
                        @else
                            <img class="" src="{{ asset('icons/female.png') }}" alt="">
                        @endif
                    </a>
                </div>
            </div>
        </div>
        <div class="my-4 p-4 rounded-md border-[1px] drop-shadow-md">
            <div class="text-xs">
                <p class="font-bold text-sm bg-slate-700 text-center text-white py-2 shadow-md rounded-md mb-4">Rangkuman
                    Data</p>
                <div class="flex justify-between">
                    <div class="">
                        <p class="text-center font-bold">Total Laporan</p>
                        <p class="text-center text-2xl font-bold text-yellow-700">{{ $dataLaporan->total_laporan }}</p>
                    </div>
                    <div class="">
                        <p class="text-center font-bold">Laporan Ditolak</p>
                        <p class="text-center text-2xl font-bold text-yellow-700">{{ $dataLaporan->jumlah_ditolak }}</p>
                    </div>
                    <div class="">
                        <p class="text-center font-bold">Laporan Selesai</p>
                        <p class="text-center text-2xl font-bold text-yellow-700">{{ $dataLaporan->jumlah_selesai }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if ($reportActive)
            <div
                class="flex bg-slate-50 rounded-lg border-2 relative border-l-4 border-s-slate-500 hover:border-s-orange-900">
                <div class="p-2 text-[10px] text-white font-bold bg-yellow-500 absolute top-0 right-0 rounded">
                    Laporan sedang diproses
                </div>
                <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Nama Unit Kebakaran</p>
                        <p class="text-[12px] text-yellow-700">{{ $reportActive->fireman->name }}</p>
                    </div>
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Email</p>
                        <p class="text-[12px] text-yellow-700">{{ $reportActive->fireman->email }}</p>
                    </div>
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Nomor Telp</p>
                        <p class="text-[12px] text-yellow-700">{{ $reportActive->fireman->phonenumber }}</p>
                    </div>
                    <a href="{{ route('user.detail.report', $reportActive->id) }}"
                        class="w-full bg-yellow-500 text-center text-white mt-2 py-2 rounded-lg text-sm">
                        Detail Laporan
                    </a>
                </div>
                <div class="p-4 w-1/3 flex relative justify-center items-center border-r-2">
                    <img src="{{ asset('icons/fireman.png') }}" class="w-[100px]" alt="">
                </div>
            </div>
        @else
            <div onclick="createReport();"
                class="my-2 p-4 py-2 rounded-md border-[1px] drop-shadow-md bg-transparent cursor-pointer shadow-lg">
                <div class="flex justify-arround">
                    <div class="flex justify-start">
                        <img src="{{ asset('icons/mobile-damkar.png') }}" class="w-1/6 mx-auto my-auto" alt="">
                        <div class="px-4 py-4 ml-4">
                            <p class="text-md font-bold text-yellow-700">Panggil Damkar</p>
                            <p class="text-xs text-slate-700">Pemanggilan petugas damkar hanya dalam keadaan urgent</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="my-2 mb-32">
            @foreach ($laporanGiveFeedBack as $report)
                <div
                    class="flex bg-slate-50 rounded-lg border-2 relative border-l-4 border-s-slate-500 hover:border-s-orange-900">
                    <div class="p-1 px-4 text-[10px] text-white font-bold bg-yellow-500 absolute top-0 right-0 rounded">
                        Belum diberi rating
                    </div>
                    <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                        <div class="my-1">
                            <p class="font-bold text-sm text-slate-700">Nama Unit Kebakaran</p>
                            <p class="text-[12px] text-yellow-700">{{ $report->fireman->name }}</p>
                        </div>
                        <div class="my-2">
                            <p class="font-bold text-xs mb-1">Silahkan berikan rating</p>
                            <div class="flex" id="containerRating">
                                <button class="mr-2">
                                    <img onclick="giveRating('{{$report->id}}', 1)" src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
                                </button>
                                <button class="mr-2">
                                    <img onclick="giveRating('{{$report->id}}', 2)" src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
                                </button>
                                <button class="mr-2">
                                    <img onclick="giveRating('{{$report->id}}', 3)" src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
                                </button>
                                <button class="mr-2">
                                    <img onclick="giveRating('{{$report->id}}', 4)" src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
                                </button>
                                <button class="mr-2">
                                    <img onclick="giveRating('{{$report->id}}', 5)" src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 w-1/3 flex relative justify-center items-center border-r-2">
                        <img src="{{ asset('icons/fireman.png') }}" class="w-[100px]" alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('dashboard_js')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            Echo.channel('notif-channel')
                .listen('NotifEvent', (e) => {
                    console.log("Event notif");
                    console.log(e);
                });
        });;
        @if(session('notif_error'))
            $.Toast("Pesan Peringatan", "{{ session('notif_error') }}", "error");
        @elseif (session('errors'))
            $.Toast("Pesan Peringatan", "{{ $errors->first() }}", "error");
        @elseif (session('success'))
            $.Toast("Pesan", "{{ session('success') }}", "success");
        @endif
        const createReport = () => {
            window.location.href = '{{ route('user.create.report') }}';
        }

        const giveRating = (reportId, rating) => {
            let stars = `<button class="mr-2">
                                    <img src="{{ asset('icons/star.png') }}" class="w-[30px]" alt="">
                                </button>`;
            let plainStart = `<button class="mr-2">
                <img src="{{ asset('icons/plain-star.png') }}" class="w-[30px]" alt="">
            </button>`;
            let html = '';
            for (let i = 1; i <= 5; i++) {
                html += `<button class="mr-2">
                            <img src="{{ url('/') }}/icons/${i > rating ? 'plain-star' : 'star'}.png" onclick='giveRating(${reportId},${i})' class="w-[30px]" alt="">
                        </button>`;
            }
            $("#containerRating").html(html)
            $.ajax(`{{ route('fireman.rating.report', "/") }}/${reportId}`, {
                    type: 'PUT',
                    data: {rating},
                    success: function(data) {
                        $.Toast("Pesan", `Berhasil memberikan rating`, "success");
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        console.log(errorMessage);
                    }
                });
        }
    </script>
@endsection
