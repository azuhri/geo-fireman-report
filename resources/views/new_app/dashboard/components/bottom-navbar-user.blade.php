<div class="w-full fixed z-[1000] left-0 bottom-0 flex justify-center">
    <div class="w-[600px] md:w-[500px] flex justify-around py-2 bg-slate-50 border-t-2 w-full">
        <a href="{{route('user.home')}}" class="{{url()->current() == route('user.home') ? "text-yellow-500 font-bold" : ""}} font-poppins hover:text-yellow-500 hover:font-bold flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        <p class="text-xs mt-1">Beranda</p>
        </a>
        <a href="{{route('user.report')}}" class="{{url()->current() == route('user.report') ? "text-yellow-500 font-bold" : ""}} font-poppins hover:text-yellow-500 flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
        <p class="text-xs mt-1">Laporan</p>
        </a>
        <a href="{{route('notif.view')}}" class="relative {{url()->current() == route('notif.view') ? "text-yellow-500 font-bold" : ""}} font-poppins hover:text-yellow-500 flex flex-col justify-center items-center">
            <p id="counterNotif" class="text-xl font-bold text-red-500 absolute right-3 bottom-7 {{count(getNotifNotReaded()) > 0 ? '' : 'hidden'}}">{{count(getNotifNotReaded())}}</p>
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        <p class="text-xs mt-1">Notifikasi</p>
        </a>
        <a href="{{route('user.profile')}}" class="{{url()->current() == route('user.profile') ? "text-yellow-500 font-bold" : ""}} font-poppins hover:text-yellow-500 flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        <p class="text-xs mt-1">Profil</p>
        </a>
    </div>
</div>