<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if ($this->article)
            return [
                'title'       => 'required|string|min:5|max:100',
                'category'    => 'required|array|min:1',
                'category.*'  => 'required|exists:categories,id',
                'access'      => 'required|string|max:10',
                'type'        => 'required|string|max:10',
                'status'      => 'required|boolean',
                'thumbnail'   => 'nullable|file|mimes:png,jpg,jpeg|max:2048',
                'pdf'         => 'nullable|string|max:191',
                'voice'       => 'nullable|string|max:191',
                'description' => 'nullable|string',
                'body'        => 'required|string',
                'tags'        => 'required|string',
                'time'        => 'required|string|max:5',
                'slug'        => "required|string|unique:articles,slug,{$this->article->id}|max:191"
            ];
        else
            return [
                'title'       => 'required|string|min:5|max:100',
                'category'    => 'required|array|min:1',
                'category.*'  => 'required|exists:categories,id',
                'access'      => 'required|string|max:10',
                'type'        => 'required|string|max:10',
                'status'      => 'required|boolean',
                'thumbnail'   => 'required|file|mimes:png,jpg,jpeg|max:2048',
                'pdf'         => 'nullable|string|max:191',
                'voice'       => 'nullable|string|max:191',
                'description' => 'nullable|string',
                'body'        => 'required|string',
                'tags'        => 'required|string',
                'time'        => 'required|string|max:5',
                'slug'        => "required|string|unique:articles,slug|max:191"
            ];
    }
}
