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

    <div class="row p-0 m-0">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">ثبت پرونده ژئوتکنیک</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12 col-md-12 col-sm-12 p-0">
            <div style="padding-right: 20px;padding-left: 20px;font-size: larger">
                <div class="alert alert-info" role="alert">
                    <strong><b>ثبت پرونده ژئو تکنیک</b></strong>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">


                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">شماره ثبت دستور
                                                    نقشه</label>
                                                <input class="form-control" type="number"
                                                       name="map_order_registration_number"
                                                       value="{{old('map_order_registration_number') ?? ''}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">متراژ کل بنا</label>
                                                <input class="form-control" type="number"
                                                       name="total_building_area"
                                                       value="{{old('total_building_area') ?? ''}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label>نوع زمین</label>
                                                <select class="form-control" name="type_of_land">
                                                    <option value="Fine_grained_lands">زمین های ریزدانه
                                                    </option>
                                                    <option value="Sandy_alluvium">آبرفتی ماسه ای
                                                    </option>
                                                    <option value="Large_sand_alluvium">آبرفتی شن درشت
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">تعداد طبقات کل</label>
                                                <input class="form-control" type="number"
                                                       name="total_number_of_floors"
                                                       value="{{old('total_number_of_floors') ?? ''}}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">سطح اشغال طبقه
                                                    پایین</label>
                                                <input class="form-control" type="number"
                                                       name="occupancy_level_downstairs"
                                                       value="{{old('occupancy_level_downstairs') ?? ''}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">تعداد طبقات زیر
                                                    زمین</label>
                                                <input class="form-control" type="number"
                                                       name="number_of_underground_floors"
                                                       value="{{old('number_of_underground_floors') ?? ''}}"
                                                       id="example-number-input">
                                            </div>


                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body">


                                <div class="col-sm-12" style="padding-top: 20px;border: 1px;border-color: #0b0b0b">


                                    <label class="control-label">تعداد گمانه ماشینی</label>

                                    <input id="machine_bore_count" type="text" value="0" name="demo0" data-bts-min="0"
                                           aria-label=""
                                           data-bts-max="5" data-bts-init-val="" data-bts-step="1"
                                           data-bts-decimal="0" data-bts-step-interval="100"
                                           data-bts-force-step-divisibility="round"
                                           data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix=""
                                           data-bts-prefix-extra-class=""
                                           data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10"
                                           data-bts-max-boosted-step="false"
                                           data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default"
                                           data-bts-button-up-class="btn btn-default"
                                           style="background-color: white" readonly/>
                                    <span id="machine_bore_error" style="color: #dc3545;font-size: 12px;display: none">حداکثر تعداد گمانه ماشینی 5 میباشد</span>
                                    <div id="machine_bore_wrapper" class="mt-3">

                                    </div>


                                    <div style="text-align: center;padding-top: 20px">
                                        <button type="file" id="written_request_of_bore_number"
                                                name="written_request_of_bore_number"
                                                value="{{old('written_request_of_bore_number') ?? ''}}"
                                                class="btn btn-primary waves-effect waves-light"> آپلود درخواست کتبی
                                            تعداد گمانه
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body">


                                <div class="col-sm-12" style="padding-top: 20px">
                                    <label class="control-label">تعداد چاهک دستی</label>
                                    <input id="demo1" type="text" value="0" name="demo0" data-bts-min="0"
                                           data-bts-max="100" data-bts-init-val="" data-bts-step="1"
                                           data-bts-decimal="0" data-bts-step-interval="100"
                                           data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500"
                                           data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class=""
                                           data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10"
                                           data-bts-max-boosted-step="false" data-bts-mousewheel="true"
                                           data-bts-button-down-class="btn btn-default"
                                           data-bts-button-up-class="btn btn-default"/>
                                    <div style="padding-top: 20px">
                                        <label for="example-number-input">عمق چاهک دستی 1</label>
                                        <input class="form-control" type="number" value="" id="example-number-input">
                                    </div>
                                    <div style="text-align: center;padding-top: 20px">
                                        <button type="file" id="written_request_of_well_number"
                                                name="written_request_of_well_number"
                                                value="{{old('written_request_of_well_number') ?? ''}}"
                                                class="btn btn-primary waves-effect waves-light"> آپلود
                                            درخواست کتبی تعداد
                                            چاهک
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">

                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>سازه نگهبان</label>
                                                <select class="custom-select" name="guard_structure">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="YES">دارد</option>
                                                    <option value="NO">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>بارگزاری و برش برجا</label>
                                                <select class="custom-select"
                                                        name="upload_and_cut_in_place">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="YES">دارد</option>
                                                    <option value="NO">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>تست لرزه درون چاهی</label>
                                                <select class="custom-select"
                                                        name="in_well_vibration_test">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="YES">دارد</option>
                                                    <option value="NO">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>بستر سنگی</label>
                                                <select class="custom-select" name="bedrock">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="YES">بله</option>
                                                    <option value="NO">خیر</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>اضافه بهای حفاری</label>
                                                <select class="custom-select" name="drilling_surcharge">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="YES">دارد</option>
                                                    <option value="NO">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>تعداد اقساط پرداخت</label>
                                                <select class="custom-select" name="number_of_payment">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="CASH">به صورت نقدی</option>
                                                    <option value="ONE_INSTALLMENT">یک قسط</option>
                                                    <option value="TWO_INSTALLMENT">دو قسط</option>
                                                    <option value="THREE_INSTALLMENT">سه قسط</option>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <div class="card-body">
                                                <div class="button-items" style="text-align: center">
                                                    <button type="reset"
                                                            class="btn btn-primary btn-lg btn-block waves-effect waves-light">
                                                        محاسبه و رفتن به صفحه بعد
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-secondary btn-sm btn-block waves-effect waves-light">
                                                        پاک کردن صفحه
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script>

        $(document).ready(function () {


            $("#machine_bore_count").on('change', function () {


                let count = $(this).val();

                if (count > 5) {
                    $("#machine_bore_error").fadeIn('slow');
                } else {
                    var html = "";
                    for (let i = 1; i <= count; i++) {
                        html += " <label class=\"mt-3\" for=\" example-number-input\">عمق گمانه ماشینی " + i + "</label>\n" +
                            "<input class=\"form-control\" name=\"machine_bore[]\" type=\"number\"\n" +
                            "aria-label=\"machine_bore\">";
                    }

                    $("#machine_bore_error").fadeOut('slow');
                    $("#machine_bore_wrapper").html(html);
                }
            });


        });


        function increaseValue(button) {
            const numberInput = button.parentElement.querySelector('.number');
            var value = parseInt(numberInput.innerHTML, 10);
            if (isNaN(value)) value = 0;
            numberInput.innerHTML = value + 1;
        }

        function decreaseValue(button) {
            const numberInput = button.parentElement.querySelector('.number');
            var value = parseInt(numberInput.innerHTML, 10);
            if (isNaN(value)) value = 0;
            if (value < 1) return;
            numberInput.innerHTML = value - 1;
        }
    </script>

@endsection
