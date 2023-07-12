@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Beranda
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        .leaflet-routing-container {
            display: none;
        }

        #bottomNavbar {
            display: none !important;
        }
    </style>
@endsection
@section('back')
    <div class="mt-10 mb-4 flex justify-center">
        <button onclick="history.back()" class="shadow border absolute left-3 bg-white rounded-full p-2 bottom-[-5px]">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </button>
        <p class="font-semibold text-lg">Buat Laporan</p>
    </div>
@endsection
@section('dashboard_content')
    <div class="h-screen relative px-4">
        <div class="my-10 px-6 py-4 bg-[#DC3545] rounded-3xl">
            <div class="flex w-full">
                <div class="p-2 bg-[#E35D6A] rounded-[25px]">
                    <div class="p-2 bg-[#EA868F] rounded-[25px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 7C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8V12C11 12.2652 11.1054 12.5196 11.2929 12.7071C11.4804 12.8946 11.7348 13 12 13C12.2652 13 12.5196 12.8946 12.7071 12.7071C12.8946 12.5196 13 12.2652 13 12V8C13 7.73478 12.8946 7.48043 12.7071 7.29289C12.5196 7.10536 12.2652 7 12 7ZM12.92 15.62C12.8981 15.5563 12.8679 15.4957 12.83 15.44L12.71 15.29C12.5694 15.1512 12.3908 15.0572 12.1968 15.0199C12.0028 14.9825 11.8021 15.0034 11.62 15.08C11.4988 15.1306 11.3872 15.2017 11.29 15.29C11.1973 15.3834 11.124 15.4943 11.0742 15.6161C11.0245 15.7379 10.9992 15.8684 11 16C11.0016 16.1307 11.0288 16.2598 11.08 16.38C11.1249 16.5041 11.1966 16.6168 11.2899 16.7101C11.3832 16.8034 11.4959 16.8751 11.62 16.92C11.7397 16.9729 11.8691 17.0002 12 17.0002C12.1309 17.0002 12.2603 16.9729 12.38 16.92C12.5041 16.8751 12.6168 16.8034 12.7101 16.7101C12.8034 16.6168 12.8751 16.5041 12.92 16.38C12.9712 16.2598 12.9984 16.1307 13 16C13.0049 15.9334 13.0049 15.8666 13 15.8C12.9828 15.7362 12.9558 15.6755 12.92 15.62ZM12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2ZM12 20C10.4178 20 8.87104 19.5308 7.55544 18.6518C6.23985 17.7727 5.21447 16.5233 4.60897 15.0615C4.00347 13.5997 3.84504 11.9911 4.15372 10.4393C4.4624 8.88743 5.22433 7.46197 6.34315 6.34315C7.46197 5.22433 8.88743 4.4624 10.4393 4.15372C11.9911 3.84504 13.5997 4.00346 15.0615 4.60896C16.5233 5.21447 17.7727 6.23984 18.6518 7.55544C19.5308 8.87103 20 10.4177 20 12C20 14.1217 19.1572 16.1566 17.6569 17.6569C16.1566 19.1571 14.1217 20 12 20Z"
                                fill="white" />
                        </svg>
                    </div>
                </div>
                <div class="px-4 flex flex-col justify-center">
                    <p class="font-semibold text-sm text-white">Peringatan Serius!</p>
                    <p class="font-light text-sm text-white">Harap membuat laporan yang kredibel!</p>
                </div>
            </div>
        </div>
        <form action="javascript:void(0);" method="post" class="mb-[100px]">
            @csrf
            <div class="w-full my-2 flex flex-col relative">
                <label for="fireman_id" class="mb-2 font-semibold text-sm">Pilihan Unit Pemadam Kebakaran<span
                        class="text-red-500">*</span></label>
                <select name="fireman_id" onchange="flyTo(this)" id="fireman_id"
                    class="bg-transparent text-sm text-slate-500 outline-0 border border-slate-500 rounded-full focus:border-2 focus:border-green-700 py-4 pl-10">
                    @foreach ($firemans as $fireman)
                        <option class="text-yellow-700"
                            value="{{ $fireman->latitude . ',' . $fireman->longitude . ',' . $fireman->id }}">
                            {{ $fireman->name }}</option>
                    @endforeach
                </select>
                <svg class="absolute bottom-[18px] left-[16px]" xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M5 2.66667C5.08774 2.66717 5.17471 2.65036 5.25594 2.61718C5.33716 2.584 5.41104 2.53512 5.47333 2.47333L6.14 1.80667C6.26553 1.68113 6.33606 1.51087 6.33606 1.33333C6.33606 1.1558 6.26553 0.985535 6.14 0.86C6.01446 0.734464 5.8442 0.663939 5.66667 0.663939C5.48913 0.663939 5.31887 0.734464 5.19333 0.86L4.52667 1.52667C4.46418 1.58864 4.41458 1.66238 4.38074 1.74362C4.34689 1.82485 4.32947 1.91199 4.32947 2C4.32947 2.08801 4.34689 2.17514 4.38074 2.25638C4.41458 2.33762 4.46418 2.41136 4.52667 2.47333C4.58896 2.53512 4.66284 2.584 4.74406 2.61718C4.82529 2.65036 4.91226 2.66717 5 2.66667ZM7.66667 2.66667C7.7544 2.66717 7.84138 2.65036 7.9226 2.61718C8.00383 2.584 8.07771 2.53512 8.14 2.47333L8.80667 1.80667C8.9322 1.68113 9.00273 1.51087 9.00273 1.33333C9.00273 1.1558 8.9322 0.985535 8.80667 0.86C8.68113 0.734464 8.51087 0.663939 8.33333 0.663939C8.1558 0.663939 7.98553 0.734464 7.86 0.86L7.19333 1.52667C7.13085 1.58864 7.08125 1.66238 7.0474 1.74362C7.01356 1.82485 6.99613 1.91199 6.99613 2C6.99613 2.08801 7.01356 2.17514 7.0474 2.25638C7.08125 2.33762 7.13085 2.41136 7.19333 2.47333C7.25563 2.53512 7.3295 2.584 7.41073 2.61718C7.49195 2.65036 7.57893 2.66717 7.66667 2.66667ZM10.3333 2.66667C10.4211 2.66717 10.508 2.65036 10.5893 2.61718C10.6705 2.584 10.7444 2.53512 10.8067 2.47333L11.4733 1.80667C11.5355 1.74451 11.5848 1.67071 11.6184 1.5895C11.6521 1.50828 11.6694 1.42124 11.6694 1.33333C11.6694 1.24543 11.6521 1.15838 11.6184 1.07717C11.5848 0.995952 11.5355 0.922159 11.4733 0.86C11.4112 0.797841 11.3374 0.748533 11.2562 0.714893C11.175 0.681253 11.0879 0.663939 11 0.663939C10.9121 0.663939 10.825 0.681253 10.7438 0.714893C10.6626 0.748533 10.5888 0.797841 10.5267 0.86L9.86 1.52667C9.79751 1.58864 9.74792 1.66238 9.71407 1.74362C9.68023 1.82485 9.6628 1.91199 9.6628 2C9.6628 2.08801 9.68023 2.17514 9.71407 2.25638C9.74792 2.33762 9.79751 2.41136 9.86 2.47333C9.92229 2.53512 9.99617 2.584 10.0774 2.61718C10.1586 2.65036 10.2456 2.66717 10.3333 2.66667ZM11.9467 10.4133C11.9321 10.3708 11.9119 10.3305 11.8867 10.2933L11.8067 10.1933L11.7067 10.1133C11.6695 10.0881 11.6291 10.0679 11.5867 10.0533C11.547 10.033 11.5042 10.0195 11.46 10.0133C11.3529 9.99189 11.2422 9.99709 11.1375 10.0285C11.0329 10.0599 10.9376 10.1165 10.86 10.1933C10.8313 10.225 10.8046 10.2584 10.78 10.2933C10.7548 10.3305 10.7346 10.3708 10.72 10.4133C10.7008 10.4511 10.6873 10.4916 10.68 10.5333C10.6767 10.5777 10.6767 10.6223 10.68 10.6667C10.6807 10.8416 10.7502 11.0092 10.8733 11.1333C10.935 11.1978 11.0101 11.2479 11.0933 11.28C11.1693 11.3125 11.2507 11.3306 11.3333 11.3333C11.5101 11.3333 11.6797 11.2631 11.8047 11.1381C11.9298 11.013 12 10.8435 12 10.6667C12.0033 10.6223 12.0033 10.5777 12 10.5333C11.9885 10.4908 11.9705 10.4503 11.9467 10.4133ZM13.1733 7.40667L12.2667 4.7C12.1284 4.30882 11.8718 3.97034 11.5326 3.73144C11.1934 3.49255 10.7882 3.36507 10.3733 3.36667H5.62667C5.21176 3.36507 4.80663 3.49255 4.4674 3.73144C4.12817 3.97034 3.87163 4.30882 3.73333 4.7L2.82667 7.40667C2.40022 7.51834 2.02261 7.76778 1.75255 8.1162C1.48249 8.46462 1.33512 8.89251 1.33333 9.33333V12C1.33449 12.4126 1.46325 12.8148 1.70196 13.1514C1.94066 13.488 2.27763 13.7425 2.66667 13.88V14.6667C2.66667 14.8435 2.7369 15.013 2.86193 15.1381C2.98695 15.2631 3.15652 15.3333 3.33333 15.3333C3.51014 15.3333 3.67971 15.2631 3.80474 15.1381C3.92976 15.013 4 14.8435 4 14.6667V14H12V14.6667C12 14.8435 12.0702 15.013 12.1953 15.1381C12.3203 15.2631 12.4899 15.3333 12.6667 15.3333C12.8435 15.3333 13.013 15.2631 13.1381 15.1381C13.2631 15.013 13.3333 14.8435 13.3333 14.6667V13.88C13.7224 13.7425 14.0593 13.488 14.298 13.1514C14.5367 12.8148 14.6655 12.4126 14.6667 12V9.33333C14.6649 8.89251 14.5175 8.46462 14.2474 8.1162C13.9774 7.76778 13.5998 7.51834 13.1733 7.40667ZM4.99333 5.12C5.03806 4.98759 5.12326 4.87258 5.23691 4.79123C5.35056 4.70988 5.4869 4.66631 5.62667 4.66667H10.3733C10.5187 4.65908 10.6626 4.69928 10.783 4.78114C10.9033 4.863 10.9936 4.98201 11.04 5.12L11.74 7.33333H4.26L4.99333 5.12ZM13.3333 12C13.3333 12.1768 13.2631 12.3464 13.1381 12.4714C13.013 12.5964 12.8435 12.6667 12.6667 12.6667H3.33333C3.15652 12.6667 2.98695 12.5964 2.86193 12.4714C2.7369 12.3464 2.66667 12.1768 2.66667 12V9.33333C2.66667 9.15652 2.7369 8.98695 2.86193 8.86193C2.98695 8.7369 3.15652 8.66667 3.33333 8.66667H12.6667C12.8435 8.66667 13.013 8.7369 13.1381 8.86193C13.2631 8.98695 13.3333 9.15652 13.3333 9.33333V12ZM8.66667 10H7.33333C7.15652 10 6.98695 10.0702 6.86193 10.1953C6.7369 10.3203 6.66667 10.4899 6.66667 10.6667C6.66667 10.8435 6.7369 11.013 6.86193 11.1381C6.98695 11.2631 7.15652 11.3333 7.33333 11.3333H8.66667C8.84348 11.3333 9.01305 11.2631 9.13807 11.1381C9.26309 11.013 9.33333 10.8435 9.33333 10.6667C9.33333 10.4899 9.26309 10.3203 9.13807 10.1953C9.01305 10.0702 8.84348 10 8.66667 10ZM5.28 10.4133C5.26541 10.3708 5.24523 10.3305 5.22 10.2933L5.14 10.1933C5.04625 10.1008 4.9272 10.0382 4.79787 10.0132C4.66855 9.98833 4.53474 10.0023 4.41333 10.0533C4.3315 10.0851 4.25673 10.1326 4.19333 10.1933C4.16466 10.225 4.13795 10.2584 4.11333 10.2933C4.0881 10.3305 4.06792 10.3708 4.05333 10.4133C4.02947 10.4503 4.01148 10.4908 4 10.5333C3.99673 10.5777 3.99673 10.6223 4 10.6667C4.00055 10.7985 4.04019 10.9272 4.1139 11.0366C4.18761 11.1459 4.29208 11.2309 4.4141 11.2808C4.53612 11.3308 4.67021 11.3434 4.79942 11.3172C4.92863 11.2909 5.04715 11.2269 5.14 11.1333C5.26316 11.0092 5.3326 10.8416 5.33333 10.6667C5.3366 10.6223 5.3366 10.5777 5.33333 10.5333C5.32185 10.4908 5.30386 10.4503 5.28 10.4133Z"
                        fill="#5F6265" />
                </svg>
            </div>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
            <div class="relative">
                <div id="map"
                    class="min-h-[300px] rounded-2xl shadow-lg border-2 sm:min-w-[300px]  md:min-h-[300px] max-w-[600px]">
                </div>
                <button type="button"
                    class="text-xs font-bold absolute left-1 font-bold text-white rounded shadow bg-green-700 border border-slate-500 shadow-lg px-4 bottom-1 z-[9999] py-2"
                    onclick="buttonGetLocaltionUser();">Deteksi Lokasi Anda</button>
            </div>
            <div class="w-full my-2 flex flex-col relative">
                <label for="type_report" class="mb-2 font-semibold text-sm">Level Laporan<span
                        class="text-red-500">*</span></label>
                <select name="type_report" onchange="flyTo(this)" id="type_report"
                    class="bg-transparent text-sm text-slate-500 outline-0 border border-slate-500 rounded-full focus:border-2 focus:border-green-700 py-4 pl-10">
                    <option class="text-yellow-700" value="1">Level 1</option>
                    <option class="text-yellow-700" value="2">Level 2</option>
                    <option class="text-yellow-700" value="3">Level 3</option>
                </select>
                <svg class="absolute bottom-[18px] left-[16px]" xmlns="http://www.w3.org/2000/svg" width="20"
                    height="20" viewBox="0 0 16 16" fill="none">
                    <path
                        d="M5 2.66667C5.08774 2.66717 5.17471 2.65036 5.25594 2.61718C5.33716 2.584 5.41104 2.53512 5.47333 2.47333L6.14 1.80667C6.26553 1.68113 6.33606 1.51087 6.33606 1.33333C6.33606 1.1558 6.26553 0.985535 6.14 0.86C6.01446 0.734464 5.8442 0.663939 5.66667 0.663939C5.48913 0.663939 5.31887 0.734464 5.19333 0.86L4.52667 1.52667C4.46418 1.58864 4.41458 1.66238 4.38074 1.74362C4.34689 1.82485 4.32947 1.91199 4.32947 2C4.32947 2.08801 4.34689 2.17514 4.38074 2.25638C4.41458 2.33762 4.46418 2.41136 4.52667 2.47333C4.58896 2.53512 4.66284 2.584 4.74406 2.61718C4.82529 2.65036 4.91226 2.66717 5 2.66667ZM7.66667 2.66667C7.7544 2.66717 7.84138 2.65036 7.9226 2.61718C8.00383 2.584 8.07771 2.53512 8.14 2.47333L8.80667 1.80667C8.9322 1.68113 9.00273 1.51087 9.00273 1.33333C9.00273 1.1558 8.9322 0.985535 8.80667 0.86C8.68113 0.734464 8.51087 0.663939 8.33333 0.663939C8.1558 0.663939 7.98553 0.734464 7.86 0.86L7.19333 1.52667C7.13085 1.58864 7.08125 1.66238 7.0474 1.74362C7.01356 1.82485 6.99613 1.91199 6.99613 2C6.99613 2.08801 7.01356 2.17514 7.0474 2.25638C7.08125 2.33762 7.13085 2.41136 7.19333 2.47333C7.25563 2.53512 7.3295 2.584 7.41073 2.61718C7.49195 2.65036 7.57893 2.66717 7.66667 2.66667ZM10.3333 2.66667C10.4211 2.66717 10.508 2.65036 10.5893 2.61718C10.6705 2.584 10.7444 2.53512 10.8067 2.47333L11.4733 1.80667C11.5355 1.74451 11.5848 1.67071 11.6184 1.5895C11.6521 1.50828 11.6694 1.42124 11.6694 1.33333C11.6694 1.24543 11.6521 1.15838 11.6184 1.07717C11.5848 0.995952 11.5355 0.922159 11.4733 0.86C11.4112 0.797841 11.3374 0.748533 11.2562 0.714893C11.175 0.681253 11.0879 0.663939 11 0.663939C10.9121 0.663939 10.825 0.681253 10.7438 0.714893C10.6626 0.748533 10.5888 0.797841 10.5267 0.86L9.86 1.52667C9.79751 1.58864 9.74792 1.66238 9.71407 1.74362C9.68023 1.82485 9.6628 1.91199 9.6628 2C9.6628 2.08801 9.68023 2.17514 9.71407 2.25638C9.74792 2.33762 9.79751 2.41136 9.86 2.47333C9.92229 2.53512 9.99617 2.584 10.0774 2.61718C10.1586 2.65036 10.2456 2.66717 10.3333 2.66667ZM11.9467 10.4133C11.9321 10.3708 11.9119 10.3305 11.8867 10.2933L11.8067 10.1933L11.7067 10.1133C11.6695 10.0881 11.6291 10.0679 11.5867 10.0533C11.547 10.033 11.5042 10.0195 11.46 10.0133C11.3529 9.99189 11.2422 9.99709 11.1375 10.0285C11.0329 10.0599 10.9376 10.1165 10.86 10.1933C10.8313 10.225 10.8046 10.2584 10.78 10.2933C10.7548 10.3305 10.7346 10.3708 10.72 10.4133C10.7008 10.4511 10.6873 10.4916 10.68 10.5333C10.6767 10.5777 10.6767 10.6223 10.68 10.6667C10.6807 10.8416 10.7502 11.0092 10.8733 11.1333C10.935 11.1978 11.0101 11.2479 11.0933 11.28C11.1693 11.3125 11.2507 11.3306 11.3333 11.3333C11.5101 11.3333 11.6797 11.2631 11.8047 11.1381C11.9298 11.013 12 10.8435 12 10.6667C12.0033 10.6223 12.0033 10.5777 12 10.5333C11.9885 10.4908 11.9705 10.4503 11.9467 10.4133ZM13.1733 7.40667L12.2667 4.7C12.1284 4.30882 11.8718 3.97034 11.5326 3.73144C11.1934 3.49255 10.7882 3.36507 10.3733 3.36667H5.62667C5.21176 3.36507 4.80663 3.49255 4.4674 3.73144C4.12817 3.97034 3.87163 4.30882 3.73333 4.7L2.82667 7.40667C2.40022 7.51834 2.02261 7.76778 1.75255 8.1162C1.48249 8.46462 1.33512 8.89251 1.33333 9.33333V12C1.33449 12.4126 1.46325 12.8148 1.70196 13.1514C1.94066 13.488 2.27763 13.7425 2.66667 13.88V14.6667C2.66667 14.8435 2.7369 15.013 2.86193 15.1381C2.98695 15.2631 3.15652 15.3333 3.33333 15.3333C3.51014 15.3333 3.67971 15.2631 3.80474 15.1381C3.92976 15.013 4 14.8435 4 14.6667V14H12V14.6667C12 14.8435 12.0702 15.013 12.1953 15.1381C12.3203 15.2631 12.4899 15.3333 12.6667 15.3333C12.8435 15.3333 13.013 15.2631 13.1381 15.1381C13.2631 15.013 13.3333 14.8435 13.3333 14.6667V13.88C13.7224 13.7425 14.0593 13.488 14.298 13.1514C14.5367 12.8148 14.6655 12.4126 14.6667 12V9.33333C14.6649 8.89251 14.5175 8.46462 14.2474 8.1162C13.9774 7.76778 13.5998 7.51834 13.1733 7.40667ZM4.99333 5.12C5.03806 4.98759 5.12326 4.87258 5.23691 4.79123C5.35056 4.70988 5.4869 4.66631 5.62667 4.66667H10.3733C10.5187 4.65908 10.6626 4.69928 10.783 4.78114C10.9033 4.863 10.9936 4.98201 11.04 5.12L11.74 7.33333H4.26L4.99333 5.12ZM13.3333 12C13.3333 12.1768 13.2631 12.3464 13.1381 12.4714C13.013 12.5964 12.8435 12.6667 12.6667 12.6667H3.33333C3.15652 12.6667 2.98695 12.5964 2.86193 12.4714C2.7369 12.3464 2.66667 12.1768 2.66667 12V9.33333C2.66667 9.15652 2.7369 8.98695 2.86193 8.86193C2.98695 8.7369 3.15652 8.66667 3.33333 8.66667H12.6667C12.8435 8.66667 13.013 8.7369 13.1381 8.86193C13.2631 8.98695 13.3333 9.15652 13.3333 9.33333V12ZM8.66667 10H7.33333C7.15652 10 6.98695 10.0702 6.86193 10.1953C6.7369 10.3203 6.66667 10.4899 6.66667 10.6667C6.66667 10.8435 6.7369 11.013 6.86193 11.1381C6.98695 11.2631 7.15652 11.3333 7.33333 11.3333H8.66667C8.84348 11.3333 9.01305 11.2631 9.13807 11.1381C9.26309 11.013 9.33333 10.8435 9.33333 10.6667C9.33333 10.4899 9.26309 10.3203 9.13807 10.1953C9.01305 10.0702 8.84348 10 8.66667 10ZM5.28 10.4133C5.26541 10.3708 5.24523 10.3305 5.22 10.2933L5.14 10.1933C5.04625 10.1008 4.9272 10.0382 4.79787 10.0132C4.66855 9.98833 4.53474 10.0023 4.41333 10.0533C4.3315 10.0851 4.25673 10.1326 4.19333 10.1933C4.16466 10.225 4.13795 10.2584 4.11333 10.2933C4.0881 10.3305 4.06792 10.3708 4.05333 10.4133C4.02947 10.4503 4.01148 10.4908 4 10.5333C3.99673 10.5777 3.99673 10.6223 4 10.6667C4.00055 10.7985 4.04019 10.9272 4.1139 11.0366C4.18761 11.1459 4.29208 11.2309 4.4141 11.2808C4.53612 11.3308 4.67021 11.3434 4.79942 11.3172C4.92863 11.2909 5.04715 11.2269 5.14 11.1333C5.26316 11.0092 5.3326 10.8416 5.33333 10.6667C5.3366 10.6223 5.3366 10.5777 5.33333 10.5333C5.32185 10.4908 5.30386 10.4503 5.28 10.4133Z"
                        fill="#5F6265" />
                </svg>
            </div>
            <div class="w-full my-2 flex flex-col relative">
                <label for="description" class="mb-2 font-semibold text-sm">Deskripsi Kejadian<span
                        class="text-xs font-light"> (opsional)</span></label>
                <textarea
                    class="bg-transparent border-slate-400 text-sm border outline-0 focus:border-2 rounded-xl focus:border-green-500 py-2 px-4"
                    name="description" id="description" cols="30" rows="3" placeholder="masukan deskripsi kejadian.."></textarea>
            </div>
            <div class="w-full my-2 flex flex-col relative">
                <label for="type_report" class="mb-2 font-semibold text-sm">Foto Kejadian<span
                        class="text-xs font-light"> (opsional)</span></label>
                <div class="image-preview-container flex items-center" id="listImage">
                    {{-- <div class="preview flex justify-center border w-[65px] rounded-xl">
                        <img class="w-full rounded-xl mx-1" id="preview-selected-image" />
                    </div> --}}
                    <label class="cursor-pointer mx-2 p-4 bg-white flex justify-center border w-[65px] rounded-xl"
                        for="file-upload"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            viewBox="0 0 32 32" fill="none">
                            <path
                                d="M25.3333 14.6667H17.3333V6.66668C17.3333 6.31305 17.1928 5.97392 16.9427 5.72387C16.6927 5.47382 16.3535 5.33334 15.9999 5.33334C15.6463 5.33334 15.3072 5.47382 15.0571 5.72387C14.8071 5.97392 14.6666 6.31305 14.6666 6.66668V14.6667H6.66659C6.31296 14.6667 5.97382 14.8072 5.72378 15.0572C5.47373 15.3072 5.33325 15.6464 5.33325 16C5.33325 16.3536 5.47373 16.6928 5.72378 16.9428C5.97382 17.1929 6.31296 17.3333 6.66659 17.3333H14.6666V25.3333C14.6666 25.687 14.8071 26.0261 15.0571 26.2762C15.3072 26.5262 15.6463 26.6667 15.9999 26.6667C16.3535 26.6667 16.6927 26.5262 16.9427 26.2762C17.1928 26.0261 17.3333 25.687 17.3333 25.3333V17.3333H25.3333C25.6869 17.3333 26.026 17.1929 26.2761 16.9428C26.5261 16.6928 26.6666 16.3536 26.6666 16C26.6666 15.6464 26.5261 15.3072 26.2761 15.0572C26.026 14.8072 25.6869 14.6667 25.3333 14.6667Z"
                                fill="#5F6265" />
                        </svg></label>
                    <input accept=".png, .jpg, .jpeg" class="hidden" type="file" id="file-upload" accept="image/*"
                        onchange="previewImage(event);" />
                </div>
            </div>
            <div class="my-2 ">
                <button onclick="createReport();" onclick="createReport();"
                    class="flex items-center justify-center text-sm text-center font-semibold bg-[#FE5D26] w-full text-white py-4 rounded-full"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                        fill="none">
                        <path
                            d="M5.6452 5.59636L5.6437 5.59758L5.64227 5.59897L5.6452 5.59636ZM12.2813 5.47201C12.2349 5.42731 12.1834 5.38819 12.1279 5.35547C12.0494 5.30924 11.9622 5.27962 11.8718 5.26843C11.7813 5.25724 11.6895 5.26472 11.6021 5.29041C11.5147 5.3161 11.4334 5.35945 11.3634 5.41779C11.2934 5.47612 11.2361 5.5482 11.195 5.62956C10.9654 6.08202 10.6486 6.48469 10.263 6.81446C10.322 6.48219 10.3517 6.1454 10.3519 5.80794C10.3531 4.78134 10.0823 3.77275 9.56697 2.88485C9.05166 1.99695 8.31027 1.26147 7.41827 0.753276C7.32001 0.697574 7.20921 0.667749 7.09627 0.666599C6.98332 0.66545 6.87193 0.693013 6.77256 0.746704C6.67318 0.800394 6.58908 0.878451 6.52813 0.97355C6.46719 1.06865 6.4314 1.17767 6.42413 1.29039C6.38683 1.92251 6.22158 2.54047 5.93839 3.10683C5.65521 3.6732 5.25999 4.17618 4.77669 4.5853L4.62304 4.7103C4.11765 5.05036 3.6703 5.46956 3.29817 5.95183C2.71972 6.68057 2.319 7.53406 2.12781 8.44462C1.93662 9.35517 1.96021 10.2978 2.1967 11.1976C2.4332 12.0975 2.8761 12.9298 3.49029 13.6287C4.10447 14.3276 4.87304 14.8738 5.73505 15.224C5.83626 15.2653 5.94609 15.2811 6.05486 15.27C6.16363 15.2589 6.26799 15.2212 6.35874 15.1602C6.44948 15.0992 6.52382 15.0168 6.5752 14.9203C6.62658 14.8238 6.65342 14.7161 6.65335 14.6068C6.65288 14.5361 6.64168 14.4658 6.62015 14.3984C6.471 13.8378 6.42805 13.2542 6.49352 12.6777C7.12435 13.8676 8.13695 14.8107 9.36852 15.3555C9.51885 15.4227 9.68879 15.4318 9.84541 15.3809C10.8185 15.0668 11.695 14.5092 12.3918 13.7609C13.0887 13.0126 13.5826 12.0986 13.8267 11.1057C14.0707 10.1128 14.0569 9.074 13.7864 8.08796C13.5159 7.10192 12.9978 6.20141 12.2813 5.47201ZM9.67808 14.026C9.09696 13.7315 8.58433 13.318 8.17352 12.8124C7.76271 12.3067 7.46292 11.7203 7.29364 11.0912C7.24194 10.8793 7.20195 10.6648 7.17385 10.4486C7.15481 10.3109 7.09321 10.1826 6.99766 10.0816C6.90212 9.98063 6.77741 9.91204 6.64097 9.88542C6.59894 9.87714 6.5562 9.87299 6.51335 9.87306C6.39618 9.87301 6.28107 9.90387 6.17963 9.96251C6.07818 10.0211 5.994 10.1055 5.93555 10.2071C5.3824 11.1611 5.10422 12.2497 5.13184 13.3522C4.64533 12.974 4.23874 12.5029 3.93563 11.9664C3.63251 11.4298 3.4389 10.8384 3.36602 10.2265C3.29314 9.61457 3.34244 8.99426 3.51106 8.40152C3.67967 7.80878 3.96426 7.25541 4.34831 6.77346C4.63992 6.39469 4.99171 6.06632 5.38965 5.80146C5.40688 5.79034 5.4234 5.77817 5.43913 5.765C5.43913 5.765 5.63692 5.60135 5.64368 5.5976C6.59348 4.79424 7.26902 3.71461 7.57617 2.50914C8.30255 3.18063 8.7869 4.07316 8.95401 5.04815C9.12112 6.02313 8.96164 7.02602 8.50033 7.90107C8.43938 8.01784 8.41438 8.15004 8.42848 8.281C8.44257 8.41196 8.49514 8.53581 8.57954 8.63693C8.66395 8.73805 8.77641 8.8119 8.90274 8.84918C9.02907 8.88646 9.16361 8.8855 9.28939 8.8464C10.3106 8.52629 11.2092 7.90101 11.8643 7.05474C12.258 7.63627 12.5154 8.29914 12.6173 8.99398C12.7192 9.68881 12.663 10.3977 12.4528 11.0678C12.2427 11.7379 11.884 12.3519 11.4036 12.8641C10.9232 13.3763 10.3333 13.7735 9.67806 14.0261L9.67808 14.026Z"
                            fill="white" />
                    </svg>
                    &nbsp;Buat Laporan</button>
            </div>
        </form>

    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        let currentPoint = [parseFloat('{{ $firemans[0]->latitude }}'), parseFloat('{{ $firemans[0]->longitude }}')];
        let map = L.map('map').setView(currentPoint, 13);
        googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 30,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        let icon = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [25, 25], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let circle = L.circle(currentPoint, {
            color: 'pink',
            fillColor: '#f03',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let marker = L.marker(currentPoint, {
            icon
        }).addTo(map);

        let popupContent = `<b>{{ $firemans[0]->name }}</b><br>(Telp: {{ $firemans[0]->phonenumber }})<br>
                 {{ $firemans[0]->address }}<br>
                `;
        marker.bindPopup(popupContent).openPopup();

        map.on('mouseover', function() {
            map.getContainer().style.cursor = 'crosshair';
        });

        const stringToLatLng = (string) => {
            let lat = parseFloat(string.split(',')[0]);
            let lng = parseFloat(string.split(',')[1]);
            let uuid = string.split(',')[2];

            return {
                lat,
                lng,
                uuid
            };
        }


        const flyTo = async (self) => {
            marker.closePopup();
            let stringLatLng = $(self).val();
            let {
                lat,
                lng,
                uuid
            } = stringToLatLng(stringLatLng);
            let data = null;
            await fetch(`{{ route('user.get-fireman', '') }}/${uuid}`)
                .then(response => response.json())
                .then(val => {
                    data = val;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            console.log(data);
            popupContent = `<b>${data.data.name}</b><br>(Telp: ${data.data.phonenumber})<br>
                 ${data.data.address}<br>
                </div> 
                `;
            marker.setPopupContent(popupContent);
            let selectedDamkarLatLng = L.latLng(lat, lng);
            let targetLatLng = L.latLng(markerTarget.getLatLng().lat, markerTarget.getLatLng().lng);
            let waypoint = [selectedDamkarLatLng, targetLatLng];
            var point = routes.getWaypoints();
            latPointPrevious = point[0].latLng.lat;
            console.log(latPointPrevious);
            if (latPointPrevious != 0) {
                routes.setWaypoints(waypoint);
            }
            let arrLatLng = [lat, lng];
            marker.setLatLng(arrLatLng);
            circle.setLatLng(arrLatLng);
            animateFlyTo(selectedDamkarLatLng, 14);
            marker.setOpacity(0); // Mengatur opasitas marker menjadi 0
            marker.openPopup();
            marker.setOpacity(1);
        }

        const animateFlyTo = (latlng, zoom) => {
            map.flyTo(latlng, zoom, {
                animate: true,
                duration: 2,
                onComplete: function() {
                    // Callback saat animasi "flyTo" selesai
                    marker.openPopup();
                    // Tambahkan animasi lainnya pada popup marker jika diperlukan
                }
            });
        }

        let iconTarget = L.icon({
            iconUrl: '{{ url('/') }}/icons/pin-red.png',

            iconSize: [5, 5], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let circleTarget = L.circle([-7.275612, 112.6301103], {
            color: '#93c5fd',
            fillColor: '#1d4ed8',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);
        let markerTarget = L.marker([-7.275612, 112.6301103], {
            icon
        }).addTo(map);
        markerTarget.setOpacity(0);
        circleTarget.setStyle({
            fillOpacity: 0,
            weight: 0
        });
        let routes = L.Routing.control({
            waypoints: [
                L.latLng(0, 0),
                L.latLng(0, 0)
            ],
            createMarker: function() {},
        }).addTo(map);
        map.on("click", function(ev) {
            let {
                lat,
                lng
            } = ev.latlng;

            $("#latitude").val(lat);
            $("#longitude").val(lng);
            newPoint(lat, lng);
        })
        const newPoint = (lat, lng, messsage = 'Lokasi Kejadian') => {
            $("#latitude").val(lat);
            $("#longitude").val(lng);
            markerTarget.setLatLng([lat, lng]);
            circleTarget.setLatLng([lat, lng]);
            markerTarget.setOpacity(1);
            markerTarget.bindPopup(`<b>${messsage}</b>`).openPopup();
            circleTarget.setStyle({
                fillOpacity: 0.4,
                weight: 3
            });
            let latLngTarget = L.latLng(lat, lng);
            let currentDamkarLatLng = L.latLng(marker.getLatLng().lat, marker.getLatLng().lng);
            let waypoint = [currentDamkarLatLng, latLngTarget];
            routes.setWaypoints(waypoint);
        }
        let realLatUser = 0;
        let realLngUser = 0;
        const getLocationsUser = () => {
            if ("geolocation" in navigator) {
                var watchID = navigator.geolocation.watchPosition(function(position) {
                    realLatUser = position.coords.latitude;
                    realLngUser = position.coords.longitude;

                    newPoint(realLatUser, realLngUser, "Lokasi Anda")
                }, function(error) {
                    console.log("Error:", error.message);
                });
            } else {
                console.log("Geolocation tidak tersedia pada peramban ini");
            }
        }
        const buttonGetLocaltionUser = () => {
            newPoint(realLatUser, realLngUser, "Lokasi Anda")
        }

        getLocationsUser();

        let formData = new FormData();
        const previewImage = (event) => {
            const imageFiles = event.target.files;
            const imageFilesLength = imageFiles.length;
            if (imageFilesLength > 0) {
                formData.append("document[]", imageFiles[0]);
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                let templateImg = `<div class="preview mx-1 flex justify-center border h-[60px] w-[65px] rounded-xl">
                        <img class="w-full rounded-xl " src="${imageSrc}" id="preview-selected-image" />
                    </div>`;
                $("#listImage").prepend(templateImg);
                // const imagePreviewElement = document.querySelector("#preview-selected-image");
                // imagePreviewElement.src = imageSrc;
                imagePreviewElement.style.display = "block";
            }
        };
        const createReport = () => {
            let fireman_id = $("#fireman_id").val();
            let long = $("#longitude").val();
            let lat = $("#latitude").val();
            let level = $("#type_report").val();
            let description = $("#description").val()
            formData.append("longitude", long);
            formData.append("latitude", lat);
            formData.append("level", level);
            formData.append("description", description);
            formData.append("fireman_id", fireman_id);
            $.ajax({
                url: '{{route('user.create.report')}}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $.Toast("Pesan", "Berhasil membuat laporan ke damkar", "success");        
                    setTimeout(() => {
                        window.location.href = '{{route('user.home')}}'
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    let response = xhr.responseJSON;
                    console.log(response);
                }
            });
        }
    </script>
@endsection
