@extends('app.dashboard.template.master')
@section('dashboard_title')
    Notifikasi
@endsection
@section('dashboard_css')
    
@endsection
@section('dashboard_content')
    <div class="h-full">
        <p>Daftar Notifikasi</p>
        <div class="py-2 mb-[100px]">
            @foreach ($notifications as $notif)
                <div class="p-4 mb-4 shadow-lg flex flex-col rounded-lg text-sm  bg-yellow-500 text-white font-bold">
                    <p>{{$notif->pesan}}</p>
                    @if ($notif->url)
                        <a href="{{$notif->url}}" class="p-2 text-center bg-white font-bold shadow-lg text-slate-500 mt-4 rounded w-full">Check lebih detail</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('dashboard_js')
   
@endsection
