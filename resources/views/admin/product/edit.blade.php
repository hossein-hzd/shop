
@extends('adminlayout.master')
@section('title', 'product edit')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>


    <form class="row gy-4" action="{{route('product.update',[$product->id])}}" method='post' enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="col-md-6">
            <label class="form-label">تصویر</label>
            <input name="image"value='{{old('image')}}' type="file" class="form-control" />
            <div class="form-text text-danger ">@error('image'){{$message}}@enderror</div>

        </div>
        <div class="col-md-3">
            <label class="form-label"> نام</label>
            <input name="name" value='{{old('name')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">قیمت </label>
            <input name="price" value='{{old('price')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('price') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">تعداد </label>
            <input name="number" value='{{old('number')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('number') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label for="TF" class="form-label">وضعیت </label>
                <select id="TF" name="status">
                <option value="1">موجود میباشد </option>
                <option value="0">وجود ندارد</option>
                </select>
            <div class="form-text text-danger">@error('status') {{ $message }} @enderror</div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویراش محصول
            </button>
        </div>
    </form>
</main>
</body>
</html>
@endsection
