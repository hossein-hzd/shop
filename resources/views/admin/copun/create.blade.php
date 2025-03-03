
@extends('adminlayout.master')
@section('title', 'copun Create')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>

            {{-- <div id="chartdiv"></div> --}}


    {{-- <form class="row gy-4" action="{{route('category.store')}}" method='post'> --}}
    <form class="row gy-4" action="{{route('copun.store')}}" method='post'>
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="code">کد</label>
            <input name="code" id="code" value='{{old('code')}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('code'){{$message}}@enderror</div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="percentage">درصد تخفیف</label>
            <input name="percentage" id="percentage" value='{{old('percentage')}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('percentage'){{$message}}@enderror</div>
        </div>
        <div class="col-md-6">
            <label class="form-label" for="expired_at">تاریخ انقضا</label>
            <input data-jdp name="expired_at" id="expired_at" value='{{old('percentage')}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('expired_at'){{$message}}@enderror</div>
        </div>
        <div>

            <button id="ja" type="submit" class="btn btn-outline-dark mt-3">
                 ایجاد گروهبندی
            </button>
        </div>
    </form>
    
</main>

</body>
</html>
@endsection
