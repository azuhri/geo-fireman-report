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
        <form action="{{ route('user.profile.post') }}" method="post" class="w-full mb-16">
            @csrf
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="name">Nama Lengkap</label>
                <input type="text" required id="name" value="{{ Auth::user()->name }}" name="name"
                    placeholder="Masukan nama unit kebakaran" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="py-2 flex flex-col">
                <label class="font-bold 2 text-md">Jenis Kelamin</label>
                <select  name="gender" class="border-2 p-2 rounded-md">
                    <option {{ Auth::user()->isMale() ? 'selected' : '' }} value="pria">Pria</option>
                    <option {{ !Auth::user()->isMale() ? 'selected' : '' }} value="wanita">Wanita</option>
                </select>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="email">Email</label>
                <input type="email" id="email" value="{{ Auth::user()->email }}" required name="email"
                    placeholder="Masukan email Anda" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="phonenumber">Nomor WA</label>
                <div class="relative">
                    <span
                        class="top-[14px] left-[0px] absolute text-slate-900 font-bold font-poppins border-e-slate-500 border-r-2 px-2">+62</span>
                    <input type="number" required id="phonenumber"
                        value="{{ str_replace('62', '', Auth::user()->phonenumber) }}" name="phonenumber"
                        onkeyup="filterPhonenumber(this);" placeholder="Masukan nomor WA Anda"
                        class="border border-slate-300 p-3 pl-14 rounded-md w-full">
                    <p class="text-xs my-[2px] text-red-500" id="alert-wa" valu style="display: none">Nomor WA minimal 10
                        digit angka</p>
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="address">Alamat</label>
                <textarea required id="address" name="address" cols="40" rows="2"
                    class="border border-slate-300 p-3 rounded-md">{{ Auth::user()->address }}</textarea>
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
    <script>
        const logout = () => {
            let confirmation = confirm("Apakah Anda ingin keluar dari aplikasi?");
            if (confirmation)
                $("#formLogout").submit();
        }
        const filterPhonenumber = (self) => {
            let number = $(self).val();
            $(self).val(number);
            if (number.length < 10) {
                $("#alert-wa").show(500);
            } else {
                $("#alert-wa").hide(500);
            }
        }
    </script>
@endsection
