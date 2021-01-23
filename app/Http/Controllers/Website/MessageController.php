<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create()
    {
        return view('website.contact');
    }


    public function store(MessageRequest $request)
    {
        $inputs = $request->only('name', 'email', 'phone', 'website', 'body');

        Message::create($inputs);

        session()->flash('success', 'پیغام شما با موفقیت ارسال شد.');
        return redirect()->route('app.messages.create');
    }
}
