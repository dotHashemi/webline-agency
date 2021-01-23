<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FeedbackController extends AdminController
{
    public function index(Request $request)
    {
        $feedback = Feedback::orderBy('id', 'DESC')->get();

        return view('admin.feedback.index', compact('feedback'));
    }


    public function create()
    {
        $portfolios = Portfolio::orderBy('updated', 'DESC')->get();

        return view('admin.feedback.create', compact('portfolios'));
    }


    public function store(FeedbackRequest $request)
    {
        $inputs = $request->only('portfolio', 'customer', 'post', 'body', 'selected');

        $image = $this->upload($request->file('thumbnail'), 'feedback');

        if (!$image['status'])
            return redirect()->route('admin.feedback.create');

        $inputs['thumbnail'] = $image['url'];

        Feedback::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.feedback.index');
    }


    public function edit(Feedback $feedback)
    {
        $portfolios = Portfolio::orderBy('updated', 'DESC')->get();

        return view('admin.feedback.edit', compact('portfolios', 'feedback'));
    }


    public function update(FeedbackRequest $request, Feedback $feedback)
    {
        # Check ServiceRequest for update
        $inputs = $request->only('portfolio', 'customer', 'post', 'body', 'selected');

        if ($request->file('thumbnail')) {
            $image = $this->upload($request->file('thumbnail'), 'portfolio');

            if (!$image['status'])
                return redirect()->route('admin.feedback.create');

            $inputs['thumbnail'] = $image['url'];
        }

        $feedback->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.feedback.index');
    }


    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.feedback.index');
    }
}
