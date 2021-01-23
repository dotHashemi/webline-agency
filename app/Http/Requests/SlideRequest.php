<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->slide)
            return [
                'title'     => 'required|string|max:50',
                'link'      => 'required|string|max:191',
                'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'type'      => 'required|string|max:10',
                'status'    => 'required|boolean'
            ];
        else
            return [
                'title'     => 'required|string|max:50',
                'link'      => 'required|string|max:191',
                'thumbnail' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'type'      => 'required|string|max:10',
                'status'    => 'required|boolean'
            ];
    }
}
