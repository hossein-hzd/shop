@extends('layout.master')
@section('title','contactpage')
@section('link')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
@endsection
@php
   $about=App\Models\About::all()->last();
//    dd($about);
//    $about=$abouti[count($abouti)-1];

@endphp
@section('content')
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
@endsection
