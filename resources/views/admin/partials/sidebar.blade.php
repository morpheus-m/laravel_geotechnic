<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="javascript:;" class="logo"><img src="{{asset('admin/assets/images/logo_dark.png')}}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul class="m-2">
                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span> داشبورد <span class="badge badge-success badge-pill float-right">3</span></span>
                    </a>
                </li>
                <li>
                    <a href="Your-status.html" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span> وضیعیت شما در سیستم <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> مدیریت مالی </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="Transactions.html">تراکنش ها</a></li>
                        <li><a href="Deposit-requests.html">درخواست های واریزی</a></li>
                        <li><a href="wallet.html">کیف پول</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-archive"></i> <span> مدیریت پرونده ها </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('admin.geotechnics.create')}}">ثبت پرونده ژئو تکنیک</a></li>
                        <li><a href="/pages/wellding/create">ثبت پرونده جوش</a></li>
                        <li><a href="/pages/concrete/create">ثبت پرونده بتن</a></li>
                        <li><a href="panel-Registered.html">پرونده های ثبت شده</a></li>

                    </ul>
                </li>

                <li>
                    <a href="Polls-and-voting.html" class="waves-effect">
                        <i class="dripicons-align-center"></i>
                        <span> نظر سنجی و رای گیری <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>
                <li>
                    <a href="Transparency.html" class="waves-effect">
                        <i class="dripicons-broadcast"></i>
                        <span> شفافیت <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>

                <li>
                    <a href="Corrective-cases.html" class="waves-effect">
                        <i class="dripicons-brush"></i>
                        <span> موارد اصلاحی <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
