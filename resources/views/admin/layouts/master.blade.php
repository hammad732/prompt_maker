<!DOCTYPE html>
<html lang="en">
{{-- head --}}
@include('admin.layouts.master.head')
{{-- body --}}
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @yield('style')
        {{-- header --}}
        @include('admin.layouts.master.header')
        @include('home')
        {{-- sidebar --}}
        @include('admin.layouts.master.sidebar') 
        {{-- main --}}
        
        {{-- footer --}}
        @include('admin.layouts.master.footer')
         @yield('script')
    </div>
    <!-- ./wrapper -->
</body>
</html>