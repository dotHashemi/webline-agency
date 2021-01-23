<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'    => 'required|string|min:3|max:20',
            'email'   => 'required|email|min:5|max:100',
            'phone'   => 'required|string|min:11|max:13',
            'website' => 'nullable|string|min:5|max:100',
            'body'    => 'required|string'
        ];
    }
}
