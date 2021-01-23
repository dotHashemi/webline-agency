<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->feedback)
            return [
                'portfolio' => "nullable|exists:portfolios,id",
                'post'      => 'required|string|max:50',
                'customer'  => 'required|string|max:50',
                'thumbnail' => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
                'body'      => 'required|string',
                'selected'  => 'required|boolean'
            ];
        else
            return [
                'portfolio' => "nullable|exists:portfolios,id",
                'post'      => 'required|string|max:50',
                'customer'  => 'required|string|max:50',
                'thumbnail' => 'required|file|mimes:png,jpg,jpeg|max:2048',
                'body'      => 'required|string',
                'selected'  => 'required|boolean'
            ];
    }
}
