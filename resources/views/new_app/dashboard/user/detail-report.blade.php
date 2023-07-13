@extends('new_app.dashboard.template.master')
@section('dashboard_title')
    Detail Laporan
@endsection
@section('dashboard_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <style>
        .leaflet-routing-container {
            display: none;
        }

        .leaflet-div-icon {
            background: none;
            border: none;
        }

        #exampleModalSm {
            z-index: 999999999999;
        }

        .undefined {
            z-index: 999999;
        }
    </style>
@endsection
@section('back')
    <div class="mt-10 mb-4 flex justify-center absolute top-[-20px] z-[1001] w-full">
        <div
            class="bg-orange-100 text-orange-500 border-2 border-orange-500 flex w-[300px] py-[12px] rounded justify-center items-center relative rounded-lg shadow-lg">
            <a href="{{route('user.home')}}" class="absolute left-3 flex items-center ">
                <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
            </a>
            <p class="font-semibold text-sm">Detail Laporan</p>
        </div>
    </div>
@endsection
@section('dashboard_content')
    <div class="h-screen relative">
        <div data-te-modal-init
            class="fixed left-0 top-10 z-[1000] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="exampleModalSm" tabindex="-1" aria-labelledby="exampleModalSmLabel" aria-modal="true" role="dialog">
            <div data-te-modal-dialog-ref
                class="mx-4 pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[300px]">
                <div
                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                    <div
                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                        <!--Modal title-->
                        <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                            id="exampleModalSmLabel1">
                            Konfirmasi
                        </h5>
                        <!--Close button-->
                        <button type="button"
                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                            data-te-modal-dismiss aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!--Modal body-->
                    <div class="relative p-4">
                        <p class="text-sm font-normal">
                            Apakah Anda ingin membatalkan proses laporan ini ?
                        </p>
                        <div class="flex mt-2 rounded-lg">
                            <button type="button"
                                class="mr-2 rounded-lg py-2 w-1/2 bg-red-600 text-white box-content border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                data-te-modal-dismiss aria-label="Close">
                                Tidak
                            </button>
                            <button type="button"
                                class="ml-2 rounded-lg py-2 w-1/2 bg-green-600 text-white box-content border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                onclick="actionReport('dibatalkan')">
                                Ya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalLogout" style="transition: 500ms" class="w-full fixed z-[10000] left-0 bottom-0 flex justify-center">
            <div class="p-4 flex flex-col items-center justify-center w-[600px] md:w-[500px]">
                <div class="w-full bg-white shadow border-2 rounded-xl relative">
                    <div class="flex justify-center w-full">
                        <div class="absolute top-[-25px]">
                            <svg id="btnClose" onclick="showDetail(false);" style="display: none"
                                class="cursor-pointer fill-[#FE5D26] stroke-white hidden" viewBox="0 0 24 24" width="50"
                                height="50" stroke="currentColor" stroke-width="1.5" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="16 12 12 8 8 12"></polyline>
                                <line x1="12" y1="16" x2="12" y2="8"></line>
                            </svg>
                            <svg id="btnShow" onclick="showDetail(true);"
                                class="cursor-pointer fill-[#FE5D26] stroke-white" viewBox="0 0 24 24" width="50"
                                height="50" stroke="currentColor" stroke-width="1.5" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="8 12 12 16 16 12"></polyline>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="p-4 grid grid-cols-4 flex items-center">
                        <div class="col-span-1 flex items-center justify-center">
                            <div
                                class="pt-1 px-1 bg-[#FFDFD4] rounded-[20px] flex justify-center border-2 border-[#FFBEA8]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="86" height="100"
                                    viewBox="0 0 96 87" fill="none">
                                    <path
                                        d="M56.5668 36.919V38.5349C56.5668 39.0904 56.1124 39.5449 55.5569 39.5449C55.0014 39.5449 54.5469 39.0904 54.5469 38.5349V36.919C54.5469 36.3635 55.0014 35.909 55.5569 35.909C56.1124 35.909 56.5668 36.3635 56.5668 36.919ZM75.0325 78.6307V90.683C75.0325 91.2385 74.578 91.693 74.0225 91.693H21.9754C21.4199 91.693 20.9654 91.2385 20.9654 90.683V78.6307C20.9654 74.5235 23.1369 70.9044 26.7559 68.9518L33.4722 65.3496C29.163 64.508 25.8974 60.7037 25.8974 56.1589C25.8974 54.3241 26.4361 52.5398 27.4461 51.0249C26.2004 50.3011 25.2073 49.2238 24.5508 47.9781C21.1843 45.7225 19.1812 41.9856 19.1812 37.9458C19.1812 32.0038 23.4904 27.0381 29.163 26.0281V25.3717C29.163 21.6516 30.4591 17.9989 32.7989 15.1036C34.903 12.4945 37.7814 10.5756 40.9628 9.63297C40.8113 8.53883 41.0975 7.51203 41.7371 6.72089C42.3431 5.98024 43.2521 5.52576 44.0937 5.52576H51.8873C52.729 5.52576 53.6211 5.98024 54.2439 6.72089C54.9004 7.4952 55.1697 8.522 55.0182 9.63297C58.1996 10.5756 61.0781 12.4945 63.1822 15.1036C65.5219 18.0157 66.818 21.6684 66.818 25.3717V26.0281C72.4739 27.0381 76.7999 31.987 76.7999 37.9458C76.7999 42.0025 74.7968 45.7394 71.4302 47.995C70.7738 49.2406 69.7806 50.3179 68.5518 51.0417C69.5618 52.5567 70.1004 54.3409 70.1004 56.1757C70.1004 60.7206 66.8349 64.5248 62.5257 65.3664L69.2251 68.9687C72.861 70.8876 75.0325 74.5235 75.0325 78.6307ZM67.4914 32.8286C68.9895 33.7544 69.9994 35.404 69.9994 37.2893C69.9994 37.8279 69.9153 38.3498 69.7638 38.8379C71.3629 40.2687 72.3055 42.3223 72.3055 44.4769C72.3055 44.4937 72.3055 44.5274 72.3055 44.5442C73.9047 42.7263 74.7968 40.3865 74.7968 37.9121C74.7968 33.3167 71.6996 29.4284 67.4914 28.2164V32.8286ZM64.7644 34.0911H63.401V40.5212H64.7644C66.5319 40.5212 67.9795 39.0736 67.9795 37.3061C67.9795 35.5218 66.5319 34.0911 64.7644 34.0911ZM55.5232 19.4297L53.4528 25.8261H64.7139C64.7476 25.8261 64.7813 25.8261 64.8149 25.8261V25.3548C64.8149 19.0762 60.6067 13.4708 54.6647 11.6192L53.6379 17.2077L55.1529 18.3019C55.5064 18.5544 55.6579 19.0088 55.5232 19.4297ZM47.7128 71.6283C47.7801 71.7461 47.8643 71.7966 47.9989 71.7966C48.1336 71.7966 48.2346 71.7461 48.3019 71.6283L53.7389 62.0335V57.3877C51.9715 58.1115 50.0357 58.4986 47.9989 58.4986C45.9622 58.4986 44.0432 58.1115 42.259 57.3877V62.0335L47.7128 71.6283ZM40.8618 63.6663L36.2328 66.1576C36.7378 67.7399 37.1418 69.1033 37.4616 70.2311C38.0339 72.2006 38.5726 74.0522 38.9597 74.3383C39.431 74.3215 40.946 73.1264 42.5451 71.8807C43.1511 71.3926 43.8412 70.8539 44.5987 70.2648L40.8618 63.6663ZM51.3992 70.248C52.1735 70.8371 52.8468 71.3758 53.4528 71.8639C55.0519 73.1264 56.5669 74.3215 57.0382 74.3215C57.4253 74.0353 57.964 72.1837 58.5363 70.2311C58.8729 69.1033 59.2601 67.7399 59.7651 66.1408L55.1361 63.6495L51.3992 70.248ZM61.381 43.0966V27.8292H34.6168V43.0966C34.6168 50.4694 40.6093 56.4787 47.9989 56.4787C55.3717 56.4787 61.381 50.4694 61.381 43.0966ZM42.6124 19.497L44.666 25.8093H51.3318L53.3854 19.497L47.9989 15.575L42.6124 19.497ZM28.5065 32.8286V28.2332C24.2983 29.4452 21.2011 33.3336 21.2011 37.9289C21.2011 40.4034 22.1101 42.7431 23.6923 44.5442C23.6923 44.5274 23.6923 44.4937 23.6923 44.4769C23.6923 42.3223 24.635 40.2687 26.2341 38.8379C26.0826 38.3498 25.9984 37.8279 25.9984 37.2893C25.9984 35.404 27.0084 33.7544 28.5065 32.8286ZM32.5969 34.0911H31.2335C29.466 34.0911 28.0184 35.5387 28.0184 37.3061C28.0184 39.0736 29.466 40.5212 31.2335 40.5212H32.5969V34.0911ZM42.5451 25.8261L40.4747 19.4297C40.34 19.0088 40.4915 18.5544 40.845 18.3019L42.3599 17.1909L41.3331 11.6024C35.3912 13.454 31.183 19.0762 31.183 25.338V25.8093C31.2166 25.8093 31.2503 25.8093 31.284 25.8093H42.5451V25.8261ZM73.0125 78.5129L67.2725 79.91C67.1884 79.9268 67.121 79.9437 67.0369 79.9437H28.961C28.8769 79.9437 28.7927 79.9268 28.7254 79.91L22.9854 78.5129C22.9854 78.5465 22.9854 78.597 22.9854 78.6307V84.2697L27.9511 85.347V82.5864C27.9511 82.0309 28.4055 81.5764 28.961 81.5764C29.5165 81.5764 29.971 82.0309 29.971 82.5864V85.5827H46.989V82.5864C46.989 82.0309 47.4435 81.5764 47.9989 81.5764C48.5544 81.5764 49.0089 82.0309 49.0089 82.5864V85.5827H66.0269V82.5864C66.0269 82.0309 66.4814 81.5764 67.0369 81.5764C67.5923 81.5764 68.0468 82.0309 68.0468 82.5864V85.347L73.0125 84.2697V78.6307C73.0125 78.597 73.0125 78.5465 73.0125 78.5129ZM40.441 35.909C39.8855 35.909 39.431 36.3635 39.431 36.919V38.5349C39.431 39.0904 39.8855 39.5449 40.441 39.5449C40.9965 39.5449 41.451 39.0904 41.451 38.5349V36.919C41.451 36.3635 40.9965 35.909 40.441 35.909ZM52.7626 44.4264H43.2521C42.6966 44.4264 42.2421 44.8809 42.2421 45.4364C42.2421 48.6178 44.8344 51.21 48.0158 51.21C51.1972 51.21 53.7894 48.6178 53.7894 45.4364C53.7558 44.8809 53.3181 44.4264 52.7626 44.4264Z"
                                        fill="#1D1D1D" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-span-3">
                            <div class="px-4 py-2">
                                <p class="font-light text-xs">Damkar</p>
                                <p class="font-semibold text-sm">{{ $report->fireman->name }}</p>
                                <div class="mt-2 grid grid-cols-2">
                                    <p class="my-1 font-light text-xs flex col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.99984 7.2C8.26355 7.2 8.52133 7.1218 8.7406 6.97529C8.95986 6.82878 9.13076 6.62055 9.23168 6.37691C9.33259 6.13328 9.359 5.86519 9.30755 5.60655C9.2561 5.3479 9.12912 5.11033 8.94265 4.92386C8.75618 4.73739 8.5186 4.6104 8.25996 4.55895C8.00132 4.50751 7.73323 4.53391 7.48959 4.63483C7.24596 4.73574 7.03772 4.90664 6.89121 5.12591C6.7447 5.34517 6.6665 5.60296 6.6665 5.86667C6.6665 6.22029 6.80698 6.55943 7.05703 6.80948C7.30708 7.05952 7.64621 7.2 7.99984 7.2ZM7.5265 11.8067C7.58848 11.8692 7.66221 11.9187 7.74345 11.9526C7.82469 11.9864 7.91183 12.0039 7.99984 12.0039C8.08784 12.0039 8.17498 11.9864 8.25622 11.9526C8.33746 11.9187 8.41119 11.8692 8.47317 11.8067L11.1998 9.07333C11.8331 8.44036 12.2645 7.63379 12.4394 6.75564C12.6142 5.87749 12.5247 4.9672 12.1822 4.13993C11.8396 3.31265 11.2594 2.60554 10.515 2.10804C9.77051 1.61054 8.89523 1.34499 7.99984 1.34499C7.10445 1.34499 6.22917 1.61054 5.48471 2.10804C4.74025 2.60554 4.16006 3.31265 3.81752 4.13993C3.47497 4.9672 3.38547 5.87749 3.56032 6.75564C3.73518 7.63379 4.16653 8.44036 4.79984 9.07333L7.5265 11.8067ZM4.81984 5.56C4.86539 5.08468 5.01652 4.62553 5.26219 4.21608C5.50786 3.80662 5.84187 3.45721 6.23984 3.19333C6.76264 2.85007 7.37441 2.66717 7.99984 2.66717C8.62526 2.66717 9.23703 2.85007 9.75984 3.19333C10.1551 3.4563 10.4873 3.8036 10.7323 4.21026C10.9774 4.61691 11.1293 5.07282 11.1771 5.54519C11.2249 6.01756 11.1674 6.49466 11.0088 6.94217C10.8502 7.38968 10.5944 7.79649 10.2598 8.13333L7.99984 10.3933L5.73984 8.13333C5.40485 7.79976 5.14846 7.39569 4.98931 6.95053C4.83016 6.50538 4.77226 6.03035 4.81984 5.56ZM12.6665 13.3333H3.33317C3.15636 13.3333 2.98679 13.4036 2.86177 13.5286C2.73674 13.6536 2.6665 13.8232 2.6665 14C2.6665 14.1768 2.73674 14.3464 2.86177 14.4714C2.98679 14.5964 3.15636 14.6667 3.33317 14.6667H12.6665C12.8433 14.6667 13.0129 14.5964 13.1379 14.4714C13.2629 14.3464 13.3332 14.1768 13.3332 14C13.3332 13.8232 13.2629 13.6536 13.1379 13.5286C13.0129 13.4036 12.8433 13.3333 12.6665 13.3333Z"
                                                fill="#DC3545" />
                                        </svg>
                                        <span class="font-light text-xs" id="jarak">-</span>
                                    </p>
                                    <p class="my-1 font-light text-xs flex col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M7.33366 1.33334C6.01512 1.33334 4.72619 1.72434 3.62986 2.45688C2.53353 3.18942 1.67905 4.23061 1.17447 5.44879C0.669881 6.66696 0.537859 8.00741 0.795093 9.30061C1.05233 10.5938 1.68727 11.7817 2.61962 12.7141C3.55197 13.6464 4.73985 14.2813 6.03306 14.5386C7.32627 14.7958 8.66671 14.6638 9.88489 14.1592C11.1031 13.6546 12.1442 12.8001 12.8768 11.7038C13.6093 10.6075 14.0003 9.31855 14.0003 8.00001C14.0003 7.12453 13.8279 6.25762 13.4929 5.44879C13.1578 4.63995 12.6668 3.90502 12.0477 3.28596C11.4286 2.66691 10.6937 2.17584 9.88489 1.84081C9.07605 1.50578 8.20914 1.33334 7.33366 1.33334ZM7.33366 13.3333C6.27883 13.3333 5.24768 13.0205 4.37062 12.4345C3.49356 11.8485 2.80997 11.0155 2.4063 10.041C2.00264 9.06645 1.89702 7.99409 2.10281 6.95953C2.30859 5.92496 2.81655 4.97465 3.56243 4.22877C4.30831 3.48289 5.25862 2.97494 6.29318 2.76916C7.32775 2.56337 8.4001 2.66899 9.37464 3.07265C10.3492 3.47632 11.1821 4.15991 11.7682 5.03697C12.3542 5.91403 12.667 6.94518 12.667 8.00001C12.667 9.4145 12.1051 10.7711 11.1049 11.7712C10.1047 12.7714 8.74815 13.3333 7.33366 13.3333ZM7.33366 4.00001C7.15685 4.00001 6.98728 4.07025 6.86226 4.19527C6.73723 4.3203 6.667 4.48987 6.667 4.66668V7.61334L5.267 8.42001C5.13857 8.49279 5.03792 8.60613 4.98085 8.74226C4.92377 8.8784 4.9135 9.02963 4.95163 9.17223C4.98976 9.31484 5.07414 9.44075 5.19154 9.53024C5.30894 9.61972 5.45272 9.66771 5.60033 9.66668C5.71711 9.66748 5.83206 9.6376 5.93366 9.58001L7.667 8.58001L7.727 8.52001L7.83366 8.43334C7.85973 8.40034 7.88209 8.36457 7.90033 8.32668C7.92206 8.29089 7.93993 8.2529 7.95366 8.21334C7.9718 8.17096 7.98305 8.12595 7.987 8.08001L8.00033 8.00001V4.66668C8.00033 4.48987 7.93009 4.3203 7.80507 4.19527C7.68004 4.07025 7.51047 4.00001 7.33366 4.00001Z"
                                                fill="#DC3545" />
                                        </svg>
                                        <span class="font-light text-xs" id="estimasiWaktu">-</span>
                                    </p>
                                    <p class="my-1 font-light text-xs flex col-span-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M12.9601 8.66668C12.8134 8.66668 12.6601 8.62001 12.5134 8.58668C12.2164 8.52123 11.9245 8.43434 11.6401 8.32668C11.3308 8.21417 10.9908 8.22001 10.6856 8.34309C10.3804 8.46616 10.1315 8.69777 9.98673 8.99335L9.84007 9.29335C9.19074 8.93213 8.59406 8.4835 8.06673 7.96001C7.54325 7.43269 7.09462 6.83601 6.7334 6.18668L7.0134 6.00001C7.30898 5.85529 7.54059 5.60637 7.66366 5.30114C7.78674 4.99592 7.79258 4.65596 7.68007 4.34668C7.57422 4.06163 7.48736 3.76988 7.42007 3.47335C7.38673 3.32668 7.36007 3.17335 7.34007 3.02001C7.25911 2.55043 7.01315 2.12518 6.64648 1.82084C6.27981 1.5165 5.81653 1.35309 5.34007 1.36001H3.34007C3.05275 1.35732 2.76823 1.41656 2.50587 1.5337C2.24351 1.65085 2.00947 1.82314 1.81969 2.03887C1.6299 2.25459 1.48882 2.50868 1.40606 2.78382C1.32329 3.05897 1.30079 3.34872 1.34007 3.63335C1.69523 6.42627 2.97075 9.02127 4.96517 11.0084C6.95958 12.9956 9.55921 14.2617 12.3534 14.6067H12.6067C13.0983 14.6074 13.573 14.427 13.9401 14.1C14.151 13.9114 14.3195 13.6801 14.4344 13.4216C14.5493 13.163 14.608 12.883 14.6067 12.6V10.6C14.5986 10.1369 14.4299 9.69105 14.1296 9.33846C13.8293 8.98587 13.4159 8.74843 12.9601 8.66668ZM13.2934 12.6667C13.2933 12.7613 13.273 12.8549 13.2339 12.9411C13.1948 13.0273 13.1378 13.1042 13.0667 13.1667C12.9922 13.231 12.9051 13.279 12.811 13.3077C12.7169 13.3364 12.6178 13.3452 12.5201 13.3333C10.0233 13.0132 7.70423 11.871 5.92854 10.0869C4.15286 8.30274 3.02167 5.97824 2.7134 3.48001C2.70279 3.38236 2.71209 3.28357 2.74074 3.18961C2.76938 3.09565 2.81678 3.00847 2.88007 2.93335C2.94254 2.86223 3.01944 2.80524 3.10565 2.76616C3.19186 2.72708 3.28541 2.7068 3.38007 2.70668H5.38007C5.5351 2.70323 5.68648 2.75393 5.80816 2.85006C5.92984 2.94619 6.01421 3.08173 6.04673 3.23335C6.0734 3.41557 6.10673 3.59557 6.14673 3.77335C6.22375 4.12478 6.32624 4.47013 6.4534 4.80668L5.52007 5.24001C5.44027 5.27663 5.36848 5.32864 5.30884 5.39308C5.2492 5.45751 5.20287 5.53309 5.17251 5.61548C5.14216 5.69786 5.12838 5.78543 5.13197 5.87316C5.13555 5.96089 5.15643 6.04704 5.1934 6.12668C6.15287 8.18185 7.8049 9.83388 9.86007 10.7933C10.0224 10.86 10.2044 10.86 10.3667 10.7933C10.4499 10.7636 10.5263 10.7176 10.5915 10.6581C10.6567 10.5986 10.7095 10.5268 10.7467 10.4467L11.1601 9.51335C11.5047 9.6366 11.8565 9.73901 12.2134 9.82001C12.3912 9.86001 12.5712 9.89335 12.7534 9.92001C12.905 9.95254 13.0406 10.0369 13.1367 10.1586C13.2328 10.2803 13.2835 10.4317 13.2801 10.5867L13.2934 12.6667Z"
                                                fill="#DC3545" />
                                        </svg>
                                        &nbsp;{{ $report->fireman->phonenumber }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex px-4">
                                <a href="tel:{{ $report->fireman->phonenumber }}"
                                    class="rounded-lg bg-[#FE5D26] flex items-center p-2 shadow mr-1 px-4 border w-1/2"
                                    target="_blank">
                                    <svg class="fill-white stroke-white" viewBox="0 0 24 24" width="24"
                                        height="24" stroke="currentColor" stroke-width="1" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                        <path
                                            d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg>
                                    <p class="font-normal text-xs text-white">&nbsp;&nbsp;&nbsp;&nbsp;Panggil</p>
                                </a>
                                <a href="{{ route('user.roomchat', $report->id) }}"
                                    class="rounded-lg bg-[#FE5D26] flex items-center shadow p-2 ml-1 px-4 border w-1/2">
                                    <svg class="stroke-white" viewBox="0 0 24 24" width="24" height="24"
                                        stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        class="css-i6dzq1">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                                        </path>
                                    </svg>
                                    <p class="font-normal text-xs text-white">&nbsp;&nbsp;Kirim Pesan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Button trigger small modal-->
                    {{-- <button type="button"
                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                        data-te-toggle="modal" data-te-target="#exampleModalSm" data-te-ripple-init
                        data-te-ripple-color="light">
                        Small modal
                    </button> --}}
                    <!--Small modal-->
                    <div class="w-full flex mb-4">
                        @if ($report->report_status == 'pending')
                            <button data-te-toggle="modal" data-te-target="#exampleModalSm" data-te-ripple-init
                                data-te-ripple-color="light"
                                class="p-2 w-full mx-2 rounded-lg text-xs font-bold py-3 bg-red-100 border border-red-500 text-red-700">Batalkan
                                Laporan</button>
                        @endif
                    </div>
                    <div class="mt-2 mb-4" id="detailInfo">
                        <div
                            class="border-t border-t-gray-300 border-slate-300 py-4 p-2 px-4 border-l-4 border-l-[#02BBDD]">
                            <div class="flex justify-between items-center">
                                <p class="text-xs font-light">Status</p>
                                <p
                                    class="text-xs font-normal bg-{{ statusColor($report->report_status) }} p-2 px-4 rounded-lg text-white">
                                    {{ $report->report_status }}</p>
                            </div>
                        </div>
                        <div class="border-t border-t-gray-300 border-slate-300 py-4 p-2 px-4">
                            <div class="px-2 flex justify-between">
                                <p class="text-xs font-light">Level</p>
                                <p class="font-bold text-xs text-red-500">Level {{ $report->type_report }}</p>
                            </div>
                        </div>
                        <div class="border-t border-t-gray-300 border-slate-300 py-4 p-2 px-4">
                            <div class="px-2 flex justify-between">
                                <p class="text-xs font-light">Tanggal Laporan</p>
                                <p class="font-bold text-xs font-normal">{{ date('d/m/y | h:i') }}</p>
                            </div>
                        </div>
                        <div class="border-t border-t-gray-300 border-slate-300 py-4 p-2 px-4">
                            <div class="px-2 flex flex-col">
                                <p class="text-xs font-light">Foto</p>
                                <div class="overflow-x-scroll mt-2">
                                    <div class="flex flex max-w-[400px]">
                                        @foreach ($report->documents as $doc)
                                            <a href="{{ url('/') }}/{{ $doc->path_document }}">
                                                <div
                                                    class="preview mx-1 flex justify-center border h-[60px] w-[65px] rounded-xl">
                                                    <img class="w-full rounded-xl "
                                                        src="{{ url('/') . '/' . $doc->path_document }}"
                                                        id="preview-selected-image" />
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-t-gray-300 border-slate-300 py-4 p-2 px-4">
                            <div class="px-2 flex flex-col">
                                <p class="text-xs font-light">Deskripsi</p>
                                <p class="font-bold mt-2 text-xs font-light">{{ $report->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-screen relative">
            {{-- <p class="mt-4 font-bold relative">Titik Lokasi Unit Kebakaran</p>
            <div class="w-full flex justify-end">
                <small id="latlong" class="font-bold text-[10px]" style="display: none"></small>
            </div> --}}
            <div id="map" class="h-full border-2 border-slate-500">
            </div>
        </div>
    </div>
@endsection

@section('dashboard_js')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        const showDetail = (status) => {
            if (!status) {
                $("#btnClose").slideUp(500);
                $("#btnShow").slideDown(500);
                $("#detailInfo").slideDown(500);
            } else {
                $("#btnClose").slideDown(500);
                $("#btnShow").slideUp(500);
                $("#detailInfo").slideUp(500);
            }
        }
        let currentPoint = [parseFloat('{{ $report->fireman->latitude }}'), parseFloat(
            '{{ $report->fireman->longitude }}')];
        let map = L.map('map').setView(currentPoint, 13);
        googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 30,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);
        let icon = L.divIcon({
            class: '',
            html: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 32 30" fill="none">
  <path d="M18.8555 12.1063V12.645C18.8555 12.8302 18.704 12.9816 18.5188 12.9816C18.3336 12.9816 18.1821 12.8302 18.1821 12.645V12.1063C18.1821 11.9212 18.3336 11.7697 18.5188 11.7697C18.704 11.7697 18.8555 11.9212 18.8555 12.1063ZM25.0107 26.0103V30.0277C25.0107 30.2129 24.8592 30.3643 24.674 30.3643H7.32497C7.13981 30.3643 6.98831 30.2129 6.98831 30.0277V26.0103C6.98831 24.6412 7.71213 23.4348 8.91848 22.784L11.1572 21.5832C9.72084 21.3027 8.63232 20.0346 8.63232 18.5196C8.63232 17.9081 8.81187 17.3133 9.14853 16.8083C8.73332 16.567 8.40227 16.2079 8.18344 15.7927C7.06126 15.0409 6.39355 13.7952 6.39355 12.4486C6.39355 10.4679 7.82996 8.81272 9.72084 8.47606V8.25724C9.72084 7.01722 10.1529 5.79964 10.9328 4.83456C11.6342 3.96487 12.5936 3.32522 13.6541 3.01101C13.6036 2.6463 13.699 2.30403 13.9122 2.04031C14.1142 1.79343 14.4172 1.64194 14.6977 1.64194H17.2956C17.5762 1.64194 17.8735 1.79343 18.0811 2.04031C18.3 2.29842 18.3897 2.64068 18.3392 3.01101C19.3997 3.32522 20.3592 3.96487 21.0606 4.83456C21.8405 5.80526 22.2725 7.02283 22.2725 8.25724V8.47606C24.1578 8.81272 25.5998 10.4623 25.5998 12.4486C25.5998 13.8008 24.9321 15.0465 23.8099 15.7983C23.5911 16.2136 23.26 16.5727 22.8504 16.8139C23.1871 17.3189 23.3666 17.9137 23.3666 18.5253C23.3666 20.0402 22.2781 21.3083 20.8417 21.5888L23.0749 22.7896C24.2868 23.4292 25.0107 24.6412 25.0107 26.0103ZM22.497 10.7429C22.9963 11.0515 23.333 11.6014 23.333 12.2298C23.333 12.4093 23.3049 12.5833 23.2544 12.746C23.7875 13.2229 24.1017 13.9075 24.1017 14.6257C24.1017 14.6313 24.1017 14.6425 24.1017 14.6481C24.6347 14.0421 24.9321 13.2622 24.9321 12.4374C24.9321 10.9056 23.8997 9.60947 22.497 9.20549V10.7429ZM21.588 11.1637H21.1335V13.3071H21.588C22.1771 13.3071 22.6597 12.8245 22.6597 12.2354C22.6597 11.6406 22.1771 11.1637 21.588 11.1637ZM18.5076 6.27657L17.8174 8.40873H21.5711C21.5824 8.40873 21.5936 8.40873 21.6048 8.40873V8.25163C21.6048 6.15875 20.2021 4.2903 18.2214 3.6731L17.8792 5.53593L18.3841 5.90064C18.502 5.98481 18.5525 6.1363 18.5076 6.27657ZM15.9041 23.6761C15.9265 23.7154 15.9546 23.7322 15.9995 23.7322C16.0444 23.7322 16.078 23.7154 16.1005 23.6761L17.9128 20.4779V18.9292C17.3237 19.1705 16.6784 19.2996 15.9995 19.2996C15.3206 19.2996 14.6809 19.1705 14.0862 18.9292V20.4779L15.9041 23.6761ZM13.6204 21.0221L12.0774 21.8525C12.2458 22.38 12.3804 22.8345 12.487 23.2104C12.6778 23.8669 12.8574 24.4841 12.9864 24.5795C13.1435 24.5739 13.6485 24.1755 14.1815 23.7603C14.3835 23.5975 14.6136 23.418 14.8661 23.2216L13.6204 21.0221ZM17.1329 23.216C17.391 23.4124 17.6154 23.5919 17.8174 23.7547C18.3505 24.1755 18.8555 24.5739 19.0126 24.5739C19.1416 24.4785 19.3212 23.8613 19.5119 23.2104C19.6242 22.8345 19.7532 22.38 19.9215 21.8469L18.3785 21.0165L17.1329 23.216ZM20.4602 14.1656V9.07643H11.5388V14.1656C11.5388 16.6232 13.5363 18.6263 15.9995 18.6263C18.4571 18.6263 20.4602 16.6232 20.4602 14.1656ZM14.204 6.29902L14.8885 8.40312H17.1105L17.795 6.29902L15.9995 4.99167L14.204 6.29902ZM9.50202 10.7429V9.2111C8.09928 9.61508 7.06687 10.9112 7.06687 12.443C7.06687 13.2678 7.36986 14.0477 7.89729 14.6481C7.89729 14.6425 7.89729 14.6313 7.89729 14.6257C7.89729 13.9075 8.2115 13.2229 8.74454 12.746C8.69404 12.5833 8.66599 12.4093 8.66599 12.2298C8.66599 11.6014 9.00264 11.0515 9.50202 10.7429ZM10.8655 11.1637H10.411C9.82184 11.1637 9.3393 11.6462 9.3393 12.2354C9.3393 12.8245 9.82184 13.3071 10.411 13.3071H10.8655V11.1637ZM14.1815 8.40873L13.4914 6.27657C13.4465 6.1363 13.497 5.98481 13.6148 5.90064L14.1198 5.53032L13.7776 3.66749C11.7969 4.28469 10.3942 6.15875 10.3942 8.24602V8.40312C10.4054 8.40312 10.4166 8.40312 10.4278 8.40312H14.1815V8.40873ZM24.3373 25.971L22.424 26.4367C22.396 26.4423 22.3735 26.4479 22.3455 26.4479H9.65351C9.62546 26.4479 9.5974 26.4423 9.57496 26.4367L7.66163 25.971C7.66163 25.9822 7.66163 25.999 7.66163 26.0103V27.8899L9.31685 28.249V27.3288C9.31685 27.1437 9.46835 26.9922 9.65351 26.9922C9.83867 26.9922 9.99017 27.1437 9.99017 27.3288V28.3276H15.6628V27.3288C15.6628 27.1437 15.8143 26.9922 15.9995 26.9922C16.1846 26.9922 16.3361 27.1437 16.3361 27.3288V28.3276H22.0088V27.3288C22.0088 27.1437 22.1603 26.9922 22.3455 26.9922C22.5306 26.9922 22.6821 27.1437 22.6821 27.3288V28.249L24.3373 27.8899V26.0103C24.3373 25.999 24.3373 25.9822 24.3373 25.971ZM13.4802 11.7697C13.295 11.7697 13.1435 11.9212 13.1435 12.1063V12.645C13.1435 12.8302 13.295 12.9816 13.4802 12.9816C13.6653 12.9816 13.8168 12.8302 13.8168 12.645V12.1063C13.8168 11.9212 13.6653 11.7697 13.4802 11.7697ZM17.5874 14.6088H14.4172C14.232 14.6088 14.0805 14.7603 14.0805 14.9455C14.0805 16.0059 14.9446 16.87 16.0051 16.87C17.0656 16.87 17.9296 16.0059 17.9296 14.9455C17.9184 14.7603 17.7725 14.6088 17.5874 14.6088Z" fill="#1D1D1D"/>
</svg>`,

            iconSize: [10, 10], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [8, 15], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let circle = L.circle(currentPoint, {
            color: '#FFDFD4',
            fillColor: '#FFBEA8',
            fillOpacity: 1,
            radius: 400
        }).addTo(map);
        let marker = L.marker(currentPoint, {
            icon
        }).addTo(map);

        let popupContent = `<b>{{ $report->fireman->name }}</b><br>(Telp: {{ $report->fireman->phonenumber }})<br>
                         {{ $report->fireman->address }}<br>
                        `;
        marker.bindPopup(popupContent).openPopup();
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

        let iconTarget = L.divIcon({
            html: `<svg class="stroke-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                    <path d="M5.6452 5.59636L5.6437 5.59758L5.64227 5.59896L5.6452 5.59636ZM12.2813 5.472C12.2349 5.4273 12.1834 5.38819 12.1279 5.35546C12.0494 5.30924 11.9622 5.27961 11.8718 5.26842C11.7813 5.25723 11.6895 5.26471 11.6021 5.2904C11.5147 5.31609 11.4334 5.35944 11.3634 5.41778C11.2934 5.47611 11.2361 5.54819 11.195 5.62956C10.9654 6.08202 10.6486 6.48468 10.263 6.81445C10.322 6.48218 10.3517 6.14539 10.3519 5.80793C10.3531 4.78134 10.0823 3.77274 9.56697 2.88484C9.05166 1.99695 8.31027 1.26146 7.41827 0.753268C7.32001 0.697566 7.20921 0.667741 7.09627 0.666592C6.98332 0.665442 6.87193 0.693006 6.77256 0.746696C6.67318 0.800386 6.58908 0.878443 6.52813 0.973542C6.46719 1.06864 6.4314 1.17766 6.42413 1.29038C6.38683 1.9225 6.22158 2.54046 5.93839 3.10683C5.65521 3.67319 5.25999 4.17617 4.77669 4.58529L4.62304 4.71029C4.11765 5.05035 3.6703 5.46956 3.29817 5.95182C2.71972 6.68056 2.319 7.53405 2.12781 8.44461C1.93662 9.35517 1.96021 10.2977 2.1967 11.1976C2.4332 12.0975 2.8761 12.9298 3.49029 13.6287C4.10447 14.3276 4.87304 14.8738 5.73505 15.224C5.83626 15.2653 5.94609 15.2811 6.05486 15.27C6.16363 15.2589 6.26799 15.2212 6.35874 15.1602C6.44948 15.0992 6.52382 15.0168 6.5752 14.9203C6.62658 14.8238 6.65342 14.7161 6.65335 14.6068C6.65288 14.5361 6.64168 14.4658 6.62015 14.3984C6.471 13.8378 6.42805 13.2542 6.49352 12.6777C7.12435 13.8675 8.13695 14.8107 9.36852 15.3555C9.51885 15.4227 9.68879 15.4318 9.84541 15.3809C10.8185 15.0668 11.695 14.5092 12.3918 13.7609C13.0887 13.0126 13.5826 12.0986 13.8267 11.1057C14.0707 10.1128 14.0569 9.07399 13.7864 8.08795C13.5159 7.10191 12.9978 6.2014 12.2813 5.472ZM9.67808 14.026C9.09696 13.7315 8.58433 13.318 8.17352 12.8124C7.76271 12.3067 7.46292 11.7203 7.29364 11.0911C7.24194 10.8793 7.20195 10.6648 7.17385 10.4486C7.15481 10.3109 7.09321 10.1826 6.99766 10.0816C6.90212 9.98062 6.77741 9.91203 6.64097 9.88542C6.59894 9.87713 6.5562 9.87299 6.51335 9.87305C6.39618 9.87301 6.28107 9.90386 6.17963 9.9625C6.07818 10.0211 5.994 10.1055 5.93555 10.207C5.3824 11.1611 5.10422 12.2497 5.13184 13.3522C4.64533 12.974 4.23874 12.5029 3.93563 11.9664C3.63251 11.4298 3.4389 10.8384 3.36602 10.2265C3.29314 9.61456 3.34244 8.99425 3.51106 8.40151C3.67967 7.80878 3.96426 7.2554 4.34831 6.77346C4.63992 6.39468 4.99171 6.06632 5.38965 5.80146C5.40688 5.79033 5.4234 5.77816 5.43913 5.76499C5.43913 5.76499 5.63692 5.60134 5.64368 5.5976C6.59348 4.79424 7.26902 3.7146 7.57617 2.50914C8.30255 3.18062 8.7869 4.07315 8.95401 5.04814C9.12112 6.02313 8.96164 7.02601 8.50033 7.90106C8.43938 8.01783 8.41438 8.15003 8.42848 8.28099C8.44257 8.41195 8.49514 8.5358 8.57954 8.63692C8.66395 8.73804 8.77641 8.8119 8.90274 8.84918C9.02907 8.88646 9.16361 8.88549 9.28939 8.8464C10.3106 8.52629 11.2092 7.90101 11.8643 7.05473C12.258 7.63626 12.5154 8.29914 12.6173 8.99397C12.7192 9.6888 12.663 10.3977 12.4528 11.0678C12.2427 11.7378 11.884 12.3519 11.4036 12.8641C10.9232 13.3763 10.3333 13.7735 9.67806 14.0261L9.67808 14.026Z" fill="white"/>
                    </svg>`,
            iconSize: [5, 5], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [10, 12], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [0, -20] // point from which the popup should open relative to the iconAnchor
        });
        let targetPoint = [parseFloat('{{ $report->latitude }}'), parseFloat('{{ $report->longitude }}')];
        let circleTarget = L.circle(targetPoint, {
            color: '#E35D6A',
            fillColor: '#DC3545',
            fillOpacity: 1,
            radius: 400
        }).addTo(map);
        let markerTarget = L.marker(targetPoint, {
            icon: iconTarget
        }).addTo(map);
        markerTarget.setOpacity(0);
        let routes = L.Routing.control({
            waypoints: [
                L.latLng(0, 0),
                L.latLng(0, 0)
            ],
            createMarker: function() {},
        }).addTo(map);
        const createRoute = (lat, lng, messsage = 'Lokasi Kebakaran') => {
            markerTarget.setLatLng([lat, lng]);
            circleTarget.setLatLng([lat, lng]);
            markerTarget.setOpacity(1);
            markerTarget.bindPopup(
                `<span class="p-2 rounded-lg text-xs font-semibold bg-red-100 border border-red-500 text-red-500">${messsage}</span>`
            ).openPopup();
            let latLngTarget = L.latLng(lat, lng);
            let currentDamkarLatLng = L.latLng(marker.getLatLng().lat, marker.getLatLng().lng);
            let waypoint = [currentDamkarLatLng, latLngTarget];
            routes.setWaypoints(waypoint);
            // Inisialisasi peta Leaflet dan routing machine

            // Tambahkan event listener untuk mendapatkan data rute saat rute ditemukan
            routes.on('routesfound', function(e) {
                var routeStep = e.routes[0];
                console.log(routeStep);
                let jarak = routeStep.summary.totalDistance;
                let estimasiWaktu = routeStep.summary.totalTime;
                $("#jarak").html(`&nbsp;${Math.round(jarak/1000)} KM`);
                $("#estimasiWaktu").html(`&nbsp;${Math.round(estimasiWaktu/60)} Menit`);
                // routeStep.instructions.forEach((val, index) => {
                //     let time = (val.time / 60);
                //     let distance = (val.distance / 1000);
                //     let text;
                //     switch (val.modifier) {
                //         case "Straight":
                //             text = `Lurus terus ke jalan <span class=''>${val.road}</span>`;
                //             break;
                //         case "Right":
                //             text = `Belok kanan ke jalan <span class=''>${val.road}</span>`;
                //             break;
                //         case "Left":
                //             text = `Belok kiri ke jalan <span class=''>${val.road}</span>`;
                //             break;
                //         default:
                //             text = `Lurus terus ke jalan <span class=''>${val.road}</span>`;
                //             break;
                //     }
                //     let template = `<li>
            //                         <div class="flex">
            //                         <div class="flex-shrink-0">
            //                             <div class="text-xs flex items-center justify-center h-6 w-6 rounded-full bg-[#FE5D26] text-white">
            //                             ${index+1}
            //                             </div>
            //                         </div>
            //                         <div class="ml-4">
            //                             <p class="text-sm font-semibold text-gray-500">${text}</p>
            //                             <div class="flex mt-1">
            //                                 <p class="px-2 py-1 bg-blue-500 rounded-md text-white font-bold text-xs mr-2">${(distance) < 1 ? Math.floor(val.distance)+" Meter" : Math.floor(distance)+" KM"}</p>
            //                                 <p class="px-2 py-1 bg-green-500 rounded-md text-white font-bold text-xs">${time < 1 ? Math.floor(val.time)+" Detik" : Math.floor(time)+" Menit"}</p>
            //                             </div>
            //                         </div>
            //                         </div>
            //                     </li>`;
                //     $("#directons").append(template);
                // });
            });

        }
        createRoute(targetPoint[0], targetPoint[1]);

        // const sendMessage = () => {
        //     let message = $("#inputChat").val();
        //     $.ajax(`{{ route('fireman.send.message', $report->id) }}`, {
        //         type: 'POST',
        //         data: {
        //             message
        //         },
        //         success: function(data) {
        //             console.log(data);
        //             $("#inputChat").val("");
        //             getMessages();
        //         },
        //         error: function(jqXhr, textStatus, errorMessage) {
        //             console.log(errorMessage);
        //         }
        //     });
        // }

        // const getMessages = async () => {
        //     let errorBanner =
        //         `<p id="errorBanner" style="display:none" class="text-center rounded text-xs bg-slate-500 text-white p-1">pesan kosong</p>`
        //     await fetch(`{{ route('fireman.get.message', $report->id) }}`)
        //         .then(res => res.json())
        //         .then(json => {
        //             let data = json.data;
        //             console.log(data);
        //             let messages = "";
        //             if (data.length < 1) {
        //                 $("#kolomChat").html(errorBanner);
        //                 $("#errorBanner").slideDown(0);
        //             } else {
        //                 data.forEach(val => {
        //                     messages += templateMessage(val);
        //                 })
        //                 $("#kolomChat").html(messages);
        //                 const element = document.getElementById("messageBox")
        //                 element.scrollTop = element.scrollHeight;
        //             }
        //         })
        // }
        // const templateMessage = (data) => {
        //     if(data.user_id == '{{ Auth::user()->id }}') {
        //         return `<div class="">
    //                     <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
    //                         <div class="py-1 flex mx-1 justify-end items-center">
    //                             <p class="font-bold text-xs text-yellow-900 mx-2 font-bold">{{ $report->fireman->name }}</p>
    //                             <img src="{{ asset('icons/fireman.png') }}" class=" w-[30px]" alt="">
    //                         </div>
    //                         <div class="mx-2 text-right font-bold">
    //                             <p class="text-xs font-bold">${data.message}</p>
    //                         </div>
    //                     </div>
    //                 </div>`
        //     } else {
        //         return `<div class="">
    //                     <div class="mx-4 mb-2 p-2 rounded border-2 border-gray-200 shadow-lg">
    //                         <div class="py-1 flex mx-1 justify-start items-center">
    //                             <img src="{{ url('/') }}/icons/${data.user.gender == 'pria' ? 'male' : 'female'}.png" class=" w-[30px]" alt="">
    //                             <p class="font-bold text-xs text-yellow-900 font-bold">${data.user.name}</p>
    //                         </div>
    //                         <div class="mx-2 text-left font-bold">
    //                             <p class="text-xs font-bold">${data.message}</p>
    //                         </div>
    //                     </div>
    //                 </div>`
        //     }
        // }

        // getMessages();
        // @if ($report->report_status == 'pending' || $report->report_status == 'diproses')
        // const getMessageInterval = (time) => {
        //         setInterval(() => {
        //             getMessages();
        //         }, time);
        //     }
        //     getMessageInterval(3000);
        // @endif

        const actionReport = (status) => {
            let words = ''
            if (status == "ditolak") {
                words = "menolak"
            } else if (status == "diproses") {
                words = "menerima"
            } else if (status == "dibatalkan") {
                words = "membatalkan"
            } else {
                words = "menyelesaikan"
            }
            // let confirmation = confirm(`Apakah Anda ingin ${words} laporan ini? `);
            // if (confirmation) {
            // }
            $.ajax(`{{ route('user.update.report', [$report->id, '/']) }}/${status}`, {
                type: 'PUT',
                data: {},
                success: function(data) {
                    $('#exampleModalSm').hide(500);
                    $.Toast("Pesan", `Berhasil ${words} laporan`,
                        "success");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    console.log(errorMessage);
                }
            });
        }
    </script>
@endsection
