@extends('profile.layout.master')
@section('content')
    @include('profile.layout.sidbar')
    <div class="col-sm-12 col-lg-9">
        <a href="{{route('profile.create')}}" class="btn btn-primary mb-4">
            ایجاد آدرس جدید
        </a>
        {{-- @dd($city[1]); --}}
        @foreach ($addresses as $address)
{{-- @dd($address) --}}

        <div class="card card-body">
            <div class="row g-4">
                <div class="col col-md-6">
                    <label class="form-label">عنوان</label>
                    <input disabled type="text" value="{{$address->title}}" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">شماره تماس</label>
                    <input disabled type="text" value="{{$address->cellphone}}" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">کد پستی</label>
                    <input disabled type="text" value="{{$address->postal_code}}" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">استان</label>
                    <input disabled type="text" value="{{$province->find($address->province_id)->name }}" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">شهر</label>
                    <input disabled type="text" value="{{$city->find($address->city_id)->name}}" class="form-control" />
                </div>
                <div class="col col-md-12">
                    <label class="form-label">آدرس</label>
                    <textarea disabled type="text" rows="5" class="form-control">{{$address->address}} </textarea>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{route('profile.edite',[$address->id])}}" class="btn btn-primary">ویرایش</a>
            </div>
        </div>
         @endforeach
        <hr />

    </div>
@endsection
