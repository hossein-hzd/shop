@extends('adminlayout.master')
@section('title', 'category edit')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>




    <form class="row gy-4" action="{{route('category.update',[$category->id])}}" method='post'>
        @csrf
        @method('put')
        <div class="col-md-6">
            <label class="form-label">عنوان</label>
            <input name="title"value='{{$category->title}}' type="text" class="form-control" />
            <div class="form-text text-danger ">@error('title'){{$message}}@enderror</div>
        </div>
        <div class="col-md-3">
           

            <label for="TF" class="form-label">وضعیت </label>
                <select id="TF" name="status">
                <option value="1"> فعال </option>
                <option value="0">غیر فعال </option>
                </select>
        </div>


        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ویرایش ویژگی
            </button>
        </div>
    </form>
</main>
</body>
</html>
@endsection
