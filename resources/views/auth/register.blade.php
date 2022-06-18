@extends('layout.auth')

@section('page-title','ثبت نام')

@section('content')

    <div>
        <div class="card mb-0">
            <div class="card-body">
                <div class="p-2">
                    <div>
                        <a href="index-2.html" class="logo logo-admin"><img src="{{asset('admin/assets/images/logo_dark.png')}}"
                                                                            height="28" alt="logo"></a>
                    </div>
                </div>

                <div class="p-2">

                    <form class="form-horizontal m-t-20" method="post"
                          action="/register">
                        @csrf
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">نام کامل شرکت *</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="{{old('company_name') ?? ''}}" id="example-text-input"
                                       name="company_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div>
                                    <label>شماره پروانه شرکت</label>
                                    <div>
                                        <input class="form-control" type="number" value="{{old('license_number') ?? ''}}"
                                               id="example-number-input1" name="license_number">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label>شماره عضویت</label>
                                    <div>
                                        <input class="form-control" type="number" value="{{old('membership_number') ?? ''}}"
                                               id="example-number-input2" name="membership_number">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div>
                                    <label>شماره امضا شهرسازی</label>
                                    <div>
                                        <input class="form-control" type="number" value="{{old('signature_number') ?? ''}}"
                                               id="example-number-input3" name="signature_number">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">سمت مسئول شرکت در هیئت مدیره*</label>
                            <div class="col-sm-8">
                                <select class="custom-select" name="Responsible_side">
                                    <option selected>این منوی انتخاب را باز کنید</option>
                                    <option value="BOSS">رئیس هیئت مدیره</option>
                                    <option value="VEEP">نایب رئیس هیئت مدیره</option>
                                    <option value="MEMBER">عضو هیئت مدیره</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>گرایش خود را انتخاب کنید*</label>
                            <div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="trend[]" value="GEOTECHNIC"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck1">ژئو تکنیک</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="trend[]" value="CONCRETE"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck2">بتن</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="trend[]" value="SOLDER"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck3">جوش</label>
                                </div>

                            </div>
                        </div>


                        <!-- Loader -->
                        <div class="modal bs-example-modal" tabindex="-1" role="dialog">
                            <div role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">مشخصات مدیر عامل</h5>
                                    </div>
                                    <div>
                                        <div class="form-group row" style="padding-right: 10px;padding-left: 10px">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('CEO_name') ?? ''}}"
                                                               id="example-text-input5" name="CEO_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام خانوادگی </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('CEO_lastname') ?? ''}}"
                                                               id="example-text-input6" name="CEO_lastname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>کد ملی</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('CEO_id') ?? ''}}"
                                                               id="example-number-input7" name="CEO_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>شماره تماس</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('CEO_phone_number') ?? ''}}"
                                                               id="example-number-input" name="CEO_phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Loader -->
                        <!-- Loader -->
                        <div class="modal bs-example-modal" tabindex="-1" role="dialog"
                             style="padding-top: 10px;padding-bottom: 10px">
                            <div role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">رئیس هیئت مدیره</h5>
                                    </div>
                                    <div>
                                        <div class="form-group row" style="padding-right: 10px;padding-left: 10px">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('boss_name') ?? ''}}"
                                                               id="example-text-input5" name="boss_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام خانوادگی </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('boss_lastname') ?? ''}}"
                                                               id="example-text-input6" name="boss_lastname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>کد ملی</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('boss_id') ?? ''}}"
                                                               id="example-number-input7" name="boss_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>شماره تماس</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('boss_phone_number') ?? ''}}"
                                                               id="example-number-input" name="boss_phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Loader -->
                        <!-- Loader -->
                        <div class="modal bs-example-modal" style="padding-bottom: 10px" tabindex="-1"
                             role="dialog">
                            <div role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">اعضا هیئت مدیره</h5>
                                    </div>
                                    <div>
                                        <div class="form-group row" style="padding-right: 10px;padding-left: 10px">
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('member_name') ?? ''}}"
                                                               id="example-text-input5" name="member_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>نام خانوادگی </label>
                                                    <div>
                                                        <input class="form-control" type="text" value="{{old('member_lastname') ?? ''}}"
                                                               id="example-text-input6" name="member_lastname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>کد ملی</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('member_id') ?? ''}}"
                                                               id="example-number-input7" name="member_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div>
                                                    <label>شماره تماس</label>
                                                    <div>
                                                        <input class="form-control" type="number" value="{{old('member_phone_number') ?? ''}}"
                                                               id="example-number-input" name="member_phone_number">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- Loader -->

                        <div class="form-group">
                            <label>آدرس آزمایشگاه*</label>
                            <div>
                                    <textarea class="form-control" rows="5"
                                              name="Laboratory_address" >{{old('Laboratory_address') ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-4 col-form-label">شماره تماس
                                آزمایشگاه</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" value="{{old('Laboratory_phone_number') ?? ''}}" id="example-number-input"
                                       name="Laboratory_phone_number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>آدرس دفتر مرکزی*</label>
                            <div>
                                <textarea class="form-control" rows="5" name="office_address">{{old('office_address') ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-4 col-form-label">شماره تماس دفتر مرکزی*</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" value="{{old('office_phone_number')?? ''}}" id="example-number-input"
                                       name="office_phone_number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-4 col-form-label">ایمیل*</label>
                            <div class="col-sm-8">
                                <input type="email" name="company_email" class="form-control" value="{{old('company_email')?? ''}}"
                                       parsley-type="company_email" placeholder="وارد کردن ایمیل"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-4 col-form-label">شماره تماس جهت دریافت کد*</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" value="{{old('phone')?? ''}}" id="phone"
                                       name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-4 col-form-label">شماره شبای شرکت*</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" name="IDPay" value="{{old('IDPay')?? ''}}"
                                       placeholder="________________________"
                                       id="example-number-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-number-input" class="col-sm-4 col-form-label">شماره کارگاه
                                بیمه</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="number" name="Insurance_number" value="{{old('Insurance_number')?? ''}}"
                                       id="example-number-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-4 col-form-label">رمز عبور*</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" name="password" value=""
                                       id="example-password-input">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-password-input" class="col-sm-4 col-form-label">تایید رمز عبور*</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="password" name="password_confirmation" value=""
                                       id="example-password-input">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="Accept_rules"
                                           name="Accept_rules">
                                    <label class="custom-control-label font-weight-normal" for="Accept_rules">قبول میکنم *
                                        <a href="/rules" class="text-primary">شرایط و ضوابط </a></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">ثبت
                                    نام
                                </button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20 text-center">
                                <a href="pages-login.html" class="text-muted">در حال حاضر حساب کاربری دارید؟</a>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
