@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Riwayat Laporan
@endsection
@section('dashboard_css')
@endsection
@section('back')
    <div class="mt-10 mb-4 flex justify-center">
        <button onclick="history.back()" class="absolute left-3 bg-white rounded-full p-2 bottom-[-5px]">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </button>
        <p class="font-semibold text-lg">Laporan</p>
    </div>
@endsection
@section('dashboard_content')
    <div class="h-full">
        <div class="p-2 px-8">
            <div class="flex justify-center">
                <div class="w-5/6 my-2 flex flex-col relative">
                    <input type="text" name="name" id="name"
                        class="text-orange-500 outline-0 border border-slate-500 rounded-full focus:border-orange-500 py-2 pl-10"
                        placeholder="Cari riwayat laporan...">
                    <svg class="absolute bottom-[12px] left-[16px]" viewBox="0 0 24 24" width="20" height="20"
                        stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        class="css-i6dzq1">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <div class="flex ml-1 justify-center items-center">
                    <button onclick="sorting(this);" data-button="flex-col"
                        class="p-[13px] bg-[#FE5D26] rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                            fill="none">
                            <path
                                d="M12.6663 1.33334H3.33301C2.80257 1.33334 2.29387 1.54406 1.91879 1.91913C1.54372 2.2942 1.33301 2.80291 1.33301 3.33334V4.11334C1.33291 4.38864 1.38965 4.66099 1.49967 4.91334V4.95334C1.59386 5.16732 1.72727 5.36178 1.89301 5.52668L5.99967 9.60668V14C5.99945 14.1133 6.0281 14.2248 6.08292 14.3239C6.13774 14.4231 6.21693 14.5066 6.31301 14.5667C6.4191 14.6324 6.54152 14.6671 6.66634 14.6667C6.7707 14.6661 6.87346 14.6409 6.96634 14.5933L9.63301 13.26C9.74295 13.2046 9.83541 13.1198 9.90012 13.0151C9.96484 12.9104 9.9993 12.7898 9.99967 12.6667V9.60668L14.0797 5.52668C14.2454 5.36178 14.3788 5.16732 14.473 4.95334V4.91334C14.5922 4.66296 14.6581 4.39053 14.6663 4.11334V3.33334C14.6663 2.80291 14.4556 2.2942 14.0806 1.91913C13.7055 1.54406 13.1968 1.33334 12.6663 1.33334ZM8.85967 8.86001C8.79789 8.9223 8.749 8.99618 8.71583 9.07741C8.68265 9.15863 8.66583 9.24561 8.66634 9.33334V12.2533L7.33301 12.92V9.33334C7.33351 9.24561 7.3167 9.15863 7.28352 9.07741C7.25034 8.99618 7.20146 8.9223 7.13967 8.86001L3.60634 5.33334H12.393L8.85967 8.86001ZM13.333 4.00001H2.66634V3.33334C2.66634 3.15653 2.73658 2.98696 2.8616 2.86194C2.98663 2.73691 3.1562 2.66668 3.33301 2.66668H12.6663C12.8432 2.66668 13.0127 2.73691 13.1377 2.86194C13.2628 2.98696 13.333 3.15653 13.333 3.33334V4.00001Z"
                                fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            {{-- @foreach ($notifications as $notif)
                <div class="p-4 mb-4 shadow-lg flex flex-col rounded-lg text-sm  bg-yellow-500 text-white font-bold">
                    <p>{{ $notif->pesan }}</p>
                    @if ($notif->url)
                        <a href="{{ $notif->url }}"
                            class="p-2 text-center bg-white font-bold shadow-lg text-slate-500 mt-4 rounded w-full">Check
                            lebih detail</a>
                    @endif
                </div>
            @endforeach --}}
        </div>
        <div class="flex flex-col mb-20">
            <div class="p-4 mb-20" id="listReport">
                {{-- <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div
                                        class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div
                                class="absolute right-0 top-0 p-[12px] bg-[#D9F2E0] border border-[#41C063] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#41C063]">
                                Diproses</div>
                        </div>
                        <div class="px-2">
                            <a href="#"
                                class="items-center border border-[#41C063] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#41C063]">Selesai
                                pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div>
                <div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div
                                        class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor</small>
                                    <p class="text-slate-500 font-semibold text-sm">Andi Wirawan</p>
                                </div>
                            </div>
                            <div
                                class="absolute right-0 top-0 p-[12px] bg-[#F8D7DA] border border-[#DC3545] rounded-tr-xl rounded-bl-xl text-xs flex items-center px-8 text-[#DC3545]">
                                Ditolak</div>
                        </div>
                        <div class="px-2">
                            <a href="#"
                                class="items-center border border-[#DC3545] text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-[#DC3545]">Ditolak
                                pada 26/06/2023, 10:00</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- @if (count($notifications) > 0)
                @foreach ($notifications as $notif)
                    <a href="{{ $notif->url ? $notif->url : '#' }}" class="hover:bg-gray-100 relative px-8 w-full flex py-6 border bg-white border">
                        <span class="font-light text-xs absolute top-6 right-6">{{date("d M ", strtotime($notif->created_at))}}</span>
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div
                                        class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/user-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-slate-500 font-semibold text-sm">Notifikasi</p>
                                    <small class="text-slate-500 font-light text-xs">{{$notif->pesan}}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p class="w-full text-center font-light p-2 bg-white border">Tidak ada notifikasi</p>
            @endif --}}
        </div>
    </div>
