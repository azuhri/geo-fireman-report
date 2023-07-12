<div id="bottomNavbar" class="w-full flex fixed z-[1000] left-0 bottom-0 flex justify-center">
    <div class="w-[600px] md:w-[500px] flex justify-around py-2 bg-slate-50 border-t-2">
        <a href="{{route('user.home')}}" class="{{url()->current() == route('user.home') ? "text-[#FE5D26] font-bold" : "text-gray-400"}} font-poppins hover:text-[#FE5D26] hover:font-bold flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        <p class="text-xs mt-1">Beranda</p>
        </a>
        <a href="{{route('user.report.view')}}" class="{{url()->current() == route('user.report.view') ? "text-[#FE5D26] font-bold" : "text-gray-400"}}  font-poppins hover:text-[#FE5D26] flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        <p class="text-xs mt-1">Laporan</p>
        </a>
        <a href="{{route('user.history')}}" class="{{url()->current() == route('user.history') ? "text-[#FE5D26] font-bold" : "text-gray-400"}}  font-poppins hover:text-[#FE5D26] flex flex-col justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="0.5" width="20" height="20" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" >
                <path d="M17 3.3C13.1 1.1 8.3 1.8 5.1 4.8V3C5.1 2.4 4.7 2 4.1 2C3.5 2 3.1 2.4 3.1 3V7.5C3.1 8.1 3.5 8.5 4.1 8.5H8.6C9.2 8.5 9.6 8.1 9.6 7.5C9.6 6.9 9.2 6.5 8.6 6.5H6.2C7.7 4.9 9.8 4 12 4C16.4 4 20 7.6 20 12C20 16.4 16.4 20 12 20C7.6 20 4 16.4 4 12C4 11.4 3.6 11 3 11C2.4 11 2 11.4 2 12C2 17.5 6.5 22 12 22C15.6 22 18.9 20.1 20.7 17C23.4 12.2 21.8 6.1 17 3.3ZM12 8C11.4 8 11 8.4 11 9V12C11 12.6 11.4 13 12 13H14C14.6 13 15 12.6 15 12C15 11.4 14.6 11 14 11H13V9C13 8.4 12.6 8 12 8Z" fill="#BFC0C1"/>
                </svg>
        <p class="text-xs mt-1">Riwayat</p>
        </a>
        <a href="{{route('notif.view')}}" class="relative {{url()->current() == route('notif.view') ? "text-[#FE5D26] font-bold" : "text-gray-400"}} font-poppins hover:text-[#FE5D26] flex flex-col justify-center items-center">
            <p id="counterNotif" class="text-xl font-bold text-red-500 absolute right-3 bottom-7 {{count(getNotifNotReaded()) > 0 ? '' : 'hidden'}}">{{count(getNotifNotReaded())}}</p>
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
        <p class="text-xs mt-1">Notifikasi</p>
        </a>
        <a href="{{route('user.profile')}}" class="{{url()->current() == route('user.profile') ? "text-[#FE5D26] font-bold" : "text-gray-400"}} font-poppins hover:text-[#FE5D26] flex flex-col justify-center items-center">
            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        <p class="text-xs mt-1">Profil</p>
        </a>
    </div>
</div>