@extends('profile.layout.master')

@section('content')
    @include('profile.layout.sidbar')
    <div class="col-sm-12 col-lg-9">

        <div class="vh-70">
            <div class="row g-4">
                <div class="col col-md-6">
                    <label class="form-label">نام و نام خانوادگی</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">ایمیل</label>
                    <input type="text" class="form-control" value="{{ $user->email }}" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">شماره تلفن</label>
                    <input type="text" disabled class="form-control" value="{{ $user->phone }}" />
                </div>
            </div>
            <a
                    href="{{ route('profile.editepro',[$user->id]) }}"><button type="submit" class="btn btn-primary mt-4">ویرایش</button></a>
        </div>
    </div>
    </div>
    </div>
    </section>
@endsection
