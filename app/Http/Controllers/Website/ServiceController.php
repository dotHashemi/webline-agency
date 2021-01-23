<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        //
    }
    

    public function show(Request $request, $slug)
    {
        $service = Service::where('slug', $slug)->first();

        return view('website.services.show', compact('service'));
    }
}
