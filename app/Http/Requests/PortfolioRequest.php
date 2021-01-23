<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->portfolio)
            return [
                'title'     => 'required|string|max:50',
                'service'   => 'required|exists:services,id',
                'customer'  => 'required|string|max:50',
                'thumbnail' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
                'link'      => 'nullable|string|max:191',
                'body'      => 'required|string',
                'tags'      => 'required|string',
                'slug'      => "required|string|unique:portfolios,slug,{$this->portfolio->id}|max:191"
            ];
            else
            return [
                'title'     => 'required|string|max:50',
                'service'   => 'required|exists:services,id',
                'customer'  => 'required|string|max:50',
                'thumbnail' => 'required|file|mimes:png,jpg,jpeg|max:2048',
                'link'      => 'nullable|string|max:191',
                'body'      => 'required|string',
                'tags'      => 'required|string',
                'slug'      => "required|string|unique:portfolios,slug|max:191"
            ];
    }
}
