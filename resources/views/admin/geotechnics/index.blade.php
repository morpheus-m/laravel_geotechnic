@extends('layout.admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">پرونده های ثبت شده</h4>
                    </div>

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>

        <div class="col-lg-12 col-md-12">

            <div class="col-md-12">
                <div style="padding-right: 20px;padding-left: 20px;font-size: larger">
                    <div class="alert alert-info" role="alert">
                        <strong><b>جستجو و گزارش گیری</b></strong>
                    </div>
                </div>
                <div class="row" style="padding-right: 20px;padding-left: 20px">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div id="accordion">
                                    <div class="card mb-0">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0 mt-0 font-14">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseOne" aria-expanded="false"
                                                   aria-controls="collapseOne"
                                                   style="text-align: center;font-size: larger" class="text-dark">
                                                    جستجو
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show"
                                             aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-12">

                                                        <div class="col-lg-12">
                                                            <input class="form-control" type="search"
                                                                   value="" id="example-search-input">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="button-items" style="text-align: center">
                                                                <button type="button"
                                                                        class="btn btn-primary btn-lg btn-block waves-effect waves-light">
                                                                    جستجو
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-0">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0 mt-0 font-14">
                                                <a class="collapsed text-dark"
                                                   style="text-align: center;font-size: larger" data-toggle="collapse"
                                                   data-parent="#accordion" href="#collapseTwo"
                                                   aria-expanded="false" aria-controls="collapseTwo">
                                                    گزارشگیری
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-4" style="padding-top: 20px">
                                                        <label for="example-number-input">از تاریخ</label>
                                                        <input class="form-control" type="date" value="2011-08-19"
                                                               id="example-date-input">
                                                    </div>
                                                    <div class="col-sm-4" style="padding-top: 20px">
                                                        <label for="example-number-input2">تا تاریخ</label>
                                                        <input class="form-control" type="date" value="2011-08-19"
                                                               id="example-date-input2">
                                                    </div>
                                                    <div class="col-sm-4" style="padding-top: 20px">
                                                        <label>نوع پرونده را انتخاب کنید</label>
                                                        <select class="form-control">
                                                            <option>پرونده خاک</option>
                                                            <option>پرونده جوش</option>
                                                            <option>پرونده بتن</option>
                                                            <option>پرونده های بدهکار</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group row">
                                                            <div class="card-body">
                                                                <div class="button-items" style="text-align: center">
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-lg btn-block waves-effect waves-light">
                                                                        گزارش گیری
                                                                    </button>
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
                    </div>
                    <div style="padding-right: 20px;width:100%;padding-left: 20px;font-size: larger">
                        <div class="alert alert-info" role="alert">
                            <strong><b>لیست پرونده ها</b></strong>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row" style="padding-right: 20px;padding-left: 20px">
                                            <div class="col-12">
                                                <div class="card m-b-30">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <table id="datatable"
                                                                       class="table table-bordered dt-responsive nowrap"
                                                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>ردیف</th>
                                                                        <th> شماره ثبت دستور نقشه </th>
                                                                        <th>شماره تماس مالک</th>
                                                                        <th>متراژ کل بنا</th>
                                                                        <th>نوع زمین</th>

                                                                        <th>تعداد اقساط</th>
                                                                        <th>هزینه کل</th>
                                                                        <th>تاریخ ثبت</th>

                                                                        <th>اقدامات</th>
                                                                    </tr>
                                                                    </thead>


                                                                    <tbody>
                                                                    @foreach($geotechnics as $key => $geotechnic)
                                                                        <tr>
                                                                            <td>{{ ++$key }}</td>
                                                                            <td>{{$geotechnic->map_registration_number}}</td>
                                                                            <td>{{$geotechnic->owner->mobile}}</td>
                                                                            <td>{{$geotechnic->total_building_area}}</td>
                                                                            <td>{{$geotechnic->land()}}</td>
                                                                            <td>{{count($geotechnic->installments) . ' قسط '}}</td>
                                                                            <td>{{number_format($geotechnic->total_cost)}} تومان</td>

                                                                            <td>{{$geotechnic->created_at}}</td>
                                                                            <td>
                                                                                <div class="text-center">
                                                                                    <button type="button"
                                                                                            class="btn btn-primary waves-effect waves-light"
                                                                                            data-toggle="modal"
                                                                                            data-target=".bs-example-modal-center">
                                                                                        مشاهده جزئیات
                                                                                    </button>
                                                                                    <button type="button"
                                                                                            class="btn btn-purple waves-effect waves-light"
                                                                                            data-toggle="modal"
                                                                                            data-target=".bs-example-modal-center">
                                                                                        مشاهده اقساط
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
