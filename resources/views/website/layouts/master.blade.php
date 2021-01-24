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
    <header class="header">@include('website.layouts.header')</header>

    <div class="content">@yield('content')</div>

    <footer class="footer">@include('website.layouts.footer')</footer>

    <script src="/components/jquery/jquery.js"></script>
    <script src="/components/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        !(function () {
            function t() {
                var t = document.createElement("script");
                (t.type = "text/javascript"),
                (t.async = !0),
                localStorage.getItem("rayToken") ?
                    (t.src =
                        "https://app.raychat.io/scripts/js/" +
                        o +
                        "?rid=" +
                        localStorage.getItem("rayToken") +
                        "&href=" +
                        window.location.href) :
                    (t.src =
                        "https://app.raychat.io/scripts/js/" +
                        o +
                        "?href=" +
                        window.location.href);
                var e = document.getElementsByTagName("script")[0];
                e.parentNode.insertBefore(t, e);
            }
            var e = document,
                a = window,
                o = "bde0b1e9-2dc3-4c66-9e4b-8411f88bf96d";
            "complete" == e.readyState ?
                t() :
                a.attachEvent ?
                a.attachEvent("onload", t) :
                a.addEventListener("load", t, !1);
        })();

    </script>
    @yield('script')
</body>

</html>
