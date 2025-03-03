<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webprog @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin="" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>


</head>
<header  class="bg-black header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
                <span>
                    webprog.io
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{request()->is('h')? 'active':''}}">
                    <a class="nav-link" href="{{route('home.index')}}">صفحه اصلی</a>
                </li>
                <li class="nav-item {{request()->is('product/menu')? 'active':''}}">
                    <a class="nav-link" href="{{route('product.menu')}}">منو</a>
                </li>
                <li class="nav-item {{request()->is('aboutpage')? 'active':''}}">
                    <a class="nav-link" href="{{route('about.page')}}">درباره ما</a>
                </li>
                <li class="nav-item {{request()->is('contactpage')? 'active':''}} ">
                    <a class="nav-link" href="{{route('contact.page')}}">تماس باما</a>
                </li>
            </ul>
           <div class="user_option">
                    @auth

                       <a class="cart_link position-relative" href="{{route('cart.index')}}">
                        <i class="bi bi-cart-fill text-white fs-5"></i>
                        <span class="position-absolute top-0 translate-middle badge rounded-pill">
                            @php
                                $x = session()->get('cart');//
                            @endphp
                            {{isset($x)?count($x):'0';}}

                        </span>
                    </a>

                    @endauth

                    @guest

                    <a href="{{route('login.index')}}" class="btn-auth">
                        ورود
                    </a>
                    @endguest
                    @auth
                    <a href="{{route('profile.index')}}" class="btn-auth">
                        پروفایل
                    </a>
                     <a style="color:black" href="#" class="btn-auth">

                   {{Illuminate\Support\Facades\Auth::user()->name}}

                    </a>
                        <a class="btn-logout" href="{{route('logout')}}">خروج</a>
                    @endauth
                </div>
        </nav>
    </div>
</header>
{{-- @include('profile.layout.sidbar') --}}

