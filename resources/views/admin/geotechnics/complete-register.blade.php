@extends('layout.admin')

@section('styles')
    <style>
        .quantity-field {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 120px;
            height: 40px;
            margin: 0 auto;
        }

        .quantity-field .value-button {
            border: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 100%;
            padding: 0;
            background: #eee;
            outline: none;
            cursor: pointer;
        }

        .quantity-field .value-button:hover {
            background: rgb(230, 230, 230);
        }

        .quantity-field .value-button:active {
            background: rgb(210, 210, 210);
        }

        .quantity-field .decrease-button {
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
        }

        .quantity-field .increase-button {
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
        }

        .quantity-field .number {
            display: inline-block;
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 100%;
            line-height: 40px;
            font-size: 11pt;
            box-sizing: border-box;
            background: white;
            font-family: calibri;
        }

        .quantity-field .number::selection {
            background: none;
        }

        /*
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        */
    </style>
@endsection

@section('page-title','ثبت پرونده ژئو تکنیک')
@section('content')



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h4 class="page-title m-0">ثبت پرونده ژئوتکنیک</h4>
                            </div>
                            <!-- end col -->
                        </div>

                        <div>
                            <div class="alert alert-info mt-5" role="alert">
                                <strong><b>صورتحساب</b></strong>
                            </div>
                        </div>
                        <!-- ریز قیمت ها -->
                        <div class="row" style="padding-right: 20px;padding-left: 20px">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <div class="card m-b-30">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-dark mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>شماره ثبت دستور نقشه</th>
                                                                            <th>متراژ کل بنا</th>
                                                                            <th>نوع زمین</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$geotechnic['map_registration_number']}}</td>
                                                                            <td>{{$geotechnic['total_building_area']}}</td>
                                                                            <td>{{$geotechnic->land()}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive" style="padding-top: 5px">
                                                                    <table class="table table-dark mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>تعداد طبقات کل</th>
                                                                            <th>سطح اشغال طبقه پایین</th>
                                                                            <th>تعداد طبقات زیر زمین</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$geotechnic['number_of_floors']}}</td>
                                                                            <td>{{$geotechnic['occupancy_level_downstairs']}}</td>
                                                                            <td>{{$geotechnic['number_of_underground_floors']}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive" style="padding-top: 5px">
                                                                    <table class="table table-dark mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>تعداد گمانه ماشینی</th>
                                                                            <th>تعداد چاهک دستی</th>
                                                                            <th>سازه نگهبان</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{$geotechnic['number_of_machine_boreholes']}}</td>
                                                                            <td>{{$geotechnic['number_of_manual_wells']}}</td>
                                                                            <td>{{($geotechnic['guard_structure'] == 'yes')? 'دارد' : 'ندارد'}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive" style="padding-top: 5px">
                                                                    <table class="table table-dark mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>بارگزاری و برش برجا</th>
                                                                            <th>تست لرزه درون چاهی</th>
                                                                            <th>بستر سنگی</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{($geotechnic['upload_and_cut_in_place'] == 'yes')? 'دارد' : 'ندارد'}}</td>
                                                                            <td>{{($geotechnic['in_well_vibration_test'] == 'yes')? 'دارد' : 'ندارد'}}</td>
                                                                            <td>{{($geotechnic['bedrock'] == 'yes')? 'دارد' : 'ندارد'}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive" style="padding-top: 5px">
                                                                    <table class="table table-dark mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>اضافه بهای حفاری</th>
                                                                            <th>تعداد اقساط پرداخت</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>{{($geotechnic['drilling_surcharge'] == 'yes')? 'دارد' : 'ندارد'}}</td>
                                                                            <td>{{count($geotechnic->installments)}}</td>

                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ریز قیمت ها پایان-->
                        <!-- صورت هزینه بخش مطالعات -->
                        <div class="row" style="padding-right: 20px;padding-left: 20px">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="padding: 20px;font-size: medium">صورت حساب
                                            کا مطالعات و اعضا</h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card bg-info mini-stat text-white">
                                                    <div class="p-3 mini-stat-desc">
                                                        <div class="clearfix">
                                                            <h6 class="text-uppercase mt-0 float-left text-white-50">
                                                                هزینه کل</h6>
                                                            <h4 class="mb-3 mt-0 float-right">{{number_format($geotechnic['total_cost'])}}
                                                                <span style="font-size: 13px">تومان</span></h4>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- پایان صورت هزینه بخش مطالعات  -->
                        <!-- صورت هزینه بخش مطالعات -->
                        <div class="row" style="padding-right: 20px;padding-left: 20px">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title" style="padding: 20px;font-size: medium">جمع هزینه
                                            و کارتهای بخش مطالعات</h4>
                                        <div class="row">
                                            @foreach($studies_installments as $studies)
                                                <div class="col-md-3">
                                                    <div class="card bg-primary mini-stat text-white">
                                                        <div class="p-3 mini-stat-desc">
                                                            <div class="clearfix">
                                                                <h6 class="text-uppercase mt-0 float-left text-white-50">{{$studies['title']}}</h6>
                                                                <h4 class="mb-3 mt-0 float-right">{{number_format($studies['amount'])}}</h4>
                                                            </div>
                                                            <div>
                                                                <span class="badge badge-light text-info"> {{number_format(($studies['amount'] * 100) / $geotechnic['cost_of_studies'],2)}}% </span>
                                                                <span class="ml-2">از مبلغ کل</span>
                                                            </div>
                                                        </div>
                                                        <div class="p-3">
                                                            <div class="float-right">
                                                                <a href="#" class="text-white-50"><i
                                                                        class="mdi mdi-cube-outline h5"></i></a>
                                                            </div>
                                                            <p class="font-14 m-0">مبلغ کل بخش مطالعات</p>
                                                            <p class="font-20 m-0">{{number_format($geotechnic['cost_of_studies'])}}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- پایان صورت هزینه بخش مطالعات  -->
                        <!-- صورت هزینه بخش اعضا -->
                        <div class="row" style="padding-right: 20px;padding-left: 20px">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body" style="background-color: #9f9f9f">
                                        <h4 class="mt-0 header-title" style="padding: 20px;font-size: medium">جمع هزینه
                                            و کارتهای بخش اعضا</h4>
                                        <div class="row">
                                            @foreach($membership_installments as $membership)
                                                <div class="col-md-3">
                                                    <div class="card bg-primary mini-stat text-white">
                                                        <div class="p-3 mini-stat-desc">
                                                            <div class="clearfix">
                                                                <h6 class="text-uppercase mt-0 float-left text-white-50">{{$membership['title']}}</h6>
                                                                <h4 class="mb-3 mt-0 float-right">{{number_format($membership['amount'])}}</h4>
                                                            </div>
                                                            <div>
                                                                <span class="badge badge-light text-info"> {{number_format(($membership['amount'] * 100) / $geotechnic['cost_of_membership'],2)}}% % </span>
                                                                <span
                                                                    class="ml-2">از مبلغ کل</span>
                                                            </div>
                                                        </div>
                                                        <div class="p-3">
                                                            <div class="float-right">
                                                                <a href="#" class="text-white-50"><i
                                                                        class="mdi mdi-cube-outline h5"></i></a>
                                                            </div>
                                                            <p class="font-14 m-0">مبلغ کل بخش اعضا</p>
                                                            <p class="font-20 m-0">{{number_format($geotechnic['cost_of_membership'])}}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- پایان صورت هزینه بخش اعضا  -->

                        <div>
                            <div class="card mb-0">
                                <div class="card-body">

                                    <div class="p-2">
                                        <form class="form-horizontal m-t-20" method="post"
                                              action="{{route('admin.geotechnics.complete-register-store',$geotechnic)}}"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-sm-4" style="padding-top: 20px">
                                                    <div>
                                                        <label>اسناد و مدارک</label>
                                                        <div>
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block waves-effect waves-light"
                                                                accept=".jpg, .jpeg, .png, .pdf" type="file" id="myFile"
                                                                name="filename">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4" style="padding-top: 20px">
                                                    <div>
                                                        <label>دستور نقشه</label>
                                                        <div>
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block waves-effect waves-light"
                                                                accept=".jpg, .jpeg, .png, .pdf" type="file" id="myFile"
                                                                name="filename">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-4" style="padding-top: 20px">
                                                    <div>
                                                        <label>فایل اوتوکد</label>
                                                        <div>
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block waves-effect waves-light"
                                                                accept=".cad" type="file" id="myFile" name="filename">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" style="padding-top: 20px">
                                                    <div>
                                                        <label>وکالت نامه</label>
                                                        <div>
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block waves-effect waves-light"
                                                                accept=".jpg, .jpeg, .png, .pdf" type="file" id="myFile"
                                                                name="filename">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" style="padding-top: 20px">
                                                    <div>
                                                        <label>کارت ملی مالک یا وکیل</label>
                                                        <div>
                                                            <input
                                                                class="btn btn-primary btn-lg btn-block waves-effect waves-light"
                                                                accept=".jpg, .jpeg, .png, .pdf" type="file" id="myFile"
                                                                name="filename">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Loader -->
                                            <div class="modal bs-example-modal" tabindex="-1" role="dialog">
                                                <div role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">مشخصات مالک</h5>
                                                        </div>
                                                        <div>
                                                            <div class="form-group row"
                                                                 style="padding-right: 10px;padding-left: 10px">
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <label>نام مالک </label>
                                                                        <div>
                                                                            <input class="form-control" type="text"
                                                                                   name="f_name" aria-label="f_name"
                                                                                   value="{{old('f_name')}}"
                                                                                   @error('f_name')
                                                                                       style="border: 1px solid #dc3545"
                                                                                    @enderror
                                                                                   id="example-text-input5">
                                                                            @error('f_name')
                                                                                <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <label>نام خانوادگی مالک </label>
                                                                        <div>
                                                                            <input class="form-control" type="text"
                                                                                   name="l_name" aria-label="l_name"
                                                                                   value="{{old('l_name')}}"
                                                                                   @error('l_name')
                                                                                   style="border: 1px solid #dc3545"
                                                                                   @enderror
                                                                                   id="example-text-input6">
                                                                            @error('l_name')
                                                                            <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <label>کد ملی مالک </label>
                                                                        <div>
                                                                            <input class="form-control" type="number"
                                                                                   name="code_melli"
                                                                                   aria-label="code_melli"
                                                                                   @error('code_melli')
                                                                                   style="border: 1px solid #dc3545"
                                                                                   @enderror
                                                                                   value="{{old('code_melli')}}"
                                                                                   id="example-number-input7">
                                                                            @error('code_melli')
                                                                            <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div>
                                                                        <label> شماره تماس مالک</label>
                                                                        <div>
                                                                            <input class="form-control" type="number"
                                                                                   name="mobile" aria-label="mobile"
                                                                                   @error('mobile')
                                                                                   style="border: 1px solid #dc3545"
                                                                                   @enderror
                                                                                   value="{{old('mobile')}}"
                                                                                   id="example-number-input">
                                                                            @error('mobile')
                                                                            <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group"
                                                                 style="padding-right: 10px;padding-left: 10px">
                                                                <label>آدرس مالک</label>
                                                                <div>
                                                                    <textarea name="address" aria-label="address"
                                                                              class="form-control"
                                                                              @error('address')
                                                                              style="border: 1px solid #dc3545"
                                                                              @enderror
                                                                              rows="5">{{old('address')}}</textarea>
                                                                    @error('address')
                                                                    <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3" style="padding-bottom: 20px">
                                                                <div>
                                                                    <label> پلاک ثبتی مالک </label>
                                                                    <div>
                                                                        <input class="form-control" type="number"
                                                                               name="registration_plate"
                                                                               @error('registration_plate')
                                                                               style="border: 1px solid #dc3545"
                                                                               @enderror
                                                                               aria-label="registration_plate"
                                                                               value="{{old('registration_plate')}}"
                                                                               id="example-number-input7">
                                                                        @error('registration_plate')
                                                                        <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


                                            <div class="modal bs-example-modal" tabindex="-1" role="dialog"
                                                 style="padding-top: 20px">
                                                <div role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">احراز هویت مالک</h5>
                                                        </div>
                                                        <div class="form-group row"
                                                             style="padding-right: 10px;padding-left: 10px">
                                                            <div class="col-sm-4">
                                                                <div>
                                                                    <label> شماره تماس مالک</label>
                                                                    <div>
                                                                        <input class="form-control" type="number"
                                                                               name="verify_mobile" aria-label="mobile"
                                                                               value="{{old('verify_mobile')}}"
                                                                               id="example-number-input">
                                                                        <span id="send-code-error"
                                                                              style="font-size: 12px;font-weight: bold;color: #dc3545;display: none">خطا در ارسال کد</span>
                                                                        <span id="send-code-success" class="text-success font-weight-bold"
                                                                              style="display: none">کد تائید به شماره موبایل شما ارسال شد</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4" style="padding-top: 25px">
                                                                <div>
                                                                    <button id="send_code"
                                                                        class="btn btn-primary btn-block waves-effect waves-light"
                                                                        type="submit">ارسال کد
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div>
                                                                    <label>کد تایید</label>
                                                                    <div>
                                                                        <input class="form-control" type="number"
                                                                               name="code" aria-label="code"
                                                                               @error('code')
                                                                               style="border: 1px solid #dc3545"
                                                                               @enderror
                                                                               value="{{old('code')}}"
                                                                               id="example-number-input">
                                                                        @error('code')
                                                                         <span style="font-size: 12px;font-weight: bold;color: #dc3545">{{$message}}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->


                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light"
                                                            type="submit">ثبت نام
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title-box -->
                </div>
            </div>
            <!-- end page title -->

        </div><!-- container fluid -->

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

                let mobile = $("input[name='verify_mobile']").val();


                // send ajax request to send 4 digits code to user mobile
                $.ajax({
                    url: "{{route('admin.owners.verify')}}",
                    type: 'GET',
                    data: {
                        mobile: mobile
                    },
                    dataType: 'json',
                    success: function (response) {

                        if (response.status == 0) {
                            $("input[name='verify_mobile']").css('border', '1px solid #dc3545');
                            $("#send-code-error").fadeIn('slow');
                            $("#send-code-success").fadeOut('slow');

                        } else {

                            $("input[name='verify_mobile']").css('border', '1px solid #28a745');
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

    <!-- Begin : Custom Upload File Scripts -->
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    <!-- End : Custom Upload File Scripts -->

@endsection
