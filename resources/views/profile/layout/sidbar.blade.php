{{-- @extends('profile.layout.master') --}}
{{-- @section('sidbar') --}}
 <section class="profile_section layout_padding">
        <div class="container">
            <div class="row">
             <div class="col-sm-12 col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('profile.index')}}">اطلاعات کاربر</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('profile.address')}}">آدرس ها</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./orders.html">سفارشات</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./transactions.html">تراکنش ها</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('wish.index')}}">لیست علاقه مندی ها</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('logout')}}">خروج</a>
                        </li>
                    </ul>
                </div>
{{-- @endsection --}}
