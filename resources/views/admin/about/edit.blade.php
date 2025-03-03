@extends('adminlayout.master')
@section('title', 'about edit')

@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">داشبورد</h4>
    </div>

    {{-- <div id="chartdiv"></div> --}}


{{-- <form class="row gy-4" action="{{route('category.store')}}" method='post'> --}}
<form class="row gy-4" action="{{route('about.update',[$id])}}" method='post'>
@csrf
@method('put')
<div class="col-md-6">
    <label class="form-label" for="title">عنوان</label>
    <input name="title" id="title" value='{{old('title')}}' type="text" class="form-control" />
    <div class="form-text text-danger ">@error('title'){{$message}}@enderror</div>
</div>
<div class="col-md-6">
    <label class="form-label" for="link">لینک</label>
    <input name="link" id="link" value='{{old('link')}}' type="text" class="form-control" />
    <div class="form-text text-danger ">@error('link'){{$message}}@enderror</div>
</div>
<div class="col-md-6">
    <label class="form-label">توضیحات</label>
    <textarea name="descript" rows="5" class="form-control"></textarea>
    <div class="form-text text-danger ">@error('descript'){{$message}}@enderror</div>
</div>

<div>

    <button id="ja" type="submit" class="btn btn-outline-dark mt-3">
         ویرایش درباره
    </button>
</div>
</form>
</main>

</body>
</html>
@endsection
