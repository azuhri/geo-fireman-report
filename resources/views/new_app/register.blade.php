@extends('template.mobile')
@section('title')
    Register
@endsection
@section('content')
{{-- {{dd(old("type_user"), old("name"))}} --}}
    <div class="relative">
        <div class="py-4 mt-8 flex flex-col items-center">
            <div class="flex justify-center items-center">
                <img src="{{asset('icons/Logogram.png')}}" alt="">
                <p class="font-bold text-slate-700 text-3xl">&nbsp;O'Fireport</p>
            </div>
            <div class="mt-10">
                <p class="text-center font-bold">Register!</p>
                <p class="text-center text-slate-500">Yuk register untuk mengakses O'Fireport!</p>
            </div>
        </div>
        <div class="px-8 w-full flex">
            <button onclick="changeForm( this, 'fireman');" class="btnSelect transition duration-500 flex w-1/2 justify-start shadow-xl border {{!old("type_user") || old("type_user") == "0" ? "border-orange-500" : ""}} mx-2 py-1 rounded-full">
                <img class="px-4 w-1/3" src="{{asset('icons/damkar-selected.png')}}" alt="">
                <div class="flex flex-col justify-center items-start">
                    <p id="fireman" class="transition duration-500 font-bold text-sm {{!old("type_user") || old("type_user") == "0" ? "text-orange-500" : ""}}">Fireman</p>
                    <small class="text-[11px] text-slate-500">Admin Damkar</small>
                </div>
            </button>
            <button onclick="changeForm( this, 'user');" class="btnSelect transition duration-500 flex w-1/2 justify-start border {{old("type_user") && old("type_user") == "1" ? "border-orange-500" : ""}} shadow-xl mx-2 py-1 rounded-full">
                <img class="px-4 w-1/3" src="{{asset('icons/user-selected.png')}}" alt="">
                <div class="flex flex-col justify-center items-start">
                    <p id="user" class="transition duration-500 font-bold text-sm {{old("type_user") && old("type_user") == "1" ? "text-orange-500" : ""}}">Masyarakat</p>
                    <small class="text-[11px] text-slate-500">Pelapor</small>
                </div>
            </button>
        </div>
        <div class="px-8 py-4 mb-4" id="formFireman" {{!old("type_user") || old("type_user") == "0" ? '' : 'style=display:none'}}>
            <form action="{{route('register.post')}}" method="POST">
                @csrf
                <input type="hidden" name="type_user" value="0">
                <div class="w-full my-2 flex flex-col relative">
                    <label for="name" class="mb-2 font-bold">Nama Unit Kebakaran<span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{old("type_user") == "0" ? old("name") : ""}}" id="name" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10" placeholder="Masukan nama unit kebakaran">
                    <svg class="absolute bottom-[18px] left-[16px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                        <path d="M5 2.66667C5.08774 2.66717 5.17471 2.65036 5.25594 2.61718C5.33716 2.584 5.41104 2.53512 5.47333 2.47333L6.14 1.80667C6.26553 1.68113 6.33606 1.51087 6.33606 1.33333C6.33606 1.1558 6.26553 0.985535 6.14 0.86C6.01446 0.734464 5.8442 0.663939 5.66667 0.663939C5.48913 0.663939 5.31887 0.734464 5.19333 0.86L4.52667 1.52667C4.46418 1.58864 4.41458 1.66238 4.38074 1.74362C4.34689 1.82485 4.32947 1.91199 4.32947 2C4.32947 2.08801 4.34689 2.17514 4.38074 2.25638C4.41458 2.33762 4.46418 2.41136 4.52667 2.47333C4.58896 2.53512 4.66284 2.584 4.74406 2.61718C4.82529 2.65036 4.91226 2.66717 5 2.66667ZM7.66667 2.66667C7.7544 2.66717 7.84138 2.65036 7.9226 2.61718C8.00383 2.584 8.07771 2.53512 8.14 2.47333L8.80667 1.80667C8.9322 1.68113 9.00273 1.51087 9.00273 1.33333C9.00273 1.1558 8.9322 0.985535 8.80667 0.86C8.68113 0.734464 8.51087 0.663939 8.33333 0.663939C8.1558 0.663939 7.98553 0.734464 7.86 0.86L7.19333 1.52667C7.13085 1.58864 7.08125 1.66238 7.0474 1.74362C7.01356 1.82485 6.99613 1.91199 6.99613 2C6.99613 2.08801 7.01356 2.17514 7.0474 2.25638C7.08125 2.33762 7.13085 2.41136 7.19333 2.47333C7.25563 2.53512 7.3295 2.584 7.41073 2.61718C7.49195 2.65036 7.57893 2.66717 7.66667 2.66667ZM10.3333 2.66667C10.4211 2.66717 10.508 2.65036 10.5893 2.61718C10.6705 2.584 10.7444 2.53512 10.8067 2.47333L11.4733 1.80667C11.5355 1.74451 11.5848 1.67071 11.6184 1.5895C11.6521 1.50828 11.6694 1.42124 11.6694 1.33333C11.6694 1.24543 11.6521 1.15838 11.6184 1.07717C11.5848 0.995952 11.5355 0.922159 11.4733 0.86C11.4112 0.797841 11.3374 0.748533 11.2562 0.714893C11.175 0.681253 11.0879 0.663939 11 0.663939C10.9121 0.663939 10.825 0.681253 10.7438 0.714893C10.6626 0.748533 10.5888 0.797841 10.5267 0.86L9.86 1.52667C9.79751 1.58864 9.74792 1.66238 9.71407 1.74362C9.68023 1.82485 9.6628 1.91199 9.6628 2C9.6628 2.08801 9.68023 2.17514 9.71407 2.25638C9.74792 2.33762 9.79751 2.41136 9.86 2.47333C9.92229 2.53512 9.99617 2.584 10.0774 2.61718C10.1586 2.65036 10.2456 2.66717 10.3333 2.66667ZM11.9467 10.4133C11.9321 10.3708 11.9119 10.3305 11.8867 10.2933L11.8067 10.1933L11.7067 10.1133C11.6695 10.0881 11.6291 10.0679 11.5867 10.0533C11.547 10.033 11.5042 10.0195 11.46 10.0133C11.3529 9.99189 11.2422 9.99709 11.1375 10.0285C11.0329 10.0599 10.9376 10.1165 10.86 10.1933C10.8313 10.225 10.8046 10.2584 10.78 10.2933C10.7548 10.3305 10.7346 10.3708 10.72 10.4133C10.7008 10.4511 10.6873 10.4916 10.68 10.5333C10.6767 10.5777 10.6767 10.6223 10.68 10.6667C10.6807 10.8416 10.7502 11.0092 10.8733 11.1333C10.935 11.1978 11.0101 11.2479 11.0933 11.28C11.1693 11.3125 11.2507 11.3306 11.3333 11.3333C11.5101 11.3333 11.6797 11.2631 11.8047 11.1381C11.9298 11.013 12 10.8435 12 10.6667C12.0033 10.6223 12.0033 10.5777 12 10.5333C11.9885 10.4908 11.9705 10.4503 11.9467 10.4133ZM13.1733 7.40667L12.2667 4.7C12.1284 4.30882 11.8718 3.97034 11.5326 3.73144C11.1934 3.49255 10.7882 3.36507 10.3733 3.36667H5.62667C5.21176 3.36507 4.80663 3.49255 4.4674 3.73144C4.12817 3.97034 3.87163 4.30882 3.73333 4.7L2.82667 7.40667C2.40022 7.51834 2.02261 7.76778 1.75255 8.1162C1.48249 8.46462 1.33512 8.89251 1.33333 9.33333V12C1.33449 12.4126 1.46325 12.8148 1.70196 13.1514C1.94066 13.488 2.27763 13.7425 2.66667 13.88V14.6667C2.66667 14.8435 2.7369 15.013 2.86193 15.1381C2.98695 15.2631 3.15652 15.3333 3.33333 15.3333C3.51014 15.3333 3.67971 15.2631 3.80474 15.1381C3.92976 15.013 4 14.8435 4 14.6667V14H12V14.6667C12 14.8435 12.0702 15.013 12.1953 15.1381C12.3203 15.2631 12.4899 15.3333 12.6667 15.3333C12.8435 15.3333 13.013 15.2631 13.1381 15.1381C13.2631 15.013 13.3333 14.8435 13.3333 14.6667V13.88C13.7224 13.7425 14.0593 13.488 14.298 13.1514C14.5367 12.8148 14.6655 12.4126 14.6667 12V9.33333C14.6649 8.89251 14.5175 8.46462 14.2474 8.1162C13.9774 7.76778 13.5998 7.51834 13.1733 7.40667ZM4.99333 5.12C5.03806 4.98759 5.12326 4.87258 5.23691 4.79123C5.35056 4.70988 5.4869 4.66631 5.62667 4.66667H10.3733C10.5187 4.65908 10.6626 4.69928 10.783 4.78114C10.9033 4.863 10.9936 4.98201 11.04 5.12L11.74 7.33333H4.26L4.99333 5.12ZM13.3333 12C13.3333 12.1768 13.2631 12.3464 13.1381 12.4714C13.013 12.5964 12.8435 12.6667 12.6667 12.6667H3.33333C3.15652 12.6667 2.98695 12.5964 2.86193 12.4714C2.7369 12.3464 2.66667 12.1768 2.66667 12V9.33333C2.66667 9.15652 2.7369 8.98695 2.86193 8.86193C2.98695 8.7369 3.15652 8.66667 3.33333 8.66667H12.6667C12.8435 8.66667 13.013 8.7369 13.1381 8.86193C13.2631 8.98695 13.3333 9.15652 13.3333 9.33333V12ZM8.66667 10H7.33333C7.15652 10 6.98695 10.0702 6.86193 10.1953C6.7369 10.3203 6.66667 10.4899 6.66667 10.6667C6.66667 10.8435 6.7369 11.013 6.86193 11.1381C6.98695 11.2631 7.15652 11.3333 7.33333 11.3333H8.66667C8.84348 11.3333 9.01305 11.2631 9.13807 11.1381C9.26309 11.013 9.33333 10.8435 9.33333 10.6667C9.33333 10.4899 9.26309 10.3203 9.13807 10.1953C9.01305 10.0702 8.84348 10 8.66667 10ZM5.28 10.4133C5.26541 10.3708 5.24523 10.3305 5.22 10.2933L5.14 10.1933C5.04625 10.1008 4.9272 10.0382 4.79787 10.0132C4.66855 9.98833 4.53474 10.0023 4.41333 10.0533C4.3315 10.0851 4.25673 10.1326 4.19333 10.1933C4.16466 10.225 4.13795 10.2584 4.11333 10.2933C4.0881 10.3305 4.06792 10.3708 4.05333 10.4133C4.02947 10.4503 4.01148 10.4908 4 10.5333C3.99673 10.5777 3.99673 10.6223 4 10.6667C4.00055 10.7985 4.04019 10.9272 4.1139 11.0366C4.18761 11.1459 4.29208 11.2309 4.4141 11.2808C4.53612 11.3308 4.67021 11.3434 4.79942 11.3172C4.92863 11.2909 5.04715 11.2269 5.14 11.1333C5.26316 11.0092 5.3326 10.8416 5.33333 10.6667C5.3366 10.6223 5.3366 10.5777 5.33333 10.5333C5.32185 10.4908 5.30386 10.4503 5.28 10.4133Z" fill="#5F6265"/>
                        </svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="phonenumber" class="mb-2 font-bold">Nomor Telepon<span class="text-red-500">*</span></label>
                    <input type="number" name="phonenumber" value="value="{{old("type_user") == "0" ? old("phonenumber") : ""}}" min="0"  id="phonenumber" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10" placeholder="Masukan nomor telepon unit kebakaran">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="alamat" class="mb-2 font-bold">Alamat<span class="text-red-500">*</span></label>
                    <textarea class="text-orange-500 outline-0 border border-slate-500 rounded-xl focus:border-orange-500 py-2 pl-10" name="alamat" id="alamat" cols="30" rows="3" placeholder="masukan alamat damkar disini..">{{old("type_user") == "0" ? old("alamat") : ""}}</textarea>
                    <svg  class="absolute top-[42px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="email" class="mb-2 font-bold">Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10" id="email" value="{{old("type_user") == "0" ? old("email") : ""}}" placeholder="Masukan email Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="password" class="mb-2 font-bold">Password<span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10 pr-8" id="email" placeholder="Masukan password Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4 hidden" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="confirm_password" class="mb-2 font-bold">Password Konfirmasi<span class="text-red-500">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10 pr-8" id="email" placeholder="Masukan password Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4 hidden" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <div class="mt-4">
                    <button class="w-full bg-orange-500 text-white font-bold py-4 rounded-full">Register</button>
                </div>
            </form>
        </div>
        <div class="px-8 py-4 mb-4" id="formUser" {{ old("type_user") == "1" ? '' : 'style=display:none'}} {{!old("type_user") ? 'style=display:none' : ''}}>
            <form action="{{route('register.post')}}" method="POST">
                @csrf
                <input type="hidden" name="type_user" value="1">
                <div class="w-full my-2 flex flex-col relative">
                    <label for="name" class="mb-2 font-bold">Nama Lengkap<span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{old("type_user") == "1" ? old("name") : ""}}" id="name" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10" placeholder="Masukan nama lengkap">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="phonenumber" class="mb-2 font-bold">Jenis Kelamin<span class="text-red-500">*</span></label>
                    <select name="gender" id="gender" class="text-sm text-slate-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10">
                        <option {{old("type_user") == "1" && old("gender") == "pria" ? "selected" : ""}} value="pria">Pria</option>
                        <option {{old("type_user") == "1" && old("gender") == "wanita" ? "selected" : ""}} value="wanita">Wanita</option>
                    </select>
                    <svg class="absolute bottom-[18px] left-[16px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                        <path d="M13.6133 2.74667C13.5457 2.58377 13.4162 2.45432 13.2533 2.38667C13.1732 2.35251 13.0871 2.33439 13 2.33334H10.3333C10.1565 2.33334 9.98695 2.40357 9.86193 2.5286C9.7369 2.65362 9.66667 2.82319 9.66667 3C9.66667 3.17681 9.7369 3.34638 9.86193 3.47141C9.98695 3.59643 10.1565 3.66667 10.3333 3.66667H11.3933L9.79333 5.26667C8.84861 4.55963 7.67112 4.23673 6.49789 4.36297C5.32466 4.48921 4.24282 5.05522 3.47013 5.94705C2.69745 6.83888 2.2913 7.99031 2.33346 9.16956C2.37561 10.3488 2.86293 11.4683 3.69731 12.3027C4.5317 13.1371 5.6512 13.6244 6.83044 13.6665C8.00969 13.7087 9.16112 13.3026 10.053 12.5299C10.9448 11.7572 11.5108 10.6753 11.637 9.50211C11.7633 8.32888 11.4404 7.15139 10.7333 6.20667L12.3333 4.60667V5.66667C12.3333 5.84348 12.4036 6.01305 12.5286 6.13807C12.6536 6.2631 12.8232 6.33334 13 6.33334C13.1768 6.33334 13.3464 6.2631 13.4714 6.13807C13.5964 6.01305 13.6667 5.84348 13.6667 5.66667V3C13.6656 2.91288 13.6475 2.82682 13.6133 2.74667ZM9.33333 11.3333C8.86985 11.8062 8.27606 12.1303 7.62766 12.2643C6.97926 12.3984 6.30563 12.3363 5.69266 12.0859C5.07969 11.8356 4.55515 11.4084 4.18593 10.8588C3.81671 10.3092 3.61952 9.66211 3.61952 9C3.61952 8.33789 3.81671 7.69078 4.18593 7.14118C4.55515 6.59158 5.07969 6.16438 5.69266 5.91406C6.30563 5.66375 6.97926 5.60165 7.62766 5.73569C8.27606 5.86973 8.86985 6.19383 9.33333 6.66667C9.94409 7.28977 10.2862 8.12749 10.2862 9C10.2862 9.87251 9.94409 10.7102 9.33333 11.3333Z" fill="#5F6265"/>
                        </svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="phonenumber" class="mb-2 font-bold">Nomor WA<span class="text-red-500">*</span></label>
                    <input onkeyup="formatWA(this);" type="number" name="phonenumber" value="{{old("type_user") == "1" ? old("phonenumber") : ""}}" min="0" id="phonenumber" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-20" placeholder="Masukan nomor WA Anda...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    <p class="font-bold text-orange-500 absolute bottom-[17px] left-[45px]">+62</p>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="alamat" class="mb-2 font-bold">Alamat<span class="text-red-500">*</span></label>
                    <textarea class="text-orange-500 outline-0 border border-slate-500 rounded-xl focus:border-orange-500 py-2 pl-10" name="alamat" id="alamat" cols="30" rows="3" placeholder="masukan alamat Anda disini..">{{old("type_user") == "1" ? old("alamat") : ""}}</textarea>
                    <svg  class="absolute top-[42px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="email" class="mb-2 font-bold">Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10" id="email" value="{{old("type_user") == "1" ? old("email") : ""}}" placeholder="Masukan email Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="password" class="mb-2 font-bold">Password<span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="password" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10 pr-8" id="email" placeholder="Masukan password Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4 hidden" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <div class="w-full my-2 flex flex-col relative">
                    <label for="confirm_password" class="mb-2 font-bold">Password Konfirmasi<span class="text-red-500">*</span></label>
                    <input type="password" name="confirm_password" id="confirm_password" class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-4 pl-10 pr-8" id="email" placeholder="Masukan password Anda disini...">
                    <svg class="absolute bottom-[18px] left-[16px]" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                    <svg onclick="showPassword(this);" class="cursor-pointer absolute right-3 bottom-4 hidden" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                </div>
                <div class="mt-4">
                    <button class="w-full bg-orange-500 text-white font-bold py-4 rounded-full">Register</button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-2 mb-8 w-full">
        <p class="text-center text-slate-500">Sudah punya akun? <a href="{{route('login')}}" class="font-bold text-orange-500">Yuk login!</a></p>
    </div>
