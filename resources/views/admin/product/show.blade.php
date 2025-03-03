@extends('adminlayout.master')
@section('title', 'Product Create')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">نمایش محصول</h4>
    </div>

    <div class="row gy-4 mb-5">

        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="row col-md-4 justify-content-center">

                    <img src="{{ asset('images/products/' . $product->image) }}" class="rounded" width=350 height=220 alt="primary-image">
                   <div class="m-1 box-sizing:none"><h1>تصویر اصلی</h1></div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">نام</label>
            <input disabled type="text" value="{{ $product->name }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">دسته بندی</label>
            <input disabled type="text" value="{{ $product->category->title }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <input disabled type="text" value="{{ $product->status ? 'فعال' : 'غیر فعال' }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت</label>
            <input disabled type="text" value="{{ number_format($product->price) }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">تعداد</label>
            <input disabled type="text" value="{{ $product->number }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label class="form-label">قیمت حراجی</label>
            <input disabled type="number" value="{{ number_format($product->sale_price) }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label data-jdp class="form-label">تاریخ شروع حراجی</label>
            <input disabled type="text" value="{{ $product->date_on_sale_from != null ?verta($product->date_on_sale_from): '' }}" class="form-control" />
        </div>

        <div class="col-md-3">
            <label data-jdp class="form-label">تاریخ پایان حراجی</label>
            <input disabled type="text" value="{{ $product->date_on_sale_to != null ? verta($product->date_on_sale_from) : '' }}" class="form-control" />
        </div>

        <div class="col-md-12">
            <label class="form-label">توضیحات</label>
            <textarea disabled rows="5" class="form-control">{{ $product->desc }}</textarea>
        </div>

        <div class="col-md-12 ">
            @php
               $st=$product->images;
               $lis=explode(",",$st);
               $k=1;
               @endphp
            @foreach ($lis as $image)
                <label class="form-label">تصویر شماره{{$k++}}</label>
                <img class="rounded m-5" width="200" height="250" src="{{ asset('/images/products/' . $image) }}" alt="images">
            @endforeach
        </div>
    </div>
</main>
    <script>jalaliDatepicker.startWatch({time:true});</script>
@endsection
