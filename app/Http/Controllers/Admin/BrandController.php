<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends AdminController
{
    public function index(Request $request)
    {
        $brands = Brand::orderBy('id', 'DESC')->get();

        return view('admin.brands.index', compact('brands'));
    }


    public function create()
    {
        return view('admin.brands.create');
    }


    public function store(BrandRequest $request)
    {
        $inputs = $request->only('name', 'thumbnail');

        $image = $this->upload($request->file('thumbnail'), 'brands');

        if (!$image['status'])
            return redirect()->route('admin.brands.create');

        $inputs['thumbnail'] = $image['url'];

        Brand::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.brands.index');
    }


    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }


    public function update(BrandRequest $request, Brand $brand)
    {
        $inputs = $request->only('name', 'thumbnail');

        if ($request->file('thumbnail')) {
            $image = $this->upload($request->file('thumbnail'), 'brands');

            if (!$image['status'])
                return redirect()->route('admin.brands.create');

            $inputs['thumbnail'] = $image['url'];
        }

        $brand->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.brands.index');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.brands.index');
    }
}
