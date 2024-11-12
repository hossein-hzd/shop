@extends('adminlayout.master')
@section('title', 'Slider edit')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>




    <form class="row gy-4" action="{{route('slider.update',[$slider->id])}}" method='post'>
        @csrf
        @method('put')
        <div class="col-md-6">
            <label class="form-label">عنوان</label>
            <input name="title"value='{{$slider->title}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('title'){{$message}}@enderror</div>

        </div>
        <div class="col-md-3">
            <label class="form-label">عنوان لینک</label>
            <input name="link_title" value='{{$slider->link_title}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('link_title') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">آدرس لینک</label>
            <input name="link_address" value='{{$slider->link_address}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('link_address') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-12">
            <label class="form-label">متن</label>
            <textarea name="body" value='{{$slider->body}}'class="form-control" rows="3"></textarea>
            <div class="form-text text-danger">@error('body') {{ $message }} @enderror</div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش اسلایدر
            </button>
        </div>
    </form>
</main>
</body>
</html>
@endsection
