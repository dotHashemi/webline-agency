<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email'             => 'required|email|min:7|max:100',
            'phone'             => 'required|string|size:11',
            'name'              => 'required|string|min:3|max:50',
            'isSMSNewsLetter'   => 'nullable|boolean',
            'isEmailNewsLetter' => 'nullable|boolean',
            'tags'              => 'nullable|string'
        ];
    }
}
