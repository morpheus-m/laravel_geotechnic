<div class="topbar">
    <div class="topbar-left	d-none d-lg-block">
        <div class="text-center">
            <a href="javascript:;" class="logo">
                <img src="{{asset('admin/assets/images/logo.png')}}" height="22" alt="logo">
            </a>
        </div>
    </div>

    <nav class="navbar-custom">

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input" type="search" placeholder="جستجو"/>
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link waves-effect toggle-search" href="#" data-target="#search-wrap">
                    <i class="mdi mdi-magnify noti-icon"></i>
                </a>
            </li>

            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                   role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="badge badge-danger badge-pill noti-icon-badge">3</span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg dropdown-menu-animated">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5>اعلانات (3)</h5>
                    </div>

                    <div class="slimscroll-noti">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>سفارش شما قرار داده شده است</b><span
                                    class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i>
                            </div>
                            <p class="notify-details"><b>پیام جدید دریافت شد</b><span class="text-muted">شما 87 پیام خوانده نشده دارید</span>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                            <p class="notify-details"><b>مورد شما حمل می شود</b><span class="text-muted">این یک واقعیت طولانی است که خواننده خواهد بود</span>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i>
                            </div>
                            <p class="notify-details"><b>پیام جدید دریافت شد</b><span class="text-muted">شما 87 پیام خوانده نشده دارید</span>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>سفارش شما قرار داده شده است</b><span
                                    class="text-muted">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</span>
                            </p>
                        </a>

                    </div>


                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item notify-all">
                        مشاهده همه
                    </a>

                </div>
            </li>


            <li class="list-inline-item dropdown notification-list nav-user">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                   role="button"
                   aria-haspopup="false" aria-expanded="false">
{{--                    <img src="{{asset('admin//assets/images/users/avatar-6.jpg')}}" alt="user" class="rounded-circle">--}}
                    <span class="d-none d-md-inline-block ml-1">
                        {{auth()->user()->getFullName()}}
                        <i class="fa fa-user px-1"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> پروفایل</a>
                    <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted"></i> کیف پول من</a>

                    <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted"></i> ارسال تیکت
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('auth.logout')}}"><i class="dripicons-exit text-muted"></i> خروج</a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>


        </ul>

    </nav>

</div>
