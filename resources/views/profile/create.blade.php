@extends('profile.layout.master')

@section('content')
    @include('profile.layout.sidbar')
    <div class="col-sm-12 col-lg-9">
        <h5 class="mb-4">
            ایجاد آدرس جدید
        </h5>
        <script>
            function sel(){
              var x = document.getElementById("province").value;
              console.log(x);
               $.ajax({
                    type:'POST',
                    url:'/pr',
                    data:{ x: x, _token: '{{csrf_token()}}' },

                    success:function(dat) {
                        // 'dat'= Jason_encode(dat['msg']);
                        var z=dat['msg'];
                        var c;
                          var element=document.getElementById("city");
                          element.remove('option')
                         for( c in z ){

                             var para=document.createElement("option");
                             var node=document.createTextNode(z[c].name);
                             para.appendChild(node);
                             var element=document.getElementById("city");
                             element.appendChild(para);
                             var r=document.createAttribute("value")
                             r.value=z[c].id
                              para.setAttributeNode(r)
                            //  console.log(z[c].name);
                        }


                    }
                })

            }

        </script>

        <form action="{{route('profile.store')}}" method="POST" class="card card-body">
            @csrf
            <div class="row g-4">
                <div class="col col-md-6">
                    <label class="form-label">عنوان</label>
                    <input name="title" type="text" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">شماره تماس</label>
                    <input name="cellphone" type="text" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">کد پستی</label>
                    <input name="postal_code" type="text" class="form-control" />
                </div>
                <div class="col col-md-6">
                    <label class="form-label">استان</label>
                    <select onchange="sel()" id="province" name="province_id" class="form-select">
                        @foreach ($pro as $province )
                            <option value="{{$province->id}}">{{$province->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col col-md-6">
                    <label class="form-label">شهر</label>
                    <select id="city" name="city_id" class="form-select">
                        {{-- @foreach ($city as $d )
                           <option value="{{$d->id}}">{{$d->name}}</option>
                        @endforeach --}}
                        {{-- <option selected>تهران</option>
                        <option value="1">اصفهان</option>
                        <option value="2">شیراز</option>
                        <option value="3">یزد</option> --}}
                    </select>
                </div>
                <div class="col col-md-12">
                    <label class="form-label">آدرس</label>
                    <textarea name="address" type="text" rows="5" class="form-control"></textarea>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-4">ایجاد</button>
            </div>
        </form>
    </div>
@endsection
