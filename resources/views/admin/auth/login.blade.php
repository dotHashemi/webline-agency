<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>ورود به پنل</title>

        <!-- Bootstrap core CSS -->
        <link href="/components/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/components/fontawesome/css/all.min.css" />

        <link href="/css/login.css" rel="stylesheet">
    </head>

    <body class="text-center">
        
        <form action="{{ route('admin.auth.authenticate') }}" method="POST" class="form-signin">
            @csrf
            
            <h1 class="h3 mb-3 font-weight-normal">{{ env('APP_NAME') }}</h1>

            <input type="hidden" name="recaptcha" id="recaptcha">

            <input name="email" type="email" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
            
        </form>

        <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
        <script>
             grecaptcha.ready(function() {
                 grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'login'}).then(function(token) {
                    if (token) {
                      document.getElementById('recaptcha').value = token;
                    }
                 });
             });
        </script>
    
    </body>
</html>
