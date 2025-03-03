@extends('adminlayout.master')
@section('title', 'copun')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">تخفیف</h4>
        <a href="{{ route('copun.create') }}" class="btn btn-sm btn-outline-primary">ایجاد کد تخفیف</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>کد</th>
                    <th>درصد تخفیف</th>
                    <th>تاریخ انقضا</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($copuns as $copun)
                <tr>
                    <td>{{ $copun->code }}</td>
                    <td>{{ $copun->percentage}}</td>
                    <td>{{ $copun->expired_at}}</td>


                    <td>
                        <div class="d-flex">
                           <a href="{{route('copun.edit',[$copun->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                           <a href="{{route('copun.delete',[$copun->id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
