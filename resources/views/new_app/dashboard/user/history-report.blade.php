@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Riwayat Laporan
@endsection
@section('dashboard_css')
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
        <p class="font-semibold text-lg">Riwayat Laporan</p>
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
                case "dibatalkan":
                    bgColor = "bg-[#F8D7DA]";
                    borderColor = "border-[#DC3545]"
                    textColor = "text-[#DC3545]"
                    text =
                        `<a href="{{route('user.detail.report',"/")}}/${data.id}" class="items-center border text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm ${borderColor}  ${textColor}">Dibatalkan pada ${dateReport}</a>`;
                    break
                case "ditolak":
                    bgColor = "bg-[#F8D7DA]";
                    borderColor = "border-[#DC3545]"
                    textColor = "text-[#DC3545]"
                    text =
                        `<a href="{{route('user.detail.report',"/")}}/${data.id}" class="items-center border text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm ${borderColor}  ${textColor}">Ditolak pada ${dateReport}</a>`;
                    break
                case "selesai":
                    bgColor = "bg-[#D9F2E0]";
                    borderColor = "border-[#41C063]"
                    textColor = "text-[#41C063]"
                    text =
                        `<a href="{{route('user.detail.report',"/")}}/${data.id}" class="items-center border text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm ${borderColor}  ${textColor}">Selesai pada ${dateReport}</a>`;
                    break;
                default:
                    bgColor = "bg-blue-100";
                    borderColor = "border-blue-500"
                    textColor = "text-blue-500"
                    text =
                        `<a href="{{route('user.detail.report',"/")}}/${data.id}" class="items-center border text-sm w-full text-center flex justify-center mt-6 py-[10px] rounded-full text-sm ${borderColor} ${bgColor} ${textColor}"><svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>&nbsp;&nbsp;Tinjau Laporan</a></a>`;
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

            return `<div class="my-4 relative">
                    <div class="p-4 my-2 rounded-[20px] bg-white border shadow">
                        <div class="flex justify-between">
                            <div class="flex items-center">
                                <div class="flex justify-center">
                                    <div
                                        class="mr-2 w-[40px] rounded-full p-1 bg-[#FFDFD4] border-2 border-[#FFBEA8] shadow-lg">
                                        <img class="w-full" src="{{ asset('icons/damkar-selected.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <small class="text-slate-500 font-light text-xs">Pelapor | <span class="bg-${colorLevel}-500 px-2 rounded text-white text-[10px]">Level ${data.type_report}</span></small>
                                    <p class="text-slate-500 font-semibold text-sm">${data.fireman.name}</p>
                                </div>
                            </div>
                            <div
                                class="absolute right-0 top-0 w-[100px] p-2 py-[12px] ${bgColor} border ${borderColor} rounded-tr-xl rounded-bl-xl text-xs flex items-center justify-center  ${textColor}">
                                ${data.report_status == 'pending' ? "Baru" : data.report_status}</div>
                        </div>
                        <div class="px-2">
                            ${text}
                        </div>
                    </div>
                </div>`
        }

        const getReport = async (status) => {
            let errorBanner =
                `<p id="errorBanner" style="display: none" class="bg-orange-100 border-orange-500 text-orange-600 border text-xs font-bold rounded-lg py-4 text-center">Laporan kosong</p>`
            fetch(`{{ route('user.report.status', '/') }}/${status}`)
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

        getReport("history");
    </script>
@endsection
