@extends('adminlayout.master')
@section('title', 'category')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">گروهبندی</h4>
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-primary">ایجاد گروهبندی</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>وضعیت</th>
                    <th>تاریخ ثبت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->status? 'فعال':'غیرفعال'}}</td>
                    <td>{{ $category->created_at}}</td>


                    <td>
                        <div class="d-flex">
                           <a href="{{route('category.edit',[$category->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                           <a href="{{route('category.delete',[$category->id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
