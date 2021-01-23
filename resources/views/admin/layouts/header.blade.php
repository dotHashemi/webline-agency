<div class="container-fluid admin-navbar">
    <div class="row">

        <div class="navbar-brand col-sm-2 col-md-2 mr-0 text-center">
            پیشخان وبلاین
        </div>

        <div class="col-10 text-left d-flex align-items-center justify-content-end">

            <div class="dropdown">
                <button class="btn btn-warning btn-sm" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    گزینه‌ها
                </button>
                <div class="dropdown-menu text-right shadow-sm border-0">
                    <a class="dropdown-item" href="{{ route('app.index') }}">
                        وب‌سایت
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('admin.auth.logout') }}">
                        خروج
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
