@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Room Chat
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('back')
    <div class="px-4 bg-slate-100 py-4 flex justify-center fixed top-0 z-[9999] w-full border-2">
        <button onclick="history.back()" class="absolute left-5 rounded-full top-6">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
        </button>
        <div class="w-full flex justify-between">
            <div class="flex mx-16 items-center">
                <div class="p-1 rounded-full bg-[#FFDFD4] border border-[#FFBEA8]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 96 87" fill="none">
                        <path d="M56.5668 36.919V38.5349C56.5668 39.0904 56.1124 39.5449 55.5569 39.5449C55.0014 39.5449 54.5469 39.0904 54.5469 38.5349V36.919C54.5469 36.3635 55.0014 35.909 55.5569 35.909C56.1124 35.909 56.5668 36.3635 56.5668 36.919ZM75.0325 78.6307V90.683C75.0325 91.2385 74.578 91.693 74.0225 91.693H21.9754C21.4199 91.693 20.9654 91.2385 20.9654 90.683V78.6307C20.9654 74.5235 23.1369 70.9044 26.7559 68.9518L33.4722 65.3496C29.163 64.508 25.8974 60.7037 25.8974 56.1589C25.8974 54.3241 26.4361 52.5398 27.4461 51.0249C26.2004 50.3011 25.2073 49.2238 24.5508 47.9781C21.1843 45.7225 19.1812 41.9856 19.1812 37.9458C19.1812 32.0038 23.4904 27.0381 29.163 26.0281V25.3717C29.163 21.6516 30.4591 17.9989 32.7989 15.1036C34.903 12.4945 37.7814 10.5756 40.9628 9.63297C40.8113 8.53883 41.0975 7.51203 41.7371 6.72089C42.3431 5.98024 43.2521 5.52576 44.0937 5.52576H51.8873C52.729 5.52576 53.6211 5.98024 54.2439 6.72089C54.9004 7.4952 55.1697 8.522 55.0182 9.63297C58.1996 10.5756 61.0781 12.4945 63.1822 15.1036C65.5219 18.0157 66.818 21.6684 66.818 25.3717V26.0281C72.4739 27.0381 76.7999 31.987 76.7999 37.9458C76.7999 42.0025 74.7968 45.7394 71.4302 47.995C70.7738 49.2406 69.7806 50.3179 68.5518 51.0417C69.5618 52.5567 70.1004 54.3409 70.1004 56.1757C70.1004 60.7206 66.8349 64.5248 62.5257 65.3664L69.2251 68.9687C72.861 70.8876 75.0325 74.5235 75.0325 78.6307ZM67.4914 32.8286C68.9895 33.7544 69.9994 35.404 69.9994 37.2893C69.9994 37.8279 69.9153 38.3498 69.7638 38.8379C71.3629 40.2687 72.3055 42.3223 72.3055 44.4769C72.3055 44.4937 72.3055 44.5274 72.3055 44.5442C73.9047 42.7263 74.7968 40.3865 74.7968 37.9121C74.7968 33.3167 71.6996 29.4284 67.4914 28.2164V32.8286ZM64.7644 34.0911H63.401V40.5212H64.7644C66.5319 40.5212 67.9795 39.0736 67.9795 37.3061C67.9795 35.5218 66.5319 34.0911 64.7644 34.0911ZM55.5232 19.4297L53.4528 25.8261H64.7139C64.7476 25.8261 64.7813 25.8261 64.8149 25.8261V25.3548C64.8149 19.0762 60.6067 13.4708 54.6647 11.6192L53.6379 17.2077L55.1529 18.3019C55.5064 18.5544 55.6579 19.0088 55.5232 19.4297ZM47.7128 71.6283C47.7801 71.7461 47.8643 71.7966 47.9989 71.7966C48.1336 71.7966 48.2346 71.7461 48.3019 71.6283L53.7389 62.0335V57.3877C51.9715 58.1115 50.0357 58.4986 47.9989 58.4986C45.9622 58.4986 44.0432 58.1115 42.259 57.3877V62.0335L47.7128 71.6283ZM40.8618 63.6663L36.2328 66.1576C36.7378 67.7399 37.1418 69.1033 37.4616 70.2311C38.0339 72.2006 38.5726 74.0522 38.9597 74.3383C39.431 74.3215 40.946 73.1264 42.5451 71.8807C43.1511 71.3926 43.8412 70.8539 44.5987 70.2648L40.8618 63.6663ZM51.3992 70.248C52.1735 70.8371 52.8468 71.3758 53.4528 71.8639C55.0519 73.1264 56.5669 74.3215 57.0382 74.3215C57.4253 74.0353 57.964 72.1837 58.5363 70.2311C58.8729 69.1033 59.2601 67.7399 59.7651 66.1408L55.1361 63.6495L51.3992 70.248ZM61.381 43.0966V27.8292H34.6168V43.0966C34.6168 50.4694 40.6093 56.4787 47.9989 56.4787C55.3717 56.4787 61.381 50.4694 61.381 43.0966ZM42.6124 19.497L44.666 25.8093H51.3318L53.3854 19.497L47.9989 15.575L42.6124 19.497ZM28.5065 32.8286V28.2332C24.2983 29.4452 21.2011 33.3336 21.2011 37.9289C21.2011 40.4034 22.1101 42.7431 23.6923 44.5442C23.6923 44.5274 23.6923 44.4937 23.6923 44.4769C23.6923 42.3223 24.635 40.2687 26.2341 38.8379C26.0826 38.3498 25.9984 37.8279 25.9984 37.2893C25.9984 35.404 27.0084 33.7544 28.5065 32.8286ZM32.5969 34.0911H31.2335C29.466 34.0911 28.0184 35.5387 28.0184 37.3061C28.0184 39.0736 29.466 40.5212 31.2335 40.5212H32.5969V34.0911ZM42.5451 25.8261L40.4747 19.4297C40.34 19.0088 40.4915 18.5544 40.845 18.3019L42.3599 17.1909L41.3331 11.6024C35.3912 13.454 31.183 19.0762 31.183 25.338V25.8093C31.2166 25.8093 31.2503 25.8093 31.284 25.8093H42.5451V25.8261ZM73.0125 78.5129L67.2725 79.91C67.1884 79.9268 67.121 79.9437 67.0369 79.9437H28.961C28.8769 79.9437 28.7927 79.9268 28.7254 79.91L22.9854 78.5129C22.9854 78.5465 22.9854 78.597 22.9854 78.6307V84.2697L27.9511 85.347V82.5864C27.9511 82.0309 28.4055 81.5764 28.961 81.5764C29.5165 81.5764 29.971 82.0309 29.971 82.5864V85.5827H46.989V82.5864C46.989 82.0309 47.4435 81.5764 47.9989 81.5764C48.5544 81.5764 49.0089 82.0309 49.0089 82.5864V85.5827H66.0269V82.5864C66.0269 82.0309 66.4814 81.5764 67.0369 81.5764C67.5923 81.5764 68.0468 82.0309 68.0468 82.5864V85.347L73.0125 84.2697V78.6307C73.0125 78.597 73.0125 78.5465 73.0125 78.5129ZM40.441 35.909C39.8855 35.909 39.431 36.3635 39.431 36.919V38.5349C39.431 39.0904 39.8855 39.5449 40.441 39.5449C40.9965 39.5449 41.451 39.0904 41.451 38.5349V36.919C41.451 36.3635 40.9965 35.909 40.441 35.909ZM52.7626 44.4264H43.2521C42.6966 44.4264 42.2421 44.8809 42.2421 45.4364C42.2421 48.6178 44.8344 51.21 48.0158 51.21C51.1972 51.21 53.7894 48.6178 53.7894 45.4364C53.7558 44.8809 53.3181 44.4264 52.7626 44.4264Z" fill="#1D1D1D"/>
                      </svg>
                </div>
                <p class="text-md font-normal ml-2">{{ $report->fireman->name }}</p>
            </div>
        </div>
        <a href="tel:{{ $report->fireman->phonenumber }}" target="_blank"
            class="p-2 px-3 flex items-center bg-[#FE5D26] rounded-full">
            <svg class="fill-white stroke-white" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
        </a>
        {{-- <p class="font-semibold text-lg">Notifikasi</p> --}}
    </div>
