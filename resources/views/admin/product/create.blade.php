
@extends('adminlayout.master')
@section('title', 'product Create')

@section('content')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4 class="fw-bold">داشبورد</h4>
            </div>


    <form class="row gy-4" action="{{route('product.store')}}" method='post' enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label class="form-label">تصویر اصلی</label>
            <img id="i" width="380" height='120' class="rounded center mb-3"  >
            <input id="image" width="370" name="image"value='{{old('image')}}' type="file" class="form-control" />
            <div class="form-text text-danger ">@error('image'){{$message}}@enderror</div>

        </div>

        <div class="col-md-3">
            <label class="form-label">تصاویر محصول</label>
            <input name="images[]" multiple type="file" class="form-control" />
            <div class="form-text text-danger">@error('images') {{ $message }} @enderror</div>
        </div>


        <div class="col-md-3">
            <label class="form-label"> نام</label>
            <input name="name" value='{{old('name')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>

        </div>
        <div class="col-md-3">
            <label class="form-label">قیمت </label>
            <input name="price" value='{{old('price')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('price') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label class="form-label">دسته بندی</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value={{ $category->id }}>{{ $category->title }}</option>
                @endforeach
            </select>
            <div class="form-text text-danger">
                @error('category_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">توضیحات</label>
            <textarea name="desc" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-md-3">
            <label class="form-label">قیمت حراجی</label>
            <input name="sale_price" type="text" value="{{ old('sale_price') }}" class="form-control" />
            <div class="form-text text-danger">
                @error('sale_price')
                    {{ $message }}
                @enderror
            </div>
        </div>
            <div class="col-md-3">
                <label class="form-label">تاریخ شروع حراجی</label>
                <input data-jdp name="date_on_sale_from" type="text" class="form-control" />
                <div class="form-text text-danger">
                    @error('date_on_sale_from')
                        {{ $message }}
                    @enderror
                </div>
             </div>
             <div class="col-md-3">
                <label class="form-label">تاریخ پایان حراجی</label>
                <input data-jdp name="date_on_sale_to" type="text" class="form-control" />
                <div class="form-text text-danger">
                    @error('date_on_sale_to')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        <div class="col-md-3">
            <label class="form-label">تعداد </label>
            <input name="number" value='{{old('number')}}'type="text" class="form-control" />
            <div class="form-text text-danger">@error('number') {{ $message }} @enderror</div>
        </div>
        <div class="col-md-3">
            <label for="TF" class="form-label">وضعیت </label>
                <select id="TF" name="status">
                <option value="1">موجود میباشد </option>
                <option value="0">وجود ندارد</option>
                </select>
            <div class="form-text text-danger">@error('status') {{ $message }} @enderror</div>
        </div>

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ایجاد محصول
            </button>
        </div>
    </form>
</main>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $("#image").on('change',function (){
        var ja = document.getElementById("image").value;


                $.ajax({
                    type:'POST',
                    url:'/kr',
                    data:{ somefield: ja, _token: '{{csrf_token()}}' },

                    success:function(dat) {
                        z=dat['name'].slice(12)
                        // مشخص کردن مقدار داخل صفت
                        MyImage= document.getElementById("i")
                        MyAttribute_Name = document.createAttribute("src");

                           MyAttribute_Name.value = `{{asset('images/${z}')}}`;

                            // اضافه کردن صفت + مقدارش به تگ
                            MyImage.setAttributeNode(MyAttribute_Name);

                    }
                })
    ;})
    jalaliDatepicker.startWatch({time:true});
 </script>

</body>
</html>
@endsection
