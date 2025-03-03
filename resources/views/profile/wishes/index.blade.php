@extends('profile.layout.master')
@section('content')
    @include('profile.layout.sidbar')
    <div class="col-sm-12 col-lg-9">
          <table class="table align-middle">
            <thead>
                <tr>
                    <th>نام</th>
                    <th> قیمت</th>
                    <th>تعداد</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_ids as $product_id)
                <tr>

                    {{-- <td>{{dd($wish->product_id) }}</td> --}}
                    <td>{{$producs->find($product_id)->name }}</td>
                    <td>{{$producs->find($product_id)->price }}</td>
                    <td>{{$producs->find($product_id)->number }}</td>
                    <td>{{$producs->find($product_id)->status==1?'فعال':'غیر فعال' }} </td>

                    <td>
                        <div class="d-flex">
                           <a href="{{route('wish.delete',[$product_id])}}"><button  class="btn btn-sm btn-danger">حذف</button></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
