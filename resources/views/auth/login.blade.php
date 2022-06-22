@extends('layout.auth')

@section('page-title','ورود به سامانه')
@section('content')

    <div class="row align-items-center">
        <div class="col-lg-6 offset-lg-1">
            <div class="text-left">
                <div>
                    <a href="#" class="logo logo-admin"><img src="{{asset('admin/assets/images/logo_dark.png')}}"
                                                             height="28" alt="logo"></a>
                </div>
                <h5 class="font-14 text-muted mb-4">ثبت نام در انجمن</h5>
                <p class="text-muted mb-4">جهت عضویت در انجمن صنفی ژئوتکنیک و اعتبار سنجی شماره خود را وارد کنید و وارد
                    صفحه ثبت نام شوید .</p>


            </div>
        </div>
        <div class="col-lg-5">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="p-2">


                        @error('code')
                        {{$message}}
                        @enderror

                        <h4 class="text-muted float-right font-18 mt-4">ورود به انجمن صنفی ژئوتکنیک </h4>

                        <div>
                            <a href="#" class="logo logo-admin"><img
                                    src="{{asset('admin/assets/images/logo_dark.png')}}" height="28" alt="logo"></a>
                        </div>
                    </div>

                    <div class="p-2">
                        <form action="{{route('auth.login')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>شماره موبایل خود را وارد کنید</label>
                                <div>
                                    <input class="form-control" name="mobile" id="mobile" required type="text" min="11"
                                           max="11" placeholder="شماره موبایل" aria-label="mobile"
                                           value="{{old('mobile')}}"/>
                                    @error('mobile')
                                    <span class="text-danger font-weight-bold mt-1">{{$message}}</span>
                                    @enderror
                                    <span id="send-code-error"
                                          style="font-size: 12px;font-weight: bold;color: #dc3545;display: none">خطا در ارسال کد</span>
                                    <span id="send-code-success" class="text-success font-weight-bold"
                                          style="display: none">کد تائید به شماره موبایل شما ارسال شد</span>
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="button"
                                            name="submit" value="submit" id="send_code">دریافت کد تایید
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>کد دریافت شده را وارد کنید</label>
                                <div>
                                    <input class="form-control" name="code" id="code" type="text" required
                                           min="4" value="{{old('code')}}" aria-label="code"
                                           max="4" placeholder="کد تائیدیه ارسالی را وارد نمائید"/>
                                    @error('code')
                                    <span class="text-danger font-weight-bold  mt-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit"
                                            name="submit" value="submit">ورود به سامانه
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>


        @if(session('code-failed'))
        Swal.fire({
            icon: 'error',
            title: 'خطا !',
            text: "{{session('code-failed')}}",
        })
        @endif

        $(document).ready(function () {

            // event on send code form Submit
            $("#send_code").on('click', function (e) {
                e.preventDefault();

                let mobile = $("input[name='mobile']").val();


                // send ajax request to send 4 digits code to user mobile
                $.ajax({
                    url: "{{route('auth.send.code')}}",
                    type: 'GET',
                    data: {
                        mobile: mobile
                    },
                    dataType: 'json',
                    success: function (response) {

                        if (response.status == 0) {
                            $("input[name='mobile']").css('border', '1px solid #dc3545');
                            $("#send-code-error").fadeIn('slow');
                            $("#send-code-success").fadeOut('slow');

                        } else {

                            $("input[name='mobile']").css('border', '1px solid #28a745');
                            $("#send-code-success").fadeIn('slow');

                            $("#send-code-error").fadeOut('slow');
                        }
                    },
                    error: function () {
                        console.log('send code ajax failed');
                    }
                });


            });
        });
    </script>



@endsection

