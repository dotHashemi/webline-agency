<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->category)
            return [
                'title' => "required|string|unique:categories,title,{$this->category->id}|min:3|max:50",
                'father' => "nullable|exists:categories,id"
            ];
        else
            return [
                'title' => "required|string|unique:categories,title|min:3|max:50",
                'father' => "nullable|exists:categories,id"
            ];
    }
}
