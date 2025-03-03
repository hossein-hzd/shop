@extends('adminlayout.master')
@section('title', 'about')

@section('content')
@php
   $about=App\Models\About::all()->last();
//    $about=$abouti[count($abouti)-1];
@endphp
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">درباره ما</h4>
        <a href="{{ route('about.create') }}" class="btn btn-sm btn-outline-primary">ایجاد درباره</a>
    </div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>متن</th>
                    <th>لینک </th>
                    <th>تاریخ بروز رسانی </th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ isset($about->title)?$about->title:'' }}</td>
                    <td>{{ isset($about->descript)?$about->descript:''}}</td>
                    <td>{{ isset($about->link)?$about->link:''}}</td>

                    <td>{{ verta($about->updated_at!==null?$about->updated_at:'')}}</td>


                    <td>
                        <div class="d-flex">
                           <a href="{{route('about.edite',[$about->id])}}"><button  class="btn btn-sm btn-outline-info me-2">ویرایش</button></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </main>
@endsection
