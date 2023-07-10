@extends('template.mobile')
@section('title')
    Login
@endsection
@section('css')
    <style>

        #ilustrasi_damkar {
            position: relative;
            animation: moveUpDown 2s linear infinite; 
        }
        @keyframes moveUpDown {
            0% {
                top: 0;
            }

            50% {
                top: 20px;
                /* Atur ketinggian maksimal pergerakan gambar */
            }

            100% {
                top: 0;
            }
        }
    </style>
@endsection
@section('content')
    <div class="h-screen overflow-y-hidden">
        <div class="py-8 mt-4 flex flex-col items-center">
            <div class="flex justify-center items-center">
                <img src="{{ asset('icons/Logogram.png') }}" alt="">
                <p class="font-bold text-slate-700 text-3xl">&nbsp;O'Fireport</p>
            </div>
            <div class="mt-24">
                <img id="ilustrasi_damkar" class="w-[350px]" src="{{ asset('icons/poster.png') }}" alt="">
            </div>
        </div>
        <div class="mt-4 px-8">
            <p class="font-bold text-center text-2xl">Yuk Jadi Kontributor</p>
            <p class="text-center text-slate-500">Buat pelaporan dengan mudah untuk membuat kotamu segera nyaman dari
                genggaman</p>
            <div class="flex flex-col mt-4">
                <a href="{{ route('register.new') }}"
                    class="p-[12px] rounded-full text-center w-full bg-transparent text-orange-500 font-bold my-1 border border-orange-500">Register</a>
                <a href="{{ route('login') }}"
                    class="p-[12px] rounded-full text-center w-full bg-orange-500 my-1 text-white">Login</a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if (session('success'))
            $.Toast("Pesan Notifikasi", "{{ session('success') }}", "success");
        @endif
        @if (session('errors'))
            $.Toast("Pesan Notifikasi", "{{ session('errors') }}", "error");
        @endif
    </script>
@endsection
