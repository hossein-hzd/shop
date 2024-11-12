@extends('adminlayout.master')
@section('title', 'products')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">محصولات</h4>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-outline-primary">ایجاد محصول</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th> قیمت</th>
                    <th>تعداد</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><img width="90" height='90' class="rounded" src="{{asset("images/".$product->image)}}" ></td>
                    <td>{{ $product->name}}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->number }}</td>
                    <td class="btn btn-sm btn-{{ $product->status?'primary':'danger' }}  mt-4">{{ $product->status?'موجود است':'تمام شده' }}</td>

                    <td>
                        <div class="d-flex">
                           <a href="{{route('product.edit',[$product->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                           <a href="{{route('product.delete',[$product->id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
@endsection
