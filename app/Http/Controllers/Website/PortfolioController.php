<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'service' => 'nullable|regex:/^[1-9][0-9]*$/i|max:5|exists:services,id'
        ]);

        if ($validation->fails()) {
            return redirect()->route('app.portfolio.index');
        }

        if ($request->service) {
            $portfolios = DB::table('portfolios as po')
                ->join(
                    DB::raw("(
                        SELECT id, title FROM services
                        WHERE id = {$request->service}
                    ) AS se"),
                    function ($join) {
                        $join->on('po.service', 'se.id');
                    }
                )
                ->select(
                    'po.title as title',
                    'se.id as sid',
                    'se.title as service',
                    'po.thumbnail as thumbnail',
                    'po.slug as slug'
                )
                ->orderBy('po.updated', 'DESC')
                ->get();
        } else {
            $portfolios = DB::table('portfolios as po')->join('services as se', 'po.service', 'se.id')
                ->select(
                    'po.title as title',
                    'se.id as sid',
                    'se.title as service',
                    'po.thumbnail as thumbnail',
                    'po.slug as slug'
                )
                ->orderBy('po.updated', 'DESC')
                ->get();
        }

        $services = DB::table('services as se')
            ->join(
                DB::raw("(
                        SELECT DISTINCT service FROM portfolios
                    ) AS po"),
                function ($join) {
                    $join->on('po.service', 'se.id');
                }
            )
            ->select(
                'se.id as id',
                'se.title as title'
            )
            ->orderBy('se.order')
            ->get();

        return view('website.portfolios.index', compact('portfolios', 'services'));
    }


    public function show(Request $request, $slug)
    {
        $portfolio = Portfolio::where('slug', $slug)->first();

        return view('website.portfolios.show', compact('portfolio'));
    }
}
