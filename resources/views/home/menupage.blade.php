{{-- @php
    $products=App\Models\Product::all();
@endphp --}}
@extends('layout.master')
{{-- @section('title','contactpage') --}}
@section('content')
<script type="text/javascript">
    // document.addEventListener('alpine:init', () => {
    //     Alpine.data('filter', () => ({
    //         search: '',
    //         currentUrl: '{{ url()->current() }}',
    //         params: new URLSearchParams(),

    //         filter(type, value) {
    //             this.params.set(type, value);
    //             document.location.href = this.currentUrl + '?' + this.params.toString();
    //         }
    //     }))
    // });
</script>
{{-- ///////// --}}
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

<script >
function ser(x){
    var ja = document.getElementById("search").value;
//    console.log(typeof x=='number');
   var y;
   var c;
   typeof x=='number'?c=x:y=x;
//


    // document.location.href='{{ url()->current() }}'+'?'+'search='+ja+'&category='+c+'&sortby='+y;
    document.location.href='{{ url()->current() }}'+'?'+'search='+ja;
    // document.location.href=document.location.href+'category='+c+'&sortby='+y;

}
function sers(c){
    document.location.href='{{ url()->current() }}'+'?'+'category='+c;
}
function serm(c){
    document.location.href='{{ url()->current() }}'+'?'+'sortby='+c;
}


</script>
<section class="food_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
                <div>
                    <label class="form-label">جستجو</label>
                    <div class="input-group mb-3">
                        <input name="search" value='{{old('search')}}' id="search" type="text" class="form-control" placeholder="نام محصول ..." />
                        <button onclick="ser()" class="input-group-text">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                <hr />
                <div class="filter-list">
                    <div class="form-label">
                        دسته بندی
                    </div>
                    <ul>
                        @foreach ($categories as $category )

                        <li onclick="sers({{$category->id}})" class="my-2 cursor-pointer filter-list-{{request()->has('category')&& request()->category==$category->id? 'active':''}}">{{$category->title}}</li>

                        @endforeach
                    </ul>
                </div>
                <hr />
                <div>
                    <label class="form-label">مرتب سازی</label>
                    <div class="form-check my-2">
                        <input onchange="serm('b')" {{request()->sortby=='b'? 'checked':''}} id="b" class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            بیشترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input onchange="serm('k')" {{request()->sortby=='k'? 'checked':''}} id="k" class="form-check-input" type="radio" name="flexRadioDefault"  />
                        <label class="form-check-label cursor-pointer">
                            کمترین قیمت
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input onchange="serm('p')" {{request()->sortby=='p'? 'checked':''}} id="p" class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            پرفروش ترین
                        </label>
                    </div>
                    <div class="form-check my-2">
                        <input onchange="serm('t')" {{request()->sortby=='t'? 'checked':''}} id="t" class="form-check-input" type="radio" name="flexRadioDefault" />
                        <label class="form-check-label cursor-pointer">
                            با تخفیف
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-9">
                <div class="row gx-3">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-4">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img class="img-fluid" src="{{asset("images/products/".$product->image)}}" alt="" />
                                </div>
                                <div class="detail-box">
                                <a href="{{route('single.page',[$product->id])}}">
                                      <h5>
                                        {{$product->name}}
                                      </h5>
                                </a>
                                    <p>
                                        {{$product->desc}}
                                    </p>
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
                                            <a class="me-2" href="{{route('cart.add',[$product->id])}}">
                                                <i class="bi bi-cart-fill text-white fs-6"></i>
                                            </a>
                                            <a href="{{route('wish.store',[$product->id])}}">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{$products->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
