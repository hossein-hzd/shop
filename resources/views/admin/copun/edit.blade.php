@extends('adminlayout.master')
@section('title', 'copun edit')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>




    <form class="row gy-4" action="{{route('copun.update',[$copun->id])}}" method='post'>
        @csrf
        @method('put')
        <div class="col-md-6">
            <label class="form-label">کد تخفیف</label>
            <input name="code"value='{{$copun->code}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('code'){{$message}}@enderror</div>
        </div>
        <div class="col-md-6">
            <label class="form-label">درصد تخفیف</label>
            <input name="percentage"value='{{$copun->percentage}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('percentage'){{$message}}@enderror</div>
        </div>
        <div class="col-md-6">
            <label class="form-label">تاریخ انقضا</label>
            <input data-jdp name="expired_at"value='{{$copun->expired_at}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('expired_at'){{$message}}@enderror</div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش کد تخفیف
            </button>
        </div>
    </form>
</main>
</body>
</html>
@endsection
