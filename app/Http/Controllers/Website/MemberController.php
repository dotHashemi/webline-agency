<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\MemberRequest;
use App\Models\Member;

class MemberController extends AdminController
{
    public function join(MemberRequest $request)
    {
        $input = $request->only('name', 'email', 'phone', 'tags', 'isSMSNewsLetter', 'isEmailNewsLetter');

        $byEmail = Member::where('email', $input['email'])->first();
        $byPhone = Member::where('phone', $input['phone'])->first();

        $input['email'] = strtolower($input['email']);
        $input['phone'] = $this->FormatNumber($input['phone']);

        if ($byEmail == null) {
            if ($byPhone == null) {
                // Because the Cloudfare: It changes the client ip.
                $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $input['ip'] = strlen($ip) <= 15 ? $ip : "0.0.0.0";
                Member::create($input);
                return redirect($request->redirect)->withCookie(cookie()->forever('newsletter', $input['phone']));
            } else {
                return redirect($request->redirect)->withErrors(['phone' => 'شماره تلفن وارد شده از قبل وجود دارد.']);
            }
        } else {
            if ($byPhone == null) {
                return redirect($request->redirect)->withErrors(['email' => 'ایمیل وارد شده از قبل وجود دارد.']);
            } else if ($byPhone == $byEmail) {
                return redirect($request->redirect)->withCookie(cookie()->forever('newsletter', $input['phone']));
            } else {
                return redirect($request->redirect)->withErrors(['email' => 'ایمیل وارد شده از قبل وجود دارد.']);
            }
        }
    }
}
