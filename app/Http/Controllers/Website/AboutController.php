<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\BaseController;
use App\Models\Option;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function show(Option $option)
    {
        $this->ValidateOption('about');

        $about = Option::where('key', 'about')->first();

        return view('website.about', compact('about'));
    }
}
