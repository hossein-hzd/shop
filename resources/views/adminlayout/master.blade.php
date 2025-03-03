@include('adminlayout.header')

<div class="container-fluid">
    <div class="row">

        @include('adminlayout.sidebar')

@yield('content')
@yield('script')

@include('adminlayout.footer')

