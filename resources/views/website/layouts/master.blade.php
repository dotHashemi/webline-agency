<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="description" content="{{ ucfirst($meta ?? 'تحولی نو') }}" />
    <meta name="author" content="Webline Agency" />
    
    <title>
        آژانس دیجیتال مارکتینگ وبلاین | {{ ucfirst($title ?? 'تحولی نو') }}
    </title>

    <link rel="stylesheet" href="/components/bootstrap/css/bootstrap.min.css" />

    <link rel="icon" href="/media/assets/favicon.png" type="image/x-icon" />

    <link rel="stylesheet" href="/components/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="/css/website.css" />
</head>

<body>
    <header class="header">
        @include('website.layouts.header')
    </header>

    <div class="content">
        @yield('content')
    </div>

    <footer class="footer">
        @include('website.layouts.footer')
    </footer>

    <script src="/components/jquery/jquery.js"></script>
    <script src="/components/bootstrap/js/bootstrap.min.js"></script>
    @yield('script')
</body>

</html>
