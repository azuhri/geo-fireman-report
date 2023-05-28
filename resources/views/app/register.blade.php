@extends('template.mobile')
@section('title')
    Register
@endsection
@section('content')
    <div class="p-8">
        <a href="{{route('select-user-register')}}" class="flex  w-full">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="black" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            <span class="mx-2 font-poppins font-bold">Kembali</span>
        </a>
    </div>
    <div class="h-full p-8 flex flex-col">
        <h1 class="text-xl mb-2 text-center font-poppins font-extrabold w-full text-orange-900">Daftar {{$copyWriteUserType}}</h1>
        <p class="mb-4"></p>
        <div class="w-full my-2 flex justify-center">
            <div class="p-2 w-1/3">
                <img src="{{$typeUser == "user" ? asset('image/peoples.png') : asset('image/fireman2.png')}}" alt="">
            </div>
        </div>
        <form action="{{route('register.post')}}" method="post" class="w-full mb-4">
            @csrf
            <input type="hidden" name="type_user" value="{{$typeUser == "user" ? "1" : "0"}}">
            @if ($typeUser == "user")
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-poppins" for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required placeholder="Masukan lengkap Anda" class="border border-slate-300 p-3 rounded-md">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-poppins" for="gender">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="gender" name="gender" class="border border-slate-300 p-3 rounded-md">
                        <option value="pria">Pria</option>
                        <option value="wanita">Wanita</option>
                    </select>
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-poppins" for="phonenumber">Nomor WA</label>
                    <div class="relative">
                        <span class="top-[14px] left-[0px] absolute text-slate-900 font-bold font-poppins border-e-slate-500 border-r-2 px-2">+62</span>
                        <input type="number" required id="phonenumber" name="phonenumber" onkeyup="filterPhonenumber(this);" placeholder="Masukan nomor WA Anda" class="border border-slate-300 p-3 pl-14 rounded-md w-full">
                        <p class="text-xs my-[2px] text-red-500" id="alert-wa" style="display: none">Nomor WA minimal 10 digit angka</p>
                    </div>
                </div>
            @else 
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-poppins" for="name">Nama Unit Kebakaran</label>
                    <input type="text" required id="name" name="name" placeholder="Masukan nama unit kebakaran" class="border border-slate-300 p-3 rounded-md">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-poppins" for="phonenumber">Nomor Telepon</label>
                    <input type="number" required id="phonenumber"  name="phonenumber" placeholder="Masukan nomor telepon" class="border border-slate-300 p-3 rounded-md">
                </div>
            @endif
            <div class="mb-4 flex flex-col">
                <label class="mb-2 font-poppins" for="address">Alamat</label>
                <textarea required class="border border-slate-300 p-3 rounded-md" name="address" id="address" cols="30" rows="2"></textarea>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="email">Email</label>
                <input type="email" id="email" required name="email" placeholder="Masukan email Anda" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukan password" class="border border-slate-300 p-3 rounded-md">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-poppins" for="confirm_password">Konfirmasi Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Masukan konfirmasi password" class="border border-slate-300 p-3 rounded-md">
            </div>
            <button class="rounded-lg bg-orange-500	 text-center w-full py-3 text-white text-xl font-poppins">
                Daftar
            </button>
        </form>
    </div>
@endsection
@section("js")
<script>
// $.Toast("Message","Something Error", "error","{{asset('icons/fireman.png')}}");
const filterPhonenumber = (self) => {
    let number = $(self).val();
    number = number.replace("62");
    $(self).val(number);
    if(number.length < 10) {
        $("#alert-wa").show(500);
    } else {
        $("#alert-wa").hide(500);
    }
}
</script>
@endsection