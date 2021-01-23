<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class reCaptcha
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $data = [
                'secret' => config('services.recaptcha.secret'),
                'response' => $request->get('recaptcha'),
                'remoteip' => $remoteip
            ];
            $options = [
                'http' => [
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data)
                ]
            ];
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $resultJson = json_decode($result);

            if ($resultJson->success != true) {
                return back()->withErrors(['captcha' => 'خطا در تشخیص کپچا. لطفا مجدد تلاش کنید.']);
            }

            if ($resultJson->score >= 0.3) {
                return $next($request);
            } else {
                return back()->withErrors(['captcha' => 'خطا در تشخیص کپچا. لطفا مجدد تلاش کنید.']);
            }
        } catch (Exception $e) {
            $netError = "file_get_contents(): php_network_getaddresses: getaddrinfo failed: Name or service not known";
            if ($e->getMessage() == $netError)
                return $next($request);
            else
                return back()->withErrors(['captcha' => 'خطا در تشخیص کپچا. لطفا مجدد تلاش کنید.']);
        }
    }
}
