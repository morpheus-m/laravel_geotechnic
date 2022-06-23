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
            <form action="{{route('admin.geotechnics.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">


                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="map_registration_number">شماره ثبت دستور
                                                     نقشه<span class="text-danger" > * </span></label>
                                                <input class="form-control" type="number"
                                                       name="map_registration_number"
                                                       value="{{old('map_registration_number')}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="example-number-input">متراژ کل بنا
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <input class="form-control" type="number"
                                                       name="total_building_area"
                                                       value="{{old('total_building_area')}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label>نوع زمین
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <select class="form-control" name="type_of_land" aria-label="type_of_land">
                                                    @foreach($land_costs as $key => $land_cost)
                                                        <option value="{{$key}}">{{$land_cost}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="number_of_floors">تعداد طبقات کل
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <input class="form-control" type="number"
                                                       name="number_of_floors"
                                                       value="{{old('number_of_floors')}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="occupancy_level_downstairs">سطح اشغال طبقه
                                                    پایین
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <input class="form-control" type="number"
                                                       name="occupancy_level_downstairs"
                                                       value="{{old('occupancy_level_downstairs')}}"
                                                       id="example-number-input">
                                            </div>
                                            <div class="col-sm-4" style="padding-top: 20px">
                                                <label for="number_of_underground_floors">تعداد طبقات زیر
                                                    زمین
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <input class="form-control" type="number"
                                                       name="number_of_underground_floors"
                                                       value="{{old('number_of_underground_floors')}}"
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


                                    <label class="control-label">تعداد گمانه ماشینی

                                    </label>

                                    <input id="machine_bore_count" type="text" value="0" name="number_of_machine_boreholes" data-bts-min="0"
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


                                    <div class="text-center pt-3">
                                        <!-- Begin : Button Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#staticBackdrop">
                                            آپلود درخواست کتبی تعداد گمانه
                                        </button>
                                        <!-- End : Button Modal -->

                                        <!-- Begin :Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                             data-keyboard="false" tabindex="-1" aria-labelledby="modal-1"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-1">آپلود درخواست کتبی تعداد گمانه</h6>

                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="font-weight-bold text-bold text-left">فایل مورد نظر خود را انتخاب نمائید</p>
                                                                <div class="custom-file">
                                                                    <input type="file" name="written_request_of_bore_number" class="custom-file-input" id="customFile">
                                                                    <label class="custom-file-label" for="customFile" id="label_written_request_of_bore_number">انتخاب فایل</label>
                                                                </div>
                                                                <small class="text-muted text-right">فرمت های مجاز :  xlxs , png , doc , jpg </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="cancel_machine_bore_file" data-dismiss="modal">انصراف
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">انتخاب فایل</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End :Modal -->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-body">


                                <div class="col-sm-12" style="padding-top: 20px">
                                    <label class="control-label">تعداد چاهک دستی

                                    </label>
                                    <input id="manual_wells_count" type="text" value="0" name="number_of_manual_wells" data-bts-min="0" aria-label="number_of_manual_wells"
                                           data-bts-max="5" data-bts-init-val="" data-bts-step="1"
                                           data-bts-decimal="0" data-bts-step-interval="100"
                                           data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500"
                                           data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class=""
                                           data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10"
                                           data-bts-max-boosted-step="false" data-bts-mousewheel="true"
                                           data-bts-button-down-class="btn btn-default"
                                           data-bts-button-up-class="btn btn-default"/>
                                    <span id="manual_well_error" style="color: #dc3545;font-size: 12px;display: none">حداکثر تعداد چاهک دستی 5 میباشد</span>
                                    <div id="manual_wells_wrapper" class="mt-3">

                                    </div>
                                    <div class="text-center pt-3">
                                        <!-- Begin : Button Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#staticBackdrop2">
                                            آپلود درخواست کتبی تعداد چاهک
                                        </button>
                                        <!-- End : Button Modal -->

                                        <!-- Begin :Modal -->
                                        <div class="modal fade" id="staticBackdrop2" data-backdrop="static"
                                             data-keyboard="false" tabindex="-1" aria-labelledby="modal-1"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="modal-1">آپلود درخواست کتبی تعداد چاهک</h6>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p class="font-weight-bold text-bold text-left">فایل مورد نظر خود را انتخاب نمائید</p>
                                                                <div class="custom-file">
                                                                    <input type="file" name="written_request_of_well_number" class="custom-file-input" id="customFile">
                                                                    <label class="custom-file-label" for="customFile" id="label_written_request_of_bore_number">انتخاب فایل</label>
                                                                </div>
                                                                <small class="text-muted text-right">فرمت های مجاز :  xlxs , png , doc , jpg </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" id="cancel_machine_bore_file" data-dismiss="modal">انصراف
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">انتخاب فایل</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End :Modal -->
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
                                                <label>سازه نگهبان
                                                    <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" name="guard_structure" aria-label="guard_structure">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="yes">دارد</option>
                                                    <option value="no">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>بارگزاری و برش برجا
                                                  <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" aria-label="upload_and_cut_in_place"
                                                        name="upload_and_cut_in_place">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="yes">دارد</option>
                                                    <option value="no">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>تست لرزه درون چاهی
                                                  <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" aria-label="in_well_vibration_test"
                                                        name="in_well_vibration_test">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="yes">دارد</option>
                                                    <option value="no">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>بستر سنگی
                                                  <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" name="bedrock" aria-label="bedrock">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="yes">بله</option>
                                                    <option value="no">خیر</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>اضافه بهای حفاری
                                                  <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" name="drilling_surcharge" aria-label="drilling_surcharge">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="yes">دارد</option>
                                                    <option value="no">ندارد</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3" style="padding-top: 20px">
                                                <label>تعداد اقساط پرداخت
                                                  <span class="text-danger" > * </span>
                                                </label>
                                                <select class="custom-select" name="number_of_payment" aria-label="number_of_payment">
                                                    <option selected>انتخاب کنید</option>
                                                    <option value="Cash">به صورت نقدی</option>
                                                    <option value="One_Installment">یک قسط</option>
                                                    <option value="Two_Installment">دو قسط</option>
                                                    <option value="Three_Installment">سه قسط</option>
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
                                                    <button type="submit"
                                                            class="btn btn-primary btn-lg btn-block waves-effect waves-light">
                                                        محاسبه و رفتن به صفحه بعد
                                                    </button>
                                                    <button type="reset"
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

                    let bedrock = $("select[name='bedrock']").val();

                    if (bedrock != 'yes') {
                        for (let i = 1; i <= count; i++) {
                            html += " <label class=\"mt-3\" for=\" example-number-input\">عمق گمانه ماشینی " + i + "</label>\n" +
                                "<input class=\"form-control machine_bore_depth\" name=\"machine_bore_depth[]\" type=\"number\"\n" +
                                "aria-label=\"machine_bore\">";
                        }

                        $("#machine_bore_error").fadeOut('slow');
                        $("#machine_bore_wrapper").html(html);
                    }

                }
            });

            $("#cancel_machine_bore_file").on('click',function ()
            {
                $("input[type='file'][name='written_request_of_bore_number']").val('');
                $("#label_written_request_of_bore_number").text('انتخاب فایل');
            })


            $("#manual_wells_count").on('change', function () {


                let count = $(this).val();

                if (count > 5) {
                    $("#manual_well_error").fadeIn('slow');
                } else {

                    var html = "";
                    for (let i = 1; i <= count; i++) {
                        html += " <label class=\"mt-3\" for=\" example-number-input\">عمق چاک دستی " + i + "</label>\n" +
                            "<input class=\"form-control machine_bore_depth\" name=\"manual_well_depth[]\" type=\"number\"\n" +
                            "aria-label=\"machine_bore\">";
                    }

                    $("#manual_well_error").fadeOut('slow');
                    $("#manual_wells_wrapper").html(html);


                }
            });


            $("select[name='bedrock']").on('change', function () {

                let bedrock = $(this).val();

                if (bedrock == 'yes')
                    $(".machine_bore_depth").attr('disabled', true).css('background-color', '#e9ecef');
                else
                    $(".machine_bore_depth").attr('disabled', false).css('background-color', 'white');

            })


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
