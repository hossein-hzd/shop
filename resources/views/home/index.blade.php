{{-- @extends('layout.master') --}}
@section('title','homepage')
{{-- @section('content') --}}
<body>
   


    <div class="{{request()->is('h')? '':'sub_page'}}">
        <div class="hero_area">
            <div class="bg-box">
                <img src="{{asset('images/hero-bg.jpg')}}" alt="">
            </div>
            <!-- header section strats -->
         @include('layout.header')
            <!-- end header section -->
            <!-- slider section -->
            @include('home.slider')
             <!-- end slider section -->
        </div>
    </div>
  @include('home.feature')


    <!-- food section -->
    @include('home.menu')
    <!-- end food section -->

    <!-- about section -->

@php
   $about=App\Models\About::all()->last();
@endphp
<section class="about_section layout_padding">
    <div class="container">

        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="images/about-img.png" alt="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                           {{ isset($about->title)?$about->title:''}}
                         </h2>
                        </div>
                        <p>
                        {{ isset($about->descript)?$about->descript:''}}

                        </p>
                    <a href="{{ isset($about->link)?$about->link:''}}">
                        مشاهده بیشتر
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- end about section -->

    <!-- contact section -->
    {{-- @extends('layout.master') --}}
@section('title','contactpage')
{{-- @section('link') --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
{{-- @endsection --}}

{{-- @section('script') --}}
    <script>
        var map = L.map('map').setView([35.700105, 51.400394], 14);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);
        var marker = L.marker([35.700105, 51.400394]).addTo(map)
            .bindPopup('<b>webprog.io</b>').openPopup();
    </script>
{{-- @endsection --}}
{{-- @section('content') --}}

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                تماس با ما
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
                    <form action="{{route('contact.store')}}" method="post" >
                        @csrf
                        <div>
                            <input name="name" type="text" class="form-control" placeholder="نام و نام خانوادگی" />
                        </div>
                        <div>
                            <input name="email" type="text" class="form-control" placeholder="ایمیل" />
                        </div>
                        <div>
                            <input name="object" type="text" class="form-control" placeholder="موضوع پیام" />
                        </div>
                        <div>
                            <textarea name="body" rows="10" style="height: 100px" class="form-control"
                                placeholder="متن پیام"></textarea>
                        </div>
                        <div class="btn_box">
                            <button>
                                ارسال پیام
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div id="map" style="height: 345px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layout.footer')
{{-- @endsection --}}

    <!-- end contact section -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script>
        var map = L.map('map').setView([35.700105, 51.400394], 14);
        var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);
        var marker = L.marker([35.700105, 51.400394]).addTo(map)
            .bindPopup('<b>webprog</b>').openPopup();
    </script>

{{-- @endsection --}}