@endsection
@section('dashboard_content')
    <div class="overflow-y-hidden relative bg-gray-200 py-2">
        <div class="overflow-y-scroll bg-white">
            <div id="roomChat" class="bg-white p-4 mt-[90px] {{($report->report_status != 'selesai' &&
                $report->report_status != 'ditolak' &&
                $report->report_status != 'dibatalkan') ? "h-[750px] max-h-[750px]" : ""}}">
                {{-- <div class="">
                    <div class="mb-2 p-2 rounded border bg-green-50 shadow-lg rounded-xl">
                        <div class="py-1 flex mx-1 justify-end items-center">
                            <div class="text-right">
                                <p class="font-bold text-sm text-orange-500 mx-2 font-bold">Azis Zuhri</p>
                                <p class="text-xs mx-2 font-light">
                                    10/09/2023 | 20:10
                                </p>
                            </div>
                            <img src="{{ asset('icons/user.png') }}" class=" w-[50px]" alt="">
                        </div>
                        <div class="mx-2 my-2 mb-4 text-right font-bold">
                            <p class="text-justify text-xs text-slate-700 font-normal font-bold">Lorem ipsum dolor sit,
                                amet consectetur adipisicing elit. Porro repellendus ex molestias! Qui sequi quisquam
                                consequuntur exercitationem adipisci. Officia nemo quia quae voluptas dignissimos
                                praesentium eveniet architecto voluptatum. Reprehenderit, mollitia.</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="rounded-xl mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                        <div class="py-1 flex mx-1 justify-start items-center">
                            <img src="{{ url('/') }}/icons/male.png" class=" w-[50px]" alt="">
                            <div class="text-left">
                                <p class="font-bold mx-2 flex flex-col text-sm text-yellow-900 font-bold">Bayu</p>
                                <p class="text-xs mx-2 font-light text-left">
                                    10/09/2023 | 20:10
                                </p>
                            </div>
                        </div>
                        <div class="mx-2 text-left font-bold">
                            <p class="text-justify text-xs text-slate-700 font-normal font-bold">Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Doloremque, modi dolore adipisci labore excepturi sint nostrum
                                beatae aspernatur vel. Maxime incidunt temporibus ullam nulla alias laborum, odio ut
                                deleniti mollitia?</p>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        @if (
            $report->report_status != 'selesai' &&
                $report->report_status != 'ditolak' &&
                $report->report_status != 'dibatalkan')
            <div class="w-full h-[90px] px-4 bg-white mt-2">
                <div class="flex h-full items-center">
                    <input id="inputChat" type="text"
                        class="w-11/12 border border-gray-400 rounded-2xl py-[12px] px-4 text-xs placeholder:text-[12px]"
                        placeholder="Ketikan sesuatu...">
                    <button onclick="sendMessage();"
                        class="ml-2 py-2 bg-[#DFE0E0] px-2 rounded-xl flex justify-center border border-[#DFE0E0] w-1/12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 20 20"
                            fill="white">
                            <path
                                d="M16.8087 7.69168L5.142 2.87501C4.70056 2.69234 4.21603 2.63997 3.74575 2.72411C3.27548 2.80825 2.83916 3.02537 2.48845 3.34978C2.13774 3.67419 1.88733 4.09229 1.76685 4.55459C1.64638 5.01689 1.66089 5.50404 1.80867 5.95835L3.092 10L1.77533 14.0417C1.62356 14.4978 1.60651 14.988 1.72623 15.4536C1.84595 15.9192 2.09735 16.3403 2.45033 16.6667C2.9042 17.0876 3.49807 17.3251 4.117 17.3333C4.44594 17.3331 4.77161 17.268 5.07533 17.1417L16.7837 12.325C17.2397 12.1354 17.6293 11.8149 17.9033 11.4041C18.1774 10.9933 18.3237 10.5105 18.3237 10.0167C18.3237 9.52283 18.1774 9.04005 17.9033 8.62924C17.6293 8.21842 17.2397 7.89798 16.7837 7.70835L16.8087 7.69168ZM4.467 15.5833C4.32 15.644 4.15872 15.6613 4.0022 15.6332C3.84568 15.6052 3.70045 15.5329 3.58367 15.425C3.47366 15.3199 3.39453 15.1866 3.35486 15.0397C3.3152 14.8928 3.31652 14.7379 3.35867 14.5917L4.57533 10.8333H16.017L4.467 15.5833ZM4.57533 9.16668L3.33367 5.44168C3.29151 5.29547 3.2902 5.14051 3.32986 4.99361C3.36953 4.84671 3.44866 4.71347 3.55867 4.60835C3.63709 4.52608 3.73151 4.46072 3.83613 4.41629C3.94074 4.37187 4.05334 4.34931 4.167 4.35001C4.27871 4.35023 4.38923 4.3729 4.492 4.41668L16.017 9.16668H4.57533Z"
                                fill="#9FA1A3" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('dashboard_js')
    <script>
        const sendMessage = () => {
            let message = $("#inputChat").val();
            console.log("test");
            $.ajax(`{{ route('user.send.message', $report->id) }}`, {
                type: 'POST',
                data: {
                    message
                },
                success: function(data) {
                    console.log(data);
                    $("#inputChat").val("");
                    getMessages();
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);
                }
            });
        }

        const getMessages = async () => {
            let errorBanner =
                `<p id="errorBanner" style="display:none" class="text-center py-4 rounded-xl text-xs font-bold bg-slate-100 border-2 text-slate-500 p-1">Pesan Kosong</p>`
            await fetch(`{{ route('user.get.message', $report->id) }}`)
                .then(res => res.json())
                .then(json => {
                    let data = json.data;
                    console.log(data);
                    let messages = "";
                    if (data.length < 1) {
                        $("#roomChat").html(errorBanner);
                        $("#errorBanner").slideDown(0);
                    } else {
                        data.forEach(val => {
                            messages += templateMessage(val);
                        })
                        $("#roomChat").html(messages);
                        const element = document.getElementById("roomChat")
                        element.scrollTop = element.scrollHeight;
                    }
                })
        }
        const templateMessage = (data) => {
            if (data.user_id == '{{ Auth::user()->id }}') {
                return `<div class="">
                    <div class="mb-2 p-2 rounded border bg-green-50 shadow-lg rounded-xl">
                        <div class="py-1 flex mx-1 justify-end items-center">
                            <div class="text-right">
                                <p class="font-bold text-sm text-orange-500 mx-2 font-bold">Azis Zuhri</p>
                                <p class="text-xs mx-2 font-light">
                                    ${moment(data.created_at).format("MMMM Do YYYY")} | ${moment(data.created_at).format("hh:mm")}
                                </p>
                            </div>
                            <img src="{{ url('/') }}/icons/${data.user.gender == 'pria' ? 'male' : 'female'}.png" class=" w-[50px]" alt="">
                        </div>
                        <div class="mx-2 my-2 mb-4 text-right font-bold">
                            <p class="text-justify text-xs text-slate-700 font-normal font-bold">${data.message}</p>
                        </div>
                    </div>
                </div>`;
            } else {
                return ` <div class="">
                    <div class="rounded-xl mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
                        <div class="py-1 flex mx-1 justify-start items-center">
                            <img src="{{asset("icons/fireman.png")}}" class=" w-[50px]" alt="">
                            <div class="text-left">
                                <p class="font-bold mx-2 flex flex-col text-sm text-yellow-900 font-bold">${data.user.name}</p>
                                <p class="text-xs mx-2 font-light text-left">
                                    ${moment(data.created_at).format("MMMM Do YYYY")} | ${moment(data.created_at).format("hh:mm")}
                                </p>
                            </div>
                        </div>
                        <div class="mx-2 text-left font-bold">
                            <p class="text-justify text-xs text-slate-700 font-normal font-bold">${data.message}</p>
                        </div>
                    </div>
                </div>`;
            }
        }
        getMessages();

        @if ($report->report_status == 'pending' || $report->report_status == 'diproses')
            const getMessageInterval = (time) => {
                setInterval(() => {
                    getMessages();
                }, time);
            }
            getMessageInterval(3000);
        @endif
    </script>
@endsection
