@php
   $products=App\Models\Product::all();
   $bergers=$products->where('category_id','==',1)->take(3);
   $pizas=$products->where('category_id','==',2)->take(3);
   $salads=$products->where('category_id','==',3)->take(3);
    //   dd($bergers);
@endphp

<section class="food_section layout_padding-bottom">
    <div class="container" x-data="{ tab: 1 }">
        <div class="heading_container heading_center">
            <h2>
                منو محصولات
            </h2>
        </div>

        <ul class="filters_menu">
            <li :class="tab === 1 ? 'active' : ''" @click="tab = 1">برگر</li>
            <li :class="tab === 2 ? 'active' : ''" @click="tab = 2">پیتزا</li>
            <li :class="tab === 3 ? 'active' : ''" @click="tab = 3">پیش غذا و سالاد</li>
        </ul>

        <div class="filters-content">
            <div x-show="tab === 1">
                <div class="row grid">
                    @foreach ($bergers as $berger )
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{asset("images/products/".$berger->image)}}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{$berger->name}}
                                    </h5>
                                    <p>
                                            {{$berger->desc}}
                                        </p>
                                        {{-- {{dd($berger->is_sale)}} --}}
                                    @if ($berger->is_sale)
                                    <div class="options">
                                        <h6>
                                            <del> {{$berger->price}}</del>
                                            <span>
                                                <span class="text-danger">{{percent($berger->price,$berger->sale_price)}}</span>
                                                {{$berger->sale_price}}
                                                <span>تومان</span>
                                            </span>
                                        </h6>
                                        <div class="d-flex">
                                            <a class="me-2" href="">
                                                <i class="bi bi-cart-fill text-white fs-6"></i>
                                            </a>
                                            <a href="#">
                                                <i class="bi bi-heart-fill  text-white fs-6"></i>
                                            </a>
                                        </div>
                                    </div>

                                    @else
                                    <span>
                                        {{$berger->price}}
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

            <div x-show="tab === 2">
                <div class="row grid">
                    @foreach ($pizas as $piza )
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{asset("images/products/".$piza->image)}}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{$piza->name}}
                                    </h5>
                                    <p>
                                            {{$piza->desc}}
                                        </p>
                                        {{-- {{dd($berger->is_sale)}} --}}
                                    @if ($piza->is_sale)
                                    <div class="options">
                                        <h6>
                                            <del> {{$piza->price}}</del>
                                            <span>
                                                <span class="text-danger">{{percent($piza->price,$piza->sale_price)}}</span>
                                                {{$piza->sale_price}}
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
                                        {{$piza->price}}
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

            <div x-show="tab === 3">
                <div class="row grid">
                    @foreach ($salads as $salad )
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{asset("images/products/".$salad->image)}}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{$salad->name}}
                                    </h5>
                                    <p>
                                            {{$salad->desc}}
                                        </p>
                                        {{-- {{dd($berger->is_sale)}} --}}
                                    @if ($salad->is_sale)
                                    <div class="options">
                                        <h6>
                                            <del> {{$salad->price}}</del>
                                            <span>
                                                <span class="text-danger">{{percent($salad->price,$salad->sale_price)}}</span>
                                                {{$salad->sale_price}}
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
                                        {{$salad->price}}
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

        </div>

        <div class="btn-box">
            <a href="">
                مشاهده بیشتر
            </a>
        </div>
    </div>
</section>
