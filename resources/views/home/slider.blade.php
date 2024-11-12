<section class="slider_section">
    <div id="customCarousel1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($sliders as $slider )
            <div class="carousel-item {{$loop->first? 'active':''}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-lg-6">
                            <div class="detail-box">



                                <h2 class="mb-3 fw-bold">
                                    {{$slider->title}}
                                </h2>
                                <p>
                                      {{$slider->body}}
                                </p>
                                <div class="btn-box">
                                    <a href="{{$slider->link_address}}" class="btn1">
                                        {{$slider->link_title}}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="container">
            <ol class="carousel-indicators">
                @php
                    $k=0
                @endphp
                @foreach ($sliders as $slider )


                <li data-bs-target="#customCarousel1" data-bs-slide-to="{{$k}}" class="{{$loop->first? 'active':''}}"></li>
                @php
                    $k=$k+1;
                @endphp
                @endforeach

            </ol>
        </div>
    </div>

</section>

