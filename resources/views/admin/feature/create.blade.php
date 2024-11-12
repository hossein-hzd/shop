
@extends('adminlayout.master')
{{-- @section('title', 'Slider Create') --}}

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>

            {{-- <div id="chartdiv"></div> --}}


    <form class="row gy-4" action="{{route('feature.store')}}" method='post'>
        @csrf
        <div class="col-md-6">
            <label class="form-label">عنوان</label>
            <input name="title"value='{{old('title')}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('title'){{$message}}@enderror</div>

        </div>
        <div class="col-md-3">
            <label class="form-label"> متن</label>
            <input name="text" value='{{old('text')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('text') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">ایکون </label>
            <input name="icon" value='{{old('icon')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('icon') {{ $message }} @enderror</div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ایجاد ویژگی
            </button>
        </div>
    </form>
</main>
</body>
</html>
@endsection
