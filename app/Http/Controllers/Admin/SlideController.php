<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends AdminController
{
    public function index(Request $request)
    {
        $slides = Slide::orderBy('id', 'DESC')->get();

        return view('admin.slides.index', compact('slides'));
    }


    public function create()
    {
        return view('admin.slides.create');
    }


    public function store(SlideRequest $request)
    {
        $inputs = $request->only('title', 'link', 'status', 'type');

        $image = $this->upload($request->file('thumbnail'), 'slides');

        if (!$image['status'])
            return redirect()->route('admin.slides.create');

        $inputs['thumbnail'] = $image['url'];

        Slide::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.slides.index');
    }


    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }


    public function update(SlideRequest $request, Slide $slide)
    {
        # Check ServiceRequest for update
        $inputs = $request->only('title', 'link', 'status', 'type');

        if ($request->file('thumbnail')) {
            $image = $this->upload($request->file('thumbnail'), 'slides');

            if (!$image['status'])
                return redirect()->route('admin.slides.create');

            $inputs['thumbnail'] = $image['url'];
        }

        $slide->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.slides.index');
    }


    public function destroy(Slide $slide)
    {
        $slide->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.slides.index');
    }
}
