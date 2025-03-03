@extends('profile.layout.master')

@section('content')
    @include('profile.layout.sidbar')
    <div class="col-sm-12 col-lg-9">
        <form action="{{route('profile.editeprof')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="vh-70">
                <div class="row g-4">
                    <div class="col col-md-6">
                        <label class="form-label">نام و نام خانوادگی</label>
                        <input name="name" type="text" class="form-control"  />
                    </div>
                    <div class="col col-md-6">
                        <label class="form-label">ایمیل</label>
                        <input name="email" type="text" class="form-control"  />
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mt-4">ویرایش</button>
            </div>
        </form>
    </div>
    </div>
    </div>
    </section>
@endsection
