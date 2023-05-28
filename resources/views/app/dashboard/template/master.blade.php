@extends('template.mobile')
@section('title')
    @yield('dashboard_title')
@endsection
@section('css')
    @yield('dashboard_css')
@endsection
@section('content')
    <div class="min-h-[100vh] relative">
        <div class="border-b-2 font-poppins shadow relative w-full text-center py-4 bg-slate-700 text-slate-50">
            @yield("back")
            <span class="font-bold text-2xl">Geo Fireman Report</span>
        </div>
        <div class="p-4 font-poppins">
            @yield('dashboard_content')
        </div>
        @if (Auth::user()->isFireman())
            @if (!Auth::user()->isNullLatLong())
                @include('app.dashboard.components.bottom-navbar-fireman')
            @endif
        @else
            @include('app.dashboard.components.bottom-navbar-user')    
        @endif
    </div>
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
    </script>
    @yield('dashboard_js')
@endsection