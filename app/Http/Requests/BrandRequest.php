<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->brand)
            return [
                'name'      => "required|string|unique:brands,name,{$this->brand->id}|max:20",
                'thumbnail' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
            ];
        else
            return [
                'name'      => "required|string|unique:brands,name|max:20",
                'thumbnail' => 'required|file|mimes:png,jpg,jpeg|max:2048'
            ];
    }
}