</div>
</div>
@endsection

@section('js')
<script>
    @if(session("success"))
        $.Toast("Pesan Notifikasi","{{session('success')}}", "success");
    @endif
    @if(session("errors"))
        $.Toast("Pesan Notifikasi","{{$errors->first()}}", "error");
    @endif

    const changeForm = (self, typeForm) => {
        if(typeForm == "fireman") {
            $("#user").removeClass("text-orange-500");
            $(".btnSelect").removeClass("border-orange-500");
            
            $("#fireman").addClass("text-orange-500");
            $(self).addClass("border-orange-500");

            $("#formUser").hide();
            $("#formFireman").show(500);
        } else {
            $("#fireman").removeClass("text-orange-500");
            $(".btnSelect").removeClass("border-orange-500");
            
            $("#user").addClass("text-orange-500");
            $(self).addClass("border-orange-500");

            $("#formFireman").hide();
            $("#formUser").show(500);
        }
    }

    const showPassword = (self) => {
        let parent = $(self).parent();
        let showIcon = parent.children().eq(4);
        let hideIcon = parent.children().eq(3);
        let password = parent.find("input");
        if(password.attr("type") == "password") {
            password.attr("type","text");
            hideIcon.addClass("hidden");
            showIcon.removeClass("hidden");
        } else {
            password.attr("type","password");
            showIcon.addClass("hidden");
            hideIcon.removeClass("hidden");
        }
    }

    const formatWA = (self) => {
        let nomor = $(self).val();
        let formatNomor;
        if(nomor[0] == "0") {
            formatNomor = nomor.replace(/^0/, '');
        } else {
            formatNomor = nomor.replace(/^62/, '');
        }
        $(self).val(formatNomor);
    }
</script>
@endsection