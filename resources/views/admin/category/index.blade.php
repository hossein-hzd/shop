@extends('adminlayout.master')
@section('title', 'features')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ویژگیها</h4>
        <a href="{{ route('feature.create') }}" class="btn btn-sm btn-outline-primary">ایجاد ویژگی</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th> ایکون</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($features as $feature)
                <tr>
                    <td>{{ $feature->title }}</td>
                    <td>{{ $feature->text}}</td>
                    <td>{{ $feature->icon }}</td>

                    <td>
                        <div class="d-flex">
                           <a href="{{route('feature.edit',[$feature->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                           <a href="{{route('feature.delete',[$feature->id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
