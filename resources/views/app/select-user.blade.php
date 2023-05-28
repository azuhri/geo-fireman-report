@extends('template.mobile')
@section('title')
    Pilih Pengguna
@endsection
@section('content')
    <div class="h-screen overflow-y-hidden	">
        <div class="p-8">
            <a href="{{route("login")}}" class="flex  w-full">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="black" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                <span class="mx-2 font-poppins font-bold">Kembali</span>
            </a>
        </div>
        <div class="h-full p-8">
            <h1 class="text-3xl mb-2 font-poppins font-extrabold w-full text-left text-orange-900">Daftar Akun</h1>
            <p class="text-left w-full mb-4">Silahkan pilih tipe pengguna</p>
            <div class="w-full my-2">
                <a href="{{route('register', "pemadam")}}" class="hover:bg-orange-400 hover:text-white flex bg-slate-50 my-6 rounded-lg border-2 border-l-4 border-s-slate-500 hover:border-s-orange-900">
                    <div class="p-4 w-1/3 flex justify-center items-center border-r-2">
                        <img src="{{asset('image/fireman2.png')}}" class="w-4/4 h-3/4" alt="">
                    </div>
                    <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                        <p class="font-poppins font-bold">Pemadam Kebakaran</p>
                        <p class="font-poppins text-xs mt-2">Admin petugas pemadam kebakaran</p>
                    </div>
                </a>
                <a href="{{route('register', "user")}}" class="hover:bg-orange-400 hover:text-white flex bg-slate-50 my-6 rounded-lg border-2 border-l-4 border-s-slate-500 hover:border-s-orange-900">
                    <div class="p-4 w-1/3 flex justify-center border-r-2">
                        <img src="{{asset('image/peoples.png')}}" class="w-4/4" alt="">
                    </div>
                    <div class="flex flex-col justify-center p-4 w-2/3 p-2">
                        <p class="font-poppins font-bold">Masyarakat Umum</p>
                        <p class="font-poppins text-xs mt-2">Pengguna yang membuat laporan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection