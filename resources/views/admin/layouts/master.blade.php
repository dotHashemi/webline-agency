<!DOCTYPE html>
<html lang="en" dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="robots" content="noindex" />

        <title>پیشخان وبلاین</title>

        <link href="/components/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/components/bootstrap/css/bootstrap-select.css">
        <link rel="stylesheet" href="/components/fontawesome/css/all.min.css" />
        <link href="/css/admin.css" rel="stylesheet" />
        <script src="/components/sweet-alert/sweet-alert.js"></script>
    </head>

    <body>
        @include('sweet::alert')

        @include('admin.layouts.header')

        <div class="container-fluid">
            <div class="row justify-content-end text-right">
      
                @include('admin.layouts.sidebar')

                <div class="col-md-9 col-lg-10 p-0">
                    @yield('content')
                </div>

            </div>
        </div>

        <script src="/components/jquery/jquery.js"></script>
        <script src="/components/bootstrap/js/popper.js"></script>
        <script src="/components/bootstrap/js/bootstrap.min.js"></script>
        <script src="/components/bootstrap/js/bootstrap-select.js"></script>

        @yield('script')

    </body>
</html>
