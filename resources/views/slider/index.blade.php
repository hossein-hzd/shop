@extends('adminlayout.master')
@section('title', 'Sliders')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">اسلایدرها</h4>
        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-outline-primary">ایجاد اسلایدر</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>عنوان لینک</th>
                    <th>آدرس لینک</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->body }}</td>
                    <td>{{ $slider->link_title }}</td>
                    <td >{{ $slider->link_address }}</td>
                    <td>
                        <div class="d-flex">
                           <a href="{{route('slider.edit',[$slider->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                           <a href="{{route('slider.delete',[$slider->id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
