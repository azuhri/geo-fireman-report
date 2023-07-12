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
                <div id="counterNotif" class="text-xl font-bold p-[2px] text-red-500 absolute right-0 bottom-7 {{count(getNotifNotReaded()) > 0 ? '' : 'hidden'}}"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 8 8" fill="none">
                    <circle cx="4" cy="4" r="4" fill="#DC3545"/>
                  </svg></div>
            </div>
        </div>
        <div class="bg-gray-100 p-4 h-full">
            @if($reportActive)
                <div class="mt-2 flex justify-between">
                    <p class="text-sm font-normal">Laporan Terbaru</p>
                    <a href="{{route('fireman.report.view')}}" class="text-sm text-[#FE5D26]">Lihat Semua</a>
                </div>
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
                                        <p class="text-white font-semibold text-sm">{{$reportActive->user->name}}</p>
                                    </div>
                                </div>
                                <div class="p-[12px] bg-{{$reportActive->report_status == "pending" ? "green-100" : "[#CCF1F8]"}} rounded-tr-[20px] rounded-bl-[20px] text-xs flex items-center px-8 border absolute top-0 right-0 border-{{$reportActive->report_status == "pending" ? "green-500" : "[#02BBDD]"}} text-{{$reportActive->report_status == "pending" ? "green-500" : "[#02BBDD]"}}">{{$reportActive->report_status == "pending" ? "baru" : "diproses"}}</div>
                            </div>
                            <div class="mt-6 mb-2 px-2 flex justify-between">
                                <p class="flex items-center font-light text-gray-200 text-xs"><svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>&nbsp; {{date("d/m/Y", strtotime($reportActive->created_at))}} | {{date("H:i", strtotime($reportActive->created_at))}}</p>
                                <p class="font-light text-gray-200 text-xs flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M4.2339 4.19726L4.23278 4.19818L4.23171 4.19922L4.2339 4.19726ZM9.21096 4.104C9.17617 4.07047 9.13757 4.04114 9.09596 4.01659C9.03705 3.98193 8.97166 3.95971 8.90382 3.95131C8.83599 3.94292 8.76715 3.94853 8.70157 3.9678C8.63599 3.98707 8.57506 4.01958 8.52254 4.06333C8.47003 4.10708 8.42704 4.16114 8.39625 4.22216C8.22402 4.56151 7.98647 4.86351 7.69725 5.11083C7.74148 4.86164 7.76378 4.60904 7.7639 4.35595C7.76483 3.586 7.56171 2.82955 7.17523 2.16363C6.78875 1.49771 6.2327 0.946093 5.56371 0.564949C5.49001 0.523173 5.40691 0.500804 5.3222 0.499942C5.23749 0.49908 5.15395 0.519752 5.07942 0.56002C5.00489 0.600288 4.94181 0.65883 4.8961 0.730155C4.85039 0.801479 4.82355 0.883246 4.8181 0.967784C4.79012 1.44187 4.66618 1.90534 4.4538 2.33012C4.24141 2.75489 3.945 3.13213 3.58252 3.43896L3.46728 3.53271C3.08824 3.78776 2.75273 4.10216 2.47363 4.46386C2.03979 5.01042 1.73925 5.65054 1.59586 6.33345C1.45246 7.01637 1.47016 7.72331 1.64753 8.3982C1.8249 9.07309 2.15708 9.69738 2.61771 10.2215C3.07835 10.7457 3.65478 11.1553 4.30129 11.418C4.37719 11.449 4.45957 11.4608 4.54115 11.4525C4.62272 11.4442 4.70099 11.4159 4.76905 11.3701C4.83711 11.3244 4.89287 11.2626 4.9314 11.1902C4.96994 11.1178 4.99007 11.0371 4.99002 10.9551C4.98966 10.902 4.98126 10.8494 4.96512 10.7988C4.85325 10.3783 4.82104 9.94063 4.87014 9.5083C5.34326 10.4007 6.10271 11.108 7.02639 11.5166C7.13914 11.567 7.2666 11.5738 7.38406 11.5356C8.11384 11.3001 8.77127 10.8819 9.29388 10.3207C9.8165 9.75948 10.1869 9.07397 10.37 8.32929C10.5531 7.58461 10.5427 6.80549 10.3398 6.06596C10.1369 5.32643 9.74835 4.65105 9.21096 4.104ZM7.25856 10.5195C6.82272 10.2986 6.43825 9.9885 6.13014 9.60927C5.82203 9.23003 5.59719 8.7902 5.47023 8.31836C5.43146 8.15949 5.40146 7.9986 5.38039 7.83642C5.3661 7.73315 5.31991 7.63692 5.24825 7.56119C5.17659 7.48546 5.08306 7.43402 4.98073 7.41406C4.94921 7.40784 4.91715 7.40474 4.88502 7.40478C4.79714 7.40475 4.7108 7.42789 4.63472 7.47187C4.55864 7.51585 4.4955 7.57912 4.45167 7.65528C4.0368 8.37084 3.82816 9.1873 3.84888 10.0142C3.484 9.73047 3.17906 9.37718 2.95172 8.97476C2.72438 8.57235 2.57918 8.12881 2.52452 7.66987C2.46986 7.21092 2.50683 6.74569 2.63329 6.30113C2.75975 5.85658 2.97319 5.44155 3.26124 5.08009C3.47994 4.79601 3.74378 4.54974 4.04224 4.35109C4.05516 4.34275 4.06755 4.33362 4.07935 4.32374C4.07935 4.32374 4.22769 4.201 4.23276 4.19819C4.94511 3.59568 5.45176 2.78595 5.68213 1.88185C6.22692 2.38547 6.59018 3.05486 6.71551 3.7861C6.84084 4.51734 6.72123 5.26951 6.37525 5.92579C6.32954 6.01337 6.31078 6.11252 6.32136 6.21074C6.33193 6.30896 6.37136 6.40185 6.43466 6.47769C6.49796 6.55353 6.5823 6.60892 6.67705 6.63688C6.7718 6.66484 6.8727 6.66411 6.96704 6.63479C7.73293 6.39471 8.40689 5.92575 8.8982 5.29104C9.19347 5.72719 9.38652 6.22435 9.46295 6.74547C9.53937 7.2666 9.49722 7.79825 9.33961 8.30082C9.18201 8.80338 8.91302 9.2639 8.5527 9.64806C8.19237 10.0322 7.75 10.3301 7.25855 10.5195L7.25856 10.5195Z" fill="#FFBEA8"/>
                                    </svg>&nbsp;Level {{$reportActive->type_report}}</p>
                            </div>
                            <div class="px-2">
                                <a href="{{route('fireman.detail.report', $reportActive->id)}}" class="items-center text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-white bg-[#ffffff45]"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
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

            <div class="mt-2 flex flex-col">
                <p class="font-normal text-sm">Statistik Kinerja</p>
                <p class="font-light text-xs my-4">Yuk baca kinerjamu selama ini</p>
            </div>
            <div class="my-2 flex flex-col">
                <div class="px-4 py-2 border-2 rounded-2xl bg-white border-[#DFE0E0] border-l-4 border-l-[#FE5D26]">
                    <div class="flex justify-between items-center px-2">
                        <div>
                            <p>Total Laporan</p>
                            <p class="font-bold text-xl">{{$dataLaporan->total_laporan}}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 64 64" fill="none">
                            <g opacity="0.16">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M51.938 27.3297C50.8195 26.3833 49.1809 26.3833 48.0624 27.3297L40.5223 33.7098C38.3889 35.515 39.6654 39 42.4601 39H44.0002V42C44.0002 44.7614 41.7616 47 39.0002 47H24.2502C21.903 47 20.0002 45.0972 20.0002 42.75C20.0002 41.2312 18.769 40 17.2502 40H11.0002C9.34336 40 8.00021 41.3431 8.00021 43V44C8.00021 52.2843 14.7159 59 23.0002 59H41.0002C49.2845 59 56.0002 52.2843 56.0002 44V39H57.5403C60.335 39 61.6116 35.515 59.4782 33.7098L51.938 27.3297Z" fill="#1D1D1D"/>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0002 4C14.7159 4 8.00021 10.7157 8.00021 19V24H6.4601C3.66541 24 2.38884 27.485 4.52227 29.2902L12.0624 35.6703C13.1809 36.6167 14.8195 36.6167 15.938 35.6703L23.4781 29.2902C25.6116 27.485 24.335 24 21.5403 24H20.0002V21C20.0002 18.2386 22.2388 16 25.0002 16H39.7502C42.0974 16 44.0002 17.9028 44.0002 20.25C44.0002 21.7688 45.2314 23 46.7502 23H53.0002C54.6571 23 56.0002 21.6569 56.0002 20V19C56.0002 10.7157 49.2845 4 41.0002 4H23.0002Z" fill="#1D1D1D"/>
                              <path d="M27.5478 31.6382C27.8976 30.7873 29.1028 30.7873 29.4526 31.6382L30.1368 33.3025C30.2414 33.5569 30.4433 33.7588 30.6977 33.8634L32.362 34.5476C33.213 34.8974 33.213 36.1026 32.362 36.4524L30.6977 37.1366C30.4433 37.2412 30.2414 37.4431 30.1368 37.6975L29.4526 39.3618C29.1028 40.2127 27.8976 40.2127 27.5478 39.3618L26.8636 37.6975C26.7591 37.4431 26.5571 37.2412 26.3027 37.1366L24.6384 36.4524C23.7875 36.1026 23.7875 34.8974 24.6384 34.5476L26.3027 33.8634C26.5571 33.7588 26.7591 33.5569 26.8636 33.3025L27.5478 31.6382Z" fill="#1D1D1D"/>
                              <path d="M35.5245 23.6538C35.8829 22.7821 37.1175 22.7821 37.4759 23.6538L37.5621 23.8635C37.6692 24.1241 37.8761 24.331 38.1367 24.4381L38.3464 24.5243C39.2181 24.8827 39.2181 26.1173 38.3464 26.4757L38.1367 26.5619C37.8761 26.669 37.6692 26.8759 37.5621 27.1365L37.4759 27.3462C37.1175 28.2179 35.8829 28.2179 35.5245 27.3462L35.4383 27.1365C35.3312 26.8759 35.1243 26.669 34.8638 26.5619L34.654 26.4757C33.7823 26.1173 33.7823 24.8827 34.654 24.5243L34.8638 24.4381C35.1243 24.331 35.3312 24.1241 35.4383 23.8635L35.5245 23.6538Z" fill="#1D1D1D"/>
                              <path d="M50.6457 28.8565C50.2729 28.541 49.7267 28.541 49.3538 28.8565L41.8137 35.2366C41.1026 35.8383 41.5281 37 42.4597 37H44.9998C45.5521 37 45.9998 37.4477 45.9998 38V42C45.9998 45.866 42.8658 49 38.9998 49H10.9998L10.9961 49C12.9552 53.6979 17.5919 57 22.9998 57H40.9998C48.1795 57 53.9998 51.1797 53.9998 44V38C53.9998 37.4477 54.4475 37 54.9998 37H57.5399C58.4714 37 58.897 35.8383 58.1858 35.2366L50.6457 28.8565Z" fill="#FE5D26"/>
                              <path d="M23.0001 6C15.8204 6 10.0001 11.8203 10.0001 19V25C10.0001 25.5523 9.5524 26 9.00012 26H6.46001C5.52844 26 5.10292 27.1617 5.81406 27.7634L13.3542 34.1435C13.727 34.459 14.2732 34.459 14.6461 34.1435L22.1862 27.7634C22.8973 27.1616 22.4718 26 21.5402 26H19.0001C18.4478 26 18.0001 25.5523 18.0001 25V21C18.0001 17.134 21.1341 14 25.0001 14H53.0001L53.0038 14C51.0447 9.3021 46.408 6 41.0001 6H23.0001Z" fill="white"/>
                            </g>
                          </svg>
                    </div>
                </div>
            </div>
            <div class="my-2 flex flex-col">
                <div class="px-4 py-2 border-2 rounded-2xl bg-white border-[#DFE0E0] border-l-4 border-l-[#41C063]">
                    <div class="flex justify-between items-center px-2">
                        <div>
                            <p>Laporan Selesai</p>
                            <p class="font-bold text-xl">{{$dataLaporan->jumlah_selesai}}</p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 64 64" fill="none">
                            <g opacity="0.16">
                              <path d="M18.2692 20.9354L24.7358 11.2355C25.6889 9.80589 27.1536 9.23005 28.5609 9.32922H32.8914C32.9849 9.32922 33.0777 9.33196 33.1699 9.33736C35.5157 9.11615 37.9675 10.8452 37.908 13.7021L38 24.1674C37.9938 24.4657 38.2323 24.7111 38.5298 24.7143H51.6365C51.6438 24.7143 51.6511 24.7143 51.6584 24.7143H51.9579C55.0247 24.7143 58.0357 26.518 58.6546 29.5217C59.1045 31.7049 58.8053 33.4517 57.4356 35.8343C57.2049 36.2356 57.2408 36.7372 57.5129 37.1116C59.5978 39.9807 59.5543 42.9037 57.3825 46.6396C57.1766 46.9938 57.1757 47.4345 57.3853 47.7865C58.8231 50.2016 59.1206 51.5928 58.6296 53.8355C57.9392 56.989 54.8582 59 51.63 59H25.0714C25.0662 59 25.0609 59 25.0556 59H20.0357C19.811 59 19.5 59 19.5 59C19.5 59 18.939 59 18.7143 59H9.28571C6.91878 59 5 57.0812 5 54.7143V29.2857C5 26.9188 6.91878 25 9.28571 25H16.3664C16.791 23.5651 17.4302 22.194 18.2692 20.9354Z" fill="#1D1D1D"/>
                              <path d="M9.54757 7.63823C9.8974 6.78726 11.1026 6.78726 11.4524 7.63823L12.1366 9.30251C12.2412 9.55687 12.4431 9.75884 12.6975 9.8634L14.3618 10.5476C15.2127 10.8974 15.2127 12.1026 14.3618 12.4524L12.6975 13.1366C12.4431 13.2412 12.2412 13.4431 12.1366 13.6975L11.4524 15.3618C11.1026 16.2127 9.8974 16.2127 9.54757 15.3618L8.8634 13.6975C8.75884 13.4431 8.55687 13.2412 8.30251 13.1366L6.63823 12.4524C5.78726 12.1026 5.78726 10.8974 6.63823 10.5476L8.30251 9.8634C8.55687 9.75884 8.75884 9.55687 8.8634 9.30251L9.54757 7.63823Z" fill="#1D1D1D"/>
                              <path d="M45.5394 1.64371C45.8922 0.78543 47.1078 0.785431 47.4606 1.64371L47.8481 2.58623C47.9535 2.84278 48.1572 3.04648 48.4138 3.15194L49.3563 3.5394C50.2146 3.89223 50.2146 5.10777 49.3563 5.4606L48.4138 5.84806C48.1572 5.95352 47.9535 6.15722 47.8481 6.41377L47.4606 7.35629C47.1078 8.21457 45.8922 8.21457 45.5394 7.35629L45.1519 6.41377C45.0465 6.15722 44.8428 5.95352 44.5862 5.84806L43.6437 5.4606C42.7854 5.10777 42.7854 3.89223 43.6437 3.5394L44.5862 3.15194C44.8428 3.04648 45.0465 2.84278 45.1519 2.58623L45.5394 1.64371Z" fill="#1D1D1D"/>
                              <path d="M53.5243 16.6538C53.8827 15.7821 55.1173 15.7821 55.4757 16.6538L55.5619 16.8635C55.669 17.1241 55.8759 17.331 56.1365 17.4381L56.3462 17.5243C57.2179 17.8827 57.2179 19.1173 56.3462 19.4757L56.1365 19.5619C55.8759 19.669 55.669 19.8759 55.5619 20.1365L55.4757 20.3462C55.1173 21.2179 53.8827 21.2179 53.5243 20.3462L53.4381 20.1365C53.331 19.8759 53.1241 19.669 52.8635 19.5619L52.6538 19.4757C51.7821 19.1173 51.7821 17.8827 52.6538 17.5243L52.8635 17.4381C53.1241 17.331 53.331 17.1241 53.4381 16.8635L53.5243 16.6538Z" fill="#1D1D1D"/>
                              <path d="M31.7212 12.3449L25.2546 22.0448C23.831 24.1803 23.0713 26.6894 23.0713 29.2559V55C23.0713 56.1046 23.9667 57 25.0713 57H51.6299C54.1277 57 56.2279 55.4533 56.6758 53.4077C56.8819 52.4661 56.8911 51.8551 56.7722 51.2815C56.6456 50.6706 56.3409 49.9421 55.6667 48.8096C55.5137 48.5526 55.4011 48.2799 55.3284 48H53.9999C53.4476 48 52.9999 47.5523 52.9999 47C52.9999 46.4477 53.4476 46 53.9999 46H55.063C55.3104 46 55.5289 45.8484 55.6533 45.6344C56.6369 43.9425 57.0287 42.6182 57.044 41.5226C57.0642 40.0746 56.1524 38.392 55.6372 37.5089C55.4536 37.1941 55.1126 37 54.7481 37H53.9999C53.4476 37 52.9999 36.5523 52.9999 36C52.9999 35.4477 53.4476 35 53.9999 35H55.6144C55.6417 34.9453 55.6708 34.8912 55.7016 34.8375C56.3144 33.7715 56.6262 32.9534 56.7619 32.233C56.8945 31.529 56.8787 30.814 56.6956 29.9253C56.3246 28.125 54.3864 26.7143 51.9578 26.7143H38.2254C36.8043 26.7143 35.6607 25.5466 35.6903 24.1258L35.9083 13.6604C35.9559 11.3747 32.9894 10.4427 31.7212 12.3449Z" fill="#41C063"/>
                              <path d="M12 29C12 27.8954 12.8954 27 14 27H19C20.1046 27 21 27.8954 21 29V55C21 56.1046 20.1046 57 19 57H14C12.8954 57 12 56.1046 12 55V29Z" fill="white"/>
                            </g>
                          </svg>
                    </div>
                </div>
            </div>
            <div class="my-2 flex flex-col">
                <div class="px-4 py-2 border-2 rounded-2xl bg-white border-[#DFE0E0] border-l-4 border-l-[#02BBDD]">
                    <div class="flex justify-between items-center px-2">
                        <div>
                            <p>Rating Ferfoma</p>
                            <p class="font-bold text-xl">{{number_format(round($rating), 1)}}<span class="text-xs">/5</span></p>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 64 64" fill="none">
                            <g opacity="0.16">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.00001 10C9.00001 7.79086 10.7909 6 13 6H52C54.2092 6 56 7.79086 56 10V10.4289C57.4342 10.936 58.6869 11.8699 59.5837 13.1139C60.6348 14.5718 61.1274 16.3586 60.9719 18.1492C60.8163 19.9397 60.0229 21.6148 58.7361 22.8696C57.4619 24.1122 55.7877 24.8607 54.0132 24.9824C51.1545 30.3478 45.5038 34 39 34V45H44C45.6569 45 47 46.3431 47 48V50C47 50.3506 46.9399 50.6872 46.8293 51H53C54.6569 51 56 52.3431 56 54V56C56 57.6569 54.6569 59 53 59H11C9.34316 59 8.00001 57.6569 8.00001 56V54C8.00001 52.3431 9.34316 51 11 51H15.1707C15.0602 50.6872 15 50.3506 15 50V48C15 46.3431 16.3432 45 18 45H25V33.9711C18.8731 33.6157 13.6169 30.0156 10.9241 24.8636C10.3079 24.9828 9.67474 25.025 9.0391 24.9858C7.24522 24.8754 5.55064 24.1244 4.26388 22.8696C2.97711 21.6149 2.18373 19.9397 2.02816 18.1492C1.87259 16.3586 2.36519 14.5718 3.41627 13.1139C4.46735 11.656 6.00701 10.624 7.75497 10.2058C8.16634 10.1074 8.58281 10.0445 9.00001 10.0167V10Z" fill="#1D1D1D"/>
                              <path d="M6.54758 34.6382C6.89741 33.7873 8.10261 33.7873 8.45244 34.6382L9.13661 36.3025C9.24117 36.5569 9.44314 36.7588 9.6975 36.8634L11.3618 37.5476C12.2128 37.8974 12.2128 39.1026 11.3618 39.4524L9.6975 40.1366C9.44314 40.2412 9.24117 40.4431 9.13661 40.6975L8.45244 42.3618C8.10261 43.2127 6.89741 43.2127 6.54758 42.3618L5.86342 40.6975C5.75885 40.4431 5.55688 40.2412 5.30252 40.1366L3.63825 39.4524C2.78727 39.1026 2.78727 37.8974 3.63825 37.5476L5.30252 36.8634C5.55688 36.7588 5.75885 36.5569 5.86342 36.3025L6.54758 34.6382Z" fill="#1D1D1D"/>
                              <path d="M53.5394 34.6437C53.8922 33.7854 55.1078 33.7854 55.4606 34.6437L55.8481 35.5862C55.9535 35.8428 56.1572 36.0465 56.4138 36.1519L57.3563 36.5394C58.2146 36.8922 58.2146 38.1078 57.3563 38.4606L56.4138 38.8481C56.1572 38.9535 55.9535 39.1572 55.8481 39.4138L55.4606 40.3563C55.1078 41.2146 53.8922 41.2146 53.5394 40.3563L53.152 39.4138C53.0465 39.1572 52.8428 38.9535 52.5862 38.8481L51.6437 38.4606C50.7854 38.1078 50.7854 36.8922 51.6437 36.5394L52.5862 36.1519C52.8428 36.0465 53.0465 35.8428 53.152 35.5862L53.5394 34.6437Z" fill="#1D1D1D"/>
                              <path d="M54.9934 22.7934C55.6448 20.9912 56 19.0473 56 17.0204V12.601C56.7727 12.9953 57.4469 13.5698 57.9614 14.2835C58.7322 15.3526 59.0934 16.663 58.9794 17.9761C58.8653 19.2891 58.2835 20.5176 57.3398 21.4377C56.6786 22.0825 55.8705 22.5459 54.9934 22.7934Z" fill="#02BBDD"/>
                              <path d="M44 47H28C27.4477 47 27 47.4477 27 48V50C27 50.5523 27.4477 51 28 51H44C44.5523 51 45 50.5523 45 50V48C45 47.4477 44.5523 47 44 47Z" fill="#02BBDD"/>
                              <path d="M53 53H21C20.4477 53 20 53.4477 20 54V56C20 56.5523 20.4477 57 21 57H53C53.5523 57 54 56.5523 54 56V54C54 53.4477 53.5523 53 53 53Z" fill="#02BBDD"/>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M52 8H25C23.8954 8 23 8.89543 23 10V17C23 25.2843 29.7157 32 38 32H39C47.2843 32 54 25.2843 54 17V10C54 8.89543 53.1046 8 52 8ZM42.1963 14.4717C41.3896 12.5094 38.6104 12.5094 37.8037 14.4718L37.1759 15.999C37.1429 16.0792 37.0792 16.1429 36.999 16.1759L35.4718 16.8037C33.5094 17.6104 33.5094 20.3896 35.4718 21.1963L36.999 21.8241C37.0792 21.8571 37.1429 21.9208 37.1759 22.0009L37.8037 23.5282C38.6104 25.4906 41.3896 25.4906 42.1963 23.5282L42.8241 22.0009C42.8571 21.9208 42.9208 21.8571 43.001 21.8241L44.5282 21.1963C46.4906 20.3896 46.4906 17.6104 44.5282 16.8037L43.001 16.1759C42.9208 16.1429 42.8571 16.0792 42.8241 15.999L42.1963 14.4717Z" fill="#02BBDD"/>
                              <path d="M37 34H32V45H37V34Z" fill="white"/>
                              <path d="M39.6997 15.2512C39.81 14.9829 40.19 14.9829 40.3002 15.2512L40.9281 16.7785C41.1692 17.365 41.6349 17.8308 42.2215 18.0719L43.7488 18.6997C44.0171 18.81 44.0171 19.1899 43.7488 19.3002L42.2215 19.9281C41.635 20.1692 41.1692 20.6349 40.9281 21.2215L40.3002 22.7488C40.19 23.017 39.81 23.017 39.6997 22.7488L39.0719 21.2215C38.8308 20.6349 38.365 20.1692 37.7785 19.9281L36.2512 19.3002C35.9829 19.1899 35.9829 18.81 36.2512 18.6997L37.7785 18.0719C38.365 17.8308 38.8308 17.365 39.0719 16.7785L39.6997 15.2512Z" fill="white"/>
                            </g>
                          </svg>
                    </div>
                </div>
            </div>
            {{-- <div class="mt-2 flex justify-between mt-8">
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
            </div> --}}
        </div>
    </div>
@endsection

@section('dashboard_js')
@endsection
