@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Beranda
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        #navbar { 
            background: linear-gradient(45deg, #faede8 -50%, white 100%)
        }
    </style>
@endsection
@section('dashboard_content')
    <div class="h-screen relative">
        <div id="navbar" class="px-4 shadow-lg border-2 border-b-slate-200 pt-10 pb-4 flex justify-between">
            <div class="flex items-center">
                <div class="flex justify-center">
                    <div class="w-[40px] mr-4 rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                        <img class="w-full" src="{{ asset('icons/damkar-selected.png') }}" alt="">
                    </div>
                </div>
                <div class="flex flex-col">
                    <p class="font-semibold text-sm">Hi, {{ Auth::user()->name }}</p>
                    <small class="text-slate-500 font-light text-xs">Damkar</small>
                </div>
            </div>
            <div class="flex items-center">
                <a href="{{route('notif.view')}}" class="border shadow border-slate-300 rounded-full p-2">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                </a>
            </div>
        </div>
        <div class="bg-gray-100 p-4">
            <div class="mt-2 flex justify-between">
                <p class="text-sm font-normal">Laporan Terbaru</p>
                <a href="#" class="text-sm text-[#FE5D26]">Lihat Semua</>
            </div>
            @if(true)
                <div class="mt-2 relative">
                    <small class="text-xs font-light text-slate-500">Laporan paling baru untuk di tinjau</small>
                    <div class="mb-12">
                        <div class="p-4 my-2 rounded-[20px] bg-[#FE5D26] relative z-30">
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <div class="flex justify-center">
                                        <div class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                            <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <small class="text-white font-light text-xs">Pelapor</small>
                                        <p class="text-white font-semibold text-sm">Andi Wirawan</p>
                                    </div>
                                </div>
                                <div class="p-[12px] bg-[#CCF1F8] rounded-tr-[20px] rounded-bl-[20px] text-xs flex items-center px-8 border absolute top-0 right-0 border-[#02BBDD] text-[#02BBDD]">Diproses</div>
                            </div>
                            <div class="mt-6 mb-2 px-2 flex justify-between">
                                <p class="flex items-center font-light text-gray-200 text-xs"><svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>&nbsp; 26/03/2023 | 18:00</p>
                                <p class="font-light text-gray-200 text-xs flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M4.2339 4.19726L4.23278 4.19818L4.23171 4.19922L4.2339 4.19726ZM9.21096 4.104C9.17617 4.07047 9.13757 4.04114 9.09596 4.01659C9.03705 3.98193 8.97166 3.95971 8.90382 3.95131C8.83599 3.94292 8.76715 3.94853 8.70157 3.9678C8.63599 3.98707 8.57506 4.01958 8.52254 4.06333C8.47003 4.10708 8.42704 4.16114 8.39625 4.22216C8.22402 4.56151 7.98647 4.86351 7.69725 5.11083C7.74148 4.86164 7.76378 4.60904 7.7639 4.35595C7.76483 3.586 7.56171 2.82955 7.17523 2.16363C6.78875 1.49771 6.2327 0.946093 5.56371 0.564949C5.49001 0.523173 5.40691 0.500804 5.3222 0.499942C5.23749 0.49908 5.15395 0.519752 5.07942 0.56002C5.00489 0.600288 4.94181 0.65883 4.8961 0.730155C4.85039 0.801479 4.82355 0.883246 4.8181 0.967784C4.79012 1.44187 4.66618 1.90534 4.4538 2.33012C4.24141 2.75489 3.945 3.13213 3.58252 3.43896L3.46728 3.53271C3.08824 3.78776 2.75273 4.10216 2.47363 4.46386C2.03979 5.01042 1.73925 5.65054 1.59586 6.33345C1.45246 7.01637 1.47016 7.72331 1.64753 8.3982C1.8249 9.07309 2.15708 9.69738 2.61771 10.2215C3.07835 10.7457 3.65478 11.1553 4.30129 11.418C4.37719 11.449 4.45957 11.4608 4.54115 11.4525C4.62272 11.4442 4.70099 11.4159 4.76905 11.3701C4.83711 11.3244 4.89287 11.2626 4.9314 11.1902C4.96994 11.1178 4.99007 11.0371 4.99002 10.9551C4.98966 10.902 4.98126 10.8494 4.96512 10.7988C4.85325 10.3783 4.82104 9.94063 4.87014 9.5083C5.34326 10.4007 6.10271 11.108 7.02639 11.5166C7.13914 11.567 7.2666 11.5738 7.38406 11.5356C8.11384 11.3001 8.77127 10.8819 9.29388 10.3207C9.8165 9.75948 10.1869 9.07397 10.37 8.32929C10.5531 7.58461 10.5427 6.80549 10.3398 6.06596C10.1369 5.32643 9.74835 4.65105 9.21096 4.104ZM7.25856 10.5195C6.82272 10.2986 6.43825 9.9885 6.13014 9.60927C5.82203 9.23003 5.59719 8.7902 5.47023 8.31836C5.43146 8.15949 5.40146 7.9986 5.38039 7.83642C5.3661 7.73315 5.31991 7.63692 5.24825 7.56119C5.17659 7.48546 5.08306 7.43402 4.98073 7.41406C4.94921 7.40784 4.91715 7.40474 4.88502 7.40478C4.79714 7.40475 4.7108 7.42789 4.63472 7.47187C4.55864 7.51585 4.4955 7.57912 4.45167 7.65528C4.0368 8.37084 3.82816 9.1873 3.84888 10.0142C3.484 9.73047 3.17906 9.37718 2.95172 8.97476C2.72438 8.57235 2.57918 8.12881 2.52452 7.66987C2.46986 7.21092 2.50683 6.74569 2.63329 6.30113C2.75975 5.85658 2.97319 5.44155 3.26124 5.08009C3.47994 4.79601 3.74378 4.54974 4.04224 4.35109C4.05516 4.34275 4.06755 4.33362 4.07935 4.32374C4.07935 4.32374 4.22769 4.201 4.23276 4.19819C4.94511 3.59568 5.45176 2.78595 5.68213 1.88185C6.22692 2.38547 6.59018 3.05486 6.71551 3.7861C6.84084 4.51734 6.72123 5.26951 6.37525 5.92579C6.32954 6.01337 6.31078 6.11252 6.32136 6.21074C6.33193 6.30896 6.37136 6.40185 6.43466 6.47769C6.49796 6.55353 6.5823 6.60892 6.67705 6.63688C6.7718 6.66484 6.8727 6.66411 6.96704 6.63479C7.73293 6.39471 8.40689 5.92575 8.8982 5.29104C9.19347 5.72719 9.38652 6.22435 9.46295 6.74547C9.53937 7.2666 9.49722 7.79825 9.33961 8.30082C9.18201 8.80338 8.91302 9.2639 8.5527 9.64806C8.19237 10.0322 7.75 10.3301 7.25855 10.5195L7.25856 10.5195Z" fill="#FFBEA8"/>
                                    </svg>&nbsp;Level 1</p>
                            </div>
                            <div class="px-2">
                                <a href="#" class="items-center text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-white bg-[#ffffff45]"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                                    <path d="M14.6002 1.90666C14.3455 1.64704 14.0225 1.46481 13.6686 1.38105C13.3147 1.29728 12.9442 1.31541 12.6002 1.43333L3.16686 4.58666C2.78641 4.7112 2.45399 4.95076 2.2155 5.27229C1.97701 5.59381 1.84421 5.98144 1.83543 6.38166C1.82665 6.78189 1.94232 7.17497 2.16648 7.50664C2.39064 7.83832 2.71223 8.09223 3.08686 8.23333L6.5802 9.56666C6.65974 9.59708 6.73217 9.64356 6.79296 9.7032C6.85375 9.76285 6.9016 9.83438 6.93353 9.91333L8.26686 13.4133C8.40258 13.7827 8.64887 14.1012 8.97217 14.3254C9.29547 14.5497 9.68006 14.6689 10.0735 14.6667H10.1202C10.5209 14.6594 10.9092 14.5269 11.2308 14.2878C11.5524 14.0487 11.7911 13.7149 11.9135 13.3333L15.0669 3.88666C15.1815 3.54595 15.1986 3.17996 15.1161 2.83005C15.0337 2.48015 14.855 2.1603 14.6002 1.90666V1.90666ZM13.8335 3.46666L10.6469 12.92C10.6099 13.0396 10.5355 13.1443 10.4348 13.2187C10.334 13.2931 10.2121 13.3332 10.0869 13.3333C9.96236 13.3354 9.84019 13.2995 9.73659 13.2304C9.63299 13.1613 9.55286 13.0624 9.50686 12.9467L8.17353 9.44666C8.07686 9.19235 7.92779 8.96121 7.73598 8.76825C7.54418 8.5753 7.31393 8.42484 7.0602 8.32666L3.5602 6.99333C3.44212 6.95006 3.34063 6.8708 3.27005 6.76672C3.19947 6.66265 3.16338 6.53903 3.16686 6.41333C3.16696 6.28809 3.20714 6.16617 3.28151 6.06541C3.35588 5.96465 3.46055 5.89033 3.5802 5.85333L13.0335 2.7C13.1421 2.65576 13.2611 2.64391 13.3762 2.66588C13.4913 2.68785 13.5976 2.74269 13.6823 2.82379C13.7669 2.90488 13.8262 3.00875 13.853 3.12284C13.8799 3.23692 13.8731 3.35634 13.8335 3.46666V3.46666Z" fill="white"/>
                                    </svg>&nbsp;&nbsp;Tinjau Laporan</a>
                            </div>
                        </div>
                        <div class="px-4 absolute w-full z-10 left-0 bottom-[-10px]">
                            <div class="bg-[#FE9E7D]   p-2 rounded-[20px]">
                                &nbsp;
                            </div>
                        </div>
                        <div class="px-[35px] absolute z-0 w-full left-0 bottom-[-20px]">
                            <div class="bg-[#FFBEA8] rounded-[20px]">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-2 flex justify-between mt-8">
                <p class="text-sm font-normal">Riwayat Laporan</p>
                <a href="#" class="text-sm text-[#FE5D26]">Lihat Semua</>
            </div>
            <div class="mt-2 mb-20">
                <small class="text-xs font-light text-slate-500">Baca riwayat data laporan</small>
                <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div class="absolute right-0 top-0 p-[12px] bg-[#D9F2E0] border border-[#41C063] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#41C063]">Selesai</div>
                        </div>
                        <div class="px-2">
                            <a href="#" class="items-center border border-[#41C063] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#41C063]">Selesai pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div>
                <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div class="absolute right-0 top-0 p-[12px] bg-[#F8D7DA] border border-[#DC3545] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#DC3545]">Ditolak</div>
                        </div>
                        <div class="px-2">
                            <a href="#" class="items-center border border-[#DC3545] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#DC3545]">Ditolak pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div>
                <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div class="absolute right-0 top-0 p-[12px] bg-[#D9F2E0] border border-[#41C063] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#41C063]">Selesai</div>
                        </div>
                        <div class="px-2">
                            <a href="#" class="items-center border border-[#41C063] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#41C063]">Selesai pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div>
                <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div class="absolute right-0 top-0 p-[12px] bg-[#F8D7DA] border border-[#DC3545] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#DC3545]">Ditolak</div>
                        </div>
                        <div class="px-2">
                            <a href="#" class="items-center border border-[#DC3545] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#DC3545]">Ditolak pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('dashboard_js')
@endsection
