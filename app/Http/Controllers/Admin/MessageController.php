<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends AdminController
{
    public function index(Request $request)
    {
        $messages = Message::orderBy('id', 'DESC')->get();

        return view('admin.messages.index', compact('messages'));
    }


    public function show(Message $message)
    {
        if (!$message->isReaded)
            $message->update(['isReaded' => true]);

        return view('admin.messages.show', compact('message'));
    }


    public function destroy(Message $message)
    {
        $message->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.messages.index');
    }
}
