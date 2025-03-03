@extends('layout.master')
@section('content')
    <section class="single_page_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row gy-5">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        @php
                                            $products = App\Models\Product::all();
                                            $z = [];
                                            if (isset($x)) {
                                                foreach ($x as $keyid => $value) {
                                                    $z[key($value)] = $x[$keyid][key($value)]['qty'];
                                                }
                                            }
                                            //   $_POST["arr"]=$x;
                                        @endphp
                                        <tr>
                                            <th>محصول</th>
                                            <th>نام</th>
                                            <th>قیمت</th>
                                            <th>تعداد</th>
                                            <th>قیمت کل</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($z))
                                            @php
                                                $tsum = 0;
                                                $sum = 0;
                                            @endphp
                                            @foreach ($z as $id => $numb)
                                                @php
                                                    $sum += $products->find($id)->price * $numb;
                                                    $tsum += $products->find($id)->sale_price * $numb;

                                                @endphp
                                                <tr>
                                                    <th>
                                                        <img class="rounded"
                                                            src="{{ asset('images/products/' . $products->find($id)->image) }}"
                                                            width="100" alt="" />
                                                    </th>
                                                    <td class="fw-bold"> {{ $products->find($id)->name }}</td>
                                                    <td>
                                                        @if ($products->find($id)->is_sale)
                                                            <div>
                                                                <del>{{ $products->find($id)->price }}</del>
                                                                {{ $products->find($id)->sale_price }}
                                                                تومان
                                                            </div>
                                                            <div class="text-danger">
                                                                {{ percent($products->find($id)->price, $products->find($id)->sale_price) }}
                                                                تخفیف
                                                            </div>
                                                        @else
                                                            <span>{{ $products->find($id)->price }}</span>
                                                            <span class="ms-1">تومان</span>
                                                        @endif


                                                    </td>
                                                    <td>
                                                        <div class="input-counter">
                                                            <span class="plus-btn">
                                                                +
                                                            </span>
                                                            <div class="input-number">{{ $numb }}</div>
                                                            <span class="minus-btn">
                                                                -
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span>{{ $products->find($id)->sale_price * $numb }}</span>
                                                        <span class="ms-1">تومان</span>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('cart.delete', [$id]) }}"> <i
                                                                class="bi bi-x text-danger fw-bold fs-4 cursor-pointer"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td class="fw-bold text-danger"></td>
                                            <td class="fw-bold text-danger">موردی یافت نشد!!!!!!!!!!!!!!!د </td>
                                            <td class="fw-bold text-danger">در صفحه ی منو محصولات مورد نظر را انتخاب کنید.
                                            </td>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href='{{ route('cart.remove') }}'><button class="btn btn-primary mb-4">پاک کردن سبد
                                   ط خرید</button></a>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-6">
                            <form action="{{ route('copun.check') }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="input-group mb-3">
                                    <input name="code" type="text" class="form-control" placeholder="کد تخفیف" />
                                    <button class="input-group-text" id="basic-addon2">اعمال کدتخفیف</button>
                                </div>
                                <div class="form-text text-danger">
                                    @error('code')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-md-6 d-flex justify-content-end align-items-baseline">
                            <div>
                                انتخاب آدرس
                            </div>
                            <select style="width: 200px;" class="form-select ms-3" aria-label="Default select example">
                                <option selected>منزل</option>
                                <option value="1">محل کار</option>
                            </select>
                            <a href="profile.html" class="btn btn-primary">
                                ایجاد آدرس
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold">مجموع سبد خرید</h5>
                                    <ul class="list-group mt-4">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>مجموع قیمت :</div>
                                            <div>
                                                {{ isset($tsum) ? $tsum : 0 }}
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>تخفیف :
                                                {{-- {{dd(session()->get('copun'))}} --}}

                                                <span
                                                    class="text-danger ms-1">{{ session()->get('copun') == null ? 0 : session()->get('copun')['percentage'] }}</span>
                                            </div>
                                            <div class="text-danger">
                                                {{ session()->get('copun') == null ? 0 : (session()->get('copun')['percentage'] * $tsum) / 100 }}
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <div>قیمت پرداختی :</div>
                                            <div>
                                                {{ session()->get('copun') == null ? $tsum : $tsum - (session()->get('copun')['percentage'] * $tsum) / 100 }}
                                            </div>
                                        </li>
                                    </ul>
                                    <button class="user_option btn-auth mt-4">پرداخت</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
