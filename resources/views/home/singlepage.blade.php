@extends('layout.master')
@section('title','siglepage')
@section('link')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
@endsection

@section('content')
<section class="single_page_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row gy-5">
                    <div class="col-sm-12 col-lg-6">
                        <h3 class="fw-bold mb-4">{{$product->name}} </h3>
                        @if ($product->is_sale)
                        <div class="options">
                            <h6>
                                <del> {{$product->price}}</del>
                                <span>
                                    <span class="text-danger">{{percent($product->price,$product->sale_price)}}</span>
                                    {{$product->sale_price}}
                                    <span>تومان</span>
                                </span>
                            </h6>
                            <div class="d-flex">
                                <a class="me-2" href="">
                                    <i class="bi bi-cart-fill text-white fs-6"></i>
                                </a>
                                <a href="">
                                    <i class="bi bi-heart-fill  text-white fs-6"></i>
                                </a>
                            </div>
                        </div>

                        @else
                        <span>
                            {{$product->price}}
                            <span>تومان</span>
                        </span>
                        @endif
                        <p>{{$product->desc}}</p>

                        <form x-data="{ quantity :1 }" action="{{route('cart.increment',[$product->id])}}" method="POST" class="mt-5 d-flex">
                           @csrf
                               @method('POST')
                            <div class="input-counter ms-4">
                                <span @click="quantity<{{$product->number}}&& quantity++ " class="plus-btn">
                                    +
                                </span>
                                <div class="input-number" x-text="quantity"></div>
                                <span @click="quantity > 1 && quantity--" class="minus-btn">
                                    -
                                </span>
                                <input name="title" type="text" :value="quantity"  hidden class="form-control" />
                                <button  class="btn-add">افزودن به سبد خرید</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">

                                    @php
                                        $lis=explode(',',$product->images);

                                    @endphp
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="0" class="active" ></button>
                                    @foreach ($lis as $d=>$li )
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="{{$d+1}}" ></button>

                                    @endforeach

                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active h-100" style="height:10cm">
                                    <img src="{{asset("images/products/".$product->image)}}" class="d-block w-100"  />
                                </div>
                                @foreach ( $lis as $li )
                                <div  class="carousel-item " style="height:10cm">
                                    <img src="{{asset("images/products/".$li)}}" class="d-block w-100 " />
                                </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                @php
                $s=App\Models\Product::all()->count();
                $s>4?$ps=App\Models\Product::all()->random(4):$ps=App\Models\Product::all()->random($s);
             @endphp
            <section class="food_section my-5">
                <div class="container">
                    <div class="row gx-3">
                        @foreach ($ps as $p)
                        <div class="col-sm-6 col-lg-3">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{asset("images/products/".$p->image)}}" alt="" />
                                    </div>
                                    <div class="detail-box">
                                    <a href="{{route('single.page',[$p->id])}}">
                                          <h5>
                                            {{$p->name}}
                                          </h5>
                                    </a>
                                        <p>
                                            {{$p->desc}}
                                        </p>
                                        @if ($p->is_sale)
                                        <div class="options">
                                            <h6>
                                                <del> {{$p->price}}</del>
                                                <span>
                                                    <span class="text-danger">{{percent($p->price,$p->sale_price)}}</span>
                                                    {{$p->sale_price}}
                                                    <span>تومان</span>
                                                </span>
                                            </h6>
                                            <div class="d-flex">
                                                <a class="me-2" href="">
                                                    <i class="bi bi-cart-fill text-white fs-6"></i>
                                                </a>
                                                <a href="">
                                                    <i class="bi bi-heart-fill  text-white fs-6"></i>
                                                </a>
                                            </div>
                                        </div>

                                        @else
                                        <span>
                                            {{$p->price}}
                                            <span>تومان</span>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
@endsection
