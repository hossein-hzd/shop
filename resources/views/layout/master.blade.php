@include('layout.header')

@yield('link')
@yield('sidbar')
{{-- @include('home.profile.sidbar') --}}
@yield('content')

@yield('script')
@include('layout.footer')
