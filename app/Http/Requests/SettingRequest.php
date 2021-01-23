<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'set-slider'           => 'required|string|size:1',
            'set-social-whatsapp'  => 'required|string|size:13',
            'set-social-instagram' => 'required|string|max:20',
            'set-email'            => 'required|email|max:100',
            'set-phone'            => 'required|string|size:11'
        ];
    }
}
