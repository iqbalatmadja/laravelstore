<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.header') 
    <body class="@yield('bodyClass')">
        @yield('top_scripts')
        @include('partials.nav') 
        @yield('content')    
        <script src="{{ asset('library/bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}" ></script>
        @yield('bottom_scripts') 
    </body>
</html>

