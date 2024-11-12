@extends('layout.master')
@section('title','homepage')
@section('content')
<body>

    <div class="{{request()->is('h')? '':'sub_page'}}">
        <div class="hero_area">
            <div class="bg-box">
                <img src="{{asset('images/hero-bg.jpg')}}" alt="">
            </div>
            <!-- header section strats -->
            <header class="header_section">
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
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('home.index')}}">صفحه اصلی</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="menu.html">منو</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">درباره ما</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">تماس باما</a>
                                </li>
                            </ul>
                            <div class="user_option">
                                <a class="cart_link position-relative" href="cart.html">
                                    <i class="bi bi-cart-fill text-white fs-5"></i>
                                    <span class="position-absolute top-0 translate-middle badge rounded-pill">
                                        3
                                    </span>
                                </a>
                                <a href="login.html" class="btn-auth">
                                    ورود
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!-- end header section -->
            <!-- slider section -->
            @include('home.slider')
             <!-- end slider section -->
        </div>
    </div>
  @include('home.feature')
 

    <!-- food section -->
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
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="{{asset('images/b1.jpg')}}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            برگر مخصوص
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                <del>95,000</del>
                                                <span>
                                                    <span class="text-danger">(16%)</span>
                                                    80,000
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/b2.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            چیز برگر
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                110,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/b3.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            رویال برگر
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                121,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 2">
                    <div class="row grid">
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/p1.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            پیتزا مخصوص 1 نفره
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                200,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/p2.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            پیتزا مخصوص خانواده
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                <del>450,000</del>
                                                <span>
                                                    <span class="text-danger">(20%)</span>
                                                    360,000
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/p3.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            پیتزا سرآشپز
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                300,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 3">
                    <div class="row grid">
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/s1.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            سالاد فصل
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                34,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/s2.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            سالاد کلم
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                44,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="box">
                                <div>
                                    <div class="img-box">
                                        <img class="img-fluid" src="./images/s3.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h5>
                                            سالاد سزار
                                        </h5>
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان
                                            گرافیک است.
                                        </p>
                                        <div class="options">
                                            <h6>
                                                144,000
                                                <span>تومان</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <!-- end food section -->

    <!-- about section -->
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
                                لورم ایپسوم متن
                            </h2>
                        </div>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در
                            شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                            شناخت
                        </p>
                        <a href="">
                            مشاهده بیشتر
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- contact section -->
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
                        <form action="">
                            <div>
                                <input type="text" class="form-control" placeholder="نام و نام خانوادگی" />
                            </div>
                            <div>
                                <input type="email" class="form-control" placeholder="ایمیل" />
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="موضوع پیام" />
                            </div>
                            <div>
                                <textarea rows="10" style="height: 100px" class="form-control"
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

@endsection