@endsection

@section('dashboard_js')
    <script>
        const sorting = (self) => {
            let classCss = $(self).attr("data-button");
            if (classCss == "flex-col") {
                $("#listNotif").removeClass(classCss);
                classCss = "flex-col-reverse";
            } else {
                $("#listNotif").removeClass(classCss);
                classCss = "flex-col";
            }
            $(self).attr("data-button", classCss);
            $("#listNotif").addClass(classCss);
        }

        const templateReport = (data) => {
            let bgColor;
            let borderColor;
            let element;
            let button;
            let textColor;
            let text;
            let dateReport = moment(data.created_at).format("D/M/Y hh:mm");
            switch (data.report_status) {
                case "pending":
                    bgColor = "bg-green-100";
                    borderColor = "border-green-500"
                    textColor = "text-green-500";
                    break;
                case "diproses":
                    bgColor = "bg-[#CCF1F8]";
                    borderColor = "border-[#02BBDD]"
                    textColor = "text-[#02BBDD]";
                    break;
                default:
                    bgColor = "bg-blue-100";
                    borderColor = "border-blue-500"
                    textColor = "text-blue-500"
                    break;
            }
            let colorLevel;
            switch (data.type_report) {
                case 1:
                    colorLevel = "blue";
                    break;
                case 2:
                    colorLevel = "yellow";
                    break;
                default:
                    colorLevel = "red";
                    break;
            }

            return `<div class="mb-12 relative">
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
                                        <p class="text-white font-semibold text-sm">${data.user.name}</p>
                                    </div>
                                </div>
                                <div class="absolute right-0 top-0 w-[110px] p-[12px] ${bgColor} flex justify-center rounded-tr-[20px] rounded-bl-[20px] text-xs flex items-center px-8 border ${borderColor} ${textColor}">${data.report_status  == "pending" ? "baru" : data.report_status}</div>
                            </div>
                            <div class="mt-6 mb-2 px-2 flex justify-between items-center">
                                <p class="flex items-center font-light text-gray-200 text-xs"><svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>&nbsp; 26/03/2023 | 18:00</p>
                                <p class="font-light text-white rounded  text-xs flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 12" fill="none">
                                    <path d="M4.2339 4.19726L4.23278 4.19818L4.23171 4.19922L4.2339 4.19726ZM9.21096 4.104C9.17617 4.07047 9.13757 4.04114 9.09596 4.01659C9.03705 3.98193 8.97166 3.95971 8.90382 3.95131C8.83599 3.94292 8.76715 3.94853 8.70157 3.9678C8.63599 3.98707 8.57506 4.01958 8.52254 4.06333C8.47003 4.10708 8.42704 4.16114 8.39625 4.22216C8.22402 4.56151 7.98647 4.86351 7.69725 5.11083C7.74148 4.86164 7.76378 4.60904 7.7639 4.35595C7.76483 3.586 7.56171 2.82955 7.17523 2.16363C6.78875 1.49771 6.2327 0.946093 5.56371 0.564949C5.49001 0.523173 5.40691 0.500804 5.3222 0.499942C5.23749 0.49908 5.15395 0.519752 5.07942 0.56002C5.00489 0.600288 4.94181 0.65883 4.8961 0.730155C4.85039 0.801479 4.82355 0.883246 4.8181 0.967784C4.79012 1.44187 4.66618 1.90534 4.4538 2.33012C4.24141 2.75489 3.945 3.13213 3.58252 3.43896L3.46728 3.53271C3.08824 3.78776 2.75273 4.10216 2.47363 4.46386C2.03979 5.01042 1.73925 5.65054 1.59586 6.33345C1.45246 7.01637 1.47016 7.72331 1.64753 8.3982C1.8249 9.07309 2.15708 9.69738 2.61771 10.2215C3.07835 10.7457 3.65478 11.1553 4.30129 11.418C4.37719 11.449 4.45957 11.4608 4.54115 11.4525C4.62272 11.4442 4.70099 11.4159 4.76905 11.3701C4.83711 11.3244 4.89287 11.2626 4.9314 11.1902C4.96994 11.1178 4.99007 11.0371 4.99002 10.9551C4.98966 10.902 4.98126 10.8494 4.96512 10.7988C4.85325 10.3783 4.82104 9.94063 4.87014 9.5083C5.34326 10.4007 6.10271 11.108 7.02639 11.5166C7.13914 11.567 7.2666 11.5738 7.38406 11.5356C8.11384 11.3001 8.77127 10.8819 9.29388 10.3207C9.8165 9.75948 10.1869 9.07397 10.37 8.32929C10.5531 7.58461 10.5427 6.80549 10.3398 6.06596C10.1369 5.32643 9.74835 4.65105 9.21096 4.104ZM7.25856 10.5195C6.82272 10.2986 6.43825 9.9885 6.13014 9.60927C5.82203 9.23003 5.59719 8.7902 5.47023 8.31836C5.43146 8.15949 5.40146 7.9986 5.38039 7.83642C5.3661 7.73315 5.31991 7.63692 5.24825 7.56119C5.17659 7.48546 5.08306 7.43402 4.98073 7.41406C4.94921 7.40784 4.91715 7.40474 4.88502 7.40478C4.79714 7.40475 4.7108 7.42789 4.63472 7.47187C4.55864 7.51585 4.4955 7.57912 4.45167 7.65528C4.0368 8.37084 3.82816 9.1873 3.84888 10.0142C3.484 9.73047 3.17906 9.37718 2.95172 8.97476C2.72438 8.57235 2.57918 8.12881 2.52452 7.66987C2.46986 7.21092 2.50683 6.74569 2.63329 6.30113C2.75975 5.85658 2.97319 5.44155 3.26124 5.08009C3.47994 4.79601 3.74378 4.54974 4.04224 4.35109C4.05516 4.34275 4.06755 4.33362 4.07935 4.32374C4.07935 4.32374 4.22769 4.201 4.23276 4.19819C4.94511 3.59568 5.45176 2.78595 5.68213 1.88185C6.22692 2.38547 6.59018 3.05486 6.71551 3.7861C6.84084 4.51734 6.72123 5.26951 6.37525 5.92579C6.32954 6.01337 6.31078 6.11252 6.32136 6.21074C6.33193 6.30896 6.37136 6.40185 6.43466 6.47769C6.49796 6.55353 6.5823 6.60892 6.67705 6.63688C6.7718 6.66484 6.8727 6.66411 6.96704 6.63479C7.73293 6.39471 8.40689 5.92575 8.8982 5.29104C9.19347 5.72719 9.38652 6.22435 9.46295 6.74547C9.53937 7.2666 9.49722 7.79825 9.33961 8.30082C9.18201 8.80338 8.91302 9.2639 8.5527 9.64806C8.19237 10.0322 7.75 10.3301 7.25855 10.5195L7.25856 10.5195Z" fill="#FFBEA8"/>
                                    </svg>&nbsp;Level ${data.type_report}</p>
                            </div>
                            <div class="px-2">
                                <a href="{{route('fireman.detail.report',"/")}}/${data.id}" class="items-center text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm text-white bg-[#ffffff45]"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
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
                    </div>`
        }

        const getReport = async (status) => {
            let errorBanner =
                `<p id="errorBanner" style="display: none" class="bg-orange-100 border-orange-500 text-orange-600 border text-xs font-bold rounded-lg py-4 text-center">Laporan kosong</p>`
            fetch(`{{ route('fireman.report.status', '/') }}/${status}`)
                .then(res => res.json())
                .then(json => {
                    let data = json.data;
                    if (data.length < 1) {
                        $("#listReport").html(errorBanner);
                        $("#errorBanner").slideDown(500);
                    } else {
                        let reports = "";
                        data.forEach(val => {
                            reports += templateReport(val);
                        })
                        $("#listReport").html(reports);
                        $(".data-report").slideDown(500);
                    }
                })
        }

        getReport("ongoing");
    </script>
@endsection
