<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutRequest;
use App\Models\Option;
use Carbon\Carbon;

class AboutController extends AdminController
{
    public function edit()
    {
        $this->ValidateOption('about');

        $about = Option::where('key', 'about')->first();

        return view('admin.about', compact('about'));
    }


    public function update(AboutRequest $request, Option $option)
    {
        $input = $request->only('value', 'tags');
        $input['updated'] = Carbon::now();

        $option->update($input);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.about.edit');
    }
}
