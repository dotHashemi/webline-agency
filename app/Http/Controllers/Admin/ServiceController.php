<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends AdminController
{
    public function index(Request $request)
    {
        $services = Service::orderBy('order')->get();

        return view('admin.services.index', compact('services'));
    }


    public function create()
    {
        return view('admin.services.create');
    }


    public function store(ServiceRequest $request)
    {
        $inputs = $request->only('title', 'description', 'tags', 'body', 'order', 'icon', 'slug');

        Service::create($inputs);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.services.index');
    }


    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }


    public function update(ServiceRequest $request, Service $service)
    {
        # Check ServiceRequest for update
        $inputs = $request->only('title', 'description', 'tags', 'body', 'order', 'icon', 'slug');

        $inputs['updated'] = Carbon::now();

        $service->update($inputs);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.services.index');
    }


    public function destroy(Service $service)
    {
        $service->delete();

        alert()->success($this->alerts['delete']);
        return redirect()->route('admin.services.index');
    }
}
