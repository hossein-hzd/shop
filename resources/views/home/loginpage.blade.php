@extends('layout.master')
@section('title', 'Login Page')

@section('script')
<script>
function loginv(){
      var log=document.getElementById('log').value;
    document.getElementById('dis').style.display='block';
    $.ajax({
        type:'POST',
        url:'/login',
        data:{ phone: log, _token: '{{csrf_token()}}'},

        success:function(dat) {
            console.log(dat['msg']);
            console.log(dat['errors']);
             if(dat['cod']==200){
                sessionStorage.setItem('toke', dat['toke']);
                 document.getElementById('d1').style.display='none'
                 document.getElementById('d2').style.display='block'
             }else{
                 document.getElementById('err').innerHTML=dat['errors']

             }
                        document.getElementById('dis').style.display='none';


        }

  })
//   localStorage.setItem('logintoken',_token);
//  console.log(localStorage.getItem('logintoken'));

// alert(localStorage.getItem('lastname'));
}

function conf(){
    // console.log(loginv());

    var otp=document.getElementById('otp').value;

    $.ajax({
        type:'POST',
        url:'/cofigure',
        data:{ otp: otp,toke:sessionStorage.getItem('toke'),_token: '{{csrf_token()}}'},

        success:function(dat) {
            // console.log(dat['msgh']);
            // console.log(dat['errors']);

             if(dat['cod']==200){
                console.log(dat['msg']);

                document.location.href='http://localhost:8000/'+'h';

             }else{
                console.log(dat['msg']);
                console.log(dat['errors']);

                // document.location.href='{{ url()->current() }}';

             }


        }

  })
}
</script>
@endsection
@section('content')
<section class="auth_section book_section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <div  class="card">
                    <div id="d1" class="card-body">
                        <div class="form_container">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">شماره موبایل</label>
                                    <input name="log" id="log" type="text"  class="form-control mb-2" />
                                    <div id="err" class="form-text text-danger"></div>
                                </div>
                                <button onclick="loginv()" type="submit" class="btn btn-primary btn-auth">ارسال کد تایید
                                    <div id="dis" style="display: none" class="spinner-border spinner-border-sm ms-2"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="d2" style="display: none" class="card-body">
                        <div class="form_container">
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">کد تایید </label>
                                    <input id="otp" type="text"  class="form-control mb-2" />
                                    <div class="form-text text-danger" x-text="error"></div>
                                </div>
                                <button onclick="conf()" type="submit" class="btn btn-primary btn-auth">ورود
                                    <div id="dis" style="display: none" class="spinner-border spinner-border-sm ms-2"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
