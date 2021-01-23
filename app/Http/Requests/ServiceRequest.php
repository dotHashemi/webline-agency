<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->service)
            return [
                'title'       => "required|string|max:50|unique:services,title, {$this->service->id}",
                'description' => 'required|string|max:191',
                'tags'        => 'required|string',
                'order'       => 'nullable|max:2',
                'icon'        => 'required|string|max:20',
                'slug'        => "required|string|unique:services,slug, {$this->service->id}"
            ];
        else
            return [
                'title'       => 'required|string|max:50|unique:services,title',
                'description' => 'required|string|max:191',
                'tags'        => 'required|string',
                'order'       => 'nullable|max:2',
                'icon'        => 'required|string|max:20',
                'slug'        => 'required|string|unique:services,slug'
            ];
    }
}
