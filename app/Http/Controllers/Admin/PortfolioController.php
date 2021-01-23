<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortfolioController extends AdminController
{
    public function index(Request $request)
    {
        $portfolios = Portfolio::orderBy('updated', 'DESC')->get();

        return view('admin.portfolios.index', compact('portfolios'));
    }


    public function create()
    {
        $services = Service::orderBy('order')->get();

        return view('admin.portfolios.create', compact('services'));
    }


    public function store(PortfolioRequest $request)
    {
        $inputs = $request->only('service', 'title', 'customer', 'link', 'body', 'tags', 'slug');

        $image = $this->upload($request->file('thumbnail'), 'portfolio');

        if (!$image['status'])
            return redirect()->route('admin.portfolio.create');

        $inputs['thumbnail'] = $image['url'];

        Portfolio::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.portfolio.index');
    }


    public function edit(Portfolio $portfolio)
    {
        $services = Service::orderBy('order')->get();

        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }


    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        # Check ServiceRequest for update
        $inputs = $request->only('service', 'title', 'customer', 'link', 'body', 'tags', 'slug');

        if ($request->file('thumbnail')) {
            $image = $this->upload($request->file('thumbnail'), 'portfolio');

            if (!$image['status'])
                return redirect()->route('admin.portfolio.create');

            $inputs['thumbnail'] = $image['url'];
        }

        $inputs['updated'] = Carbon::now();

        $portfolio->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.portfolio.index');
    }


    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.portfolio.index');
    }
}
