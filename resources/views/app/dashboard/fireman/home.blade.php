@extends('app.dashboard.template.master')
@section('dashboard_title')
    Beranda
@endsection
@section('dashboard_css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>
@endsection
@section('dashboard_content')
    <div class="h-full">
        <div class="flex items-center mb-4">
            <div class="w-1/2">
                <p class="mb-1 text-xs text-center px-2 py-1 w-[70px] bg-blue-500 rounded text-white font-bold">
                    DAMKAR
                </p>
                <p class="font-bold text-blue-700 text-sm">{{ Auth::user()->name }}</p>
            </div>
            <div class="w-1/2 flex justify-end">
                <div class="bg-slate-100 border-[2px] p-2 drop-shadow-md w-1/3 rounded-full">
                    <a href="{{ route('fireman.profile') }}">
                        <img class="" src="{{ asset('icons/fireman.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        @if ($reportActive)
            <div
                class="flex bg-slate-50 rounded-lg border-2 relative border-l-4 border-s-slate-500 hover:border-s-orange-900">
                <div class="p-2 text-[10px] text-white font-bold bg-blue-500 absolute top-0 right-0 rounded">
                    Laporan sedang diproses
                </div>
                <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Nama Pelapor</p>
                        <p class="text-[12px] text-yellow-700">{{ $reportActive->user->name }}</p>
                    </div>
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Email</p>
                        <p class="text-[12px] text-yellow-700">{{ $reportActive->user->email }}</p>
                    </div>
                    <div class="my-1">
                        <p class="font-bold text-sm text-slate-700">Nomor WA</p>
                        <a href="https://wa.me/{{$reportActive->user->phonenumber}}" target="_blank" class="text-[12px] text-yellow-700">{{ $reportActive->user->phonenumber }}</a>
                    </div>
                    <a href="{{ route('fireman.detail.report', $reportActive->id) }}"
                        class="w-full bg-blue-500 text-center text-white mt-2 py-2 rounded-lg text-sm">
                        Detail Laporan
                    </a>
                </div>
                <div class="p-4 w-1/3 flex relative justify-center items-center border-r-2">
                    <img src="{{ $reportActive->user->avatar() }}" class="w-[100px]" alt="">
                </div>
            </div>
        @endif
        <div class="my-4 p-4 rounded-md border-[1px] drop-shadow-md mb-[100px]">
            <div class="text-xs">
                <p class="font-bold text-sm bg-slate-700 text-center text-white py-2 shadow-md rounded-md mb-4">Rangkuman
                    Data</p>
                <div class="flex justify-between">
                    <div class="mx-[1px] w-full relative">
                        <div
                            class="flex flex-col justify-center rounded-md items-center p-4 bg-slate-700 text-yellow-500 text-white">
                            <div class="p-[1px] absolute left-1 top-1 rounded-full w-12 bg-yellow-500 flex justify-center">
                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="white" stroke-width="3"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <p class="text-sm font-bold mt-2 text-center">Total Laporan</p>
                            <span class="text-3xl font-bold font-poppins right-4 top-8 text-white">{{$dataLaporan->total_laporan}}</span>
                        </div>
                    </div>
                    <div class="mx-[1px] w-full relative">
                        <div
                            class="flex flex-col justify-center rounded-md items-center p-4 bg-slate-700 text-yellow-500 text-white">
                            <div class="p-[1px] absolute left-1 top-1 rounded-full w-12 bg-yellow-500 flex justify-center">
                              <svg viewBox="0 0 24 24" width="12" height="12" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            </div>
                            <p class="text-sm font-bold mt-2 text-center">Laporan Selesai</p>
                            <span class="text-3xl font-bold font-poppins right-4 top-8 text-white">{{$dataLaporan->jumlah_selesai}}</span>
                        </div>
                    </div>
                    <div class="mx-[1px] w-full relative">
                        <div
                            class="flex flex-col justify-center rounded-md items-center p-4 bg-slate-700 text-yellow-500 text-white">
                            <div class="p-[1px] absolute left-1 top-1 rounded-full w-12 bg-yellow-500 flex justify-center">
                              <svg viewBox="0 0 24 24" width="12" height="12" stroke="white" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                            </div>
                            <p class="text-sm font-bold mt-2 text-center">Rating Performa</p>
                            <span class="text-3xl font-bold font-poppins right-4 top-8 text-white">{{round($rating)}}</span>
                        </div>
                    </div>
                </div>
                <div class="my-1 flex justify-center items-center p-2 flex flex-col text-white bg-slate-700 rounded-md text-center mb-4">
                  <span class="font-bold my-4">Diagram Kasus Laporan Pemanggilan Damkar Berdasarkan Level</span>
                  <div class="w-3/4">
                    <canvas id="chart"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard_js')
    <script>
      
        let ctx = document.getElementById('chart').getContext('2d');
        var data = {
            labels: ['Level 1', 'Level 2', 'Level 3'],
            datasets: [{
                data: [{{$caseLevel->level1}}, {{$caseLevel->level2}}, {{$caseLevel->level3}}], // nilai-nilai data untuk setiap label
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                ],
            }]
        };
        var options = {
            animation: {
                duration: 2000, // durasi animasi dalam milidetik (ms)
                easing: 'easeInOutQuart' // jenis easing yang digunakan
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            var value = context.raw || '';

                            return ` ${label}: ${value} Kasus`;
                        }
                    }
                },
                legend: {
                    position: 'right',
                    labels: {
                        // gaya teks label
                        font: {
                            size: 16,
                            color: 'white',
                        },
                        color: 'white',
                        position: 'bottom',
                    }
                },
            }
        };

        // membuat pie chart
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options,
        });
    </script>
@endsection
