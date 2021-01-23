<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\BaseController;
use App\Models\Article;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Member;
use App\Models\Option;
use App\Models\Service;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppController extends BaseController
{
    public function index(Request $request)
    {
        // $this->ValidateOption('set-slider');

        $services = Service::orderBy('order')->get();

        $portfolios = DB::table('portfolios as po')->join('services as se', 'po.service', 'se.id')
            ->select(
                'po.title as title',
                'se.title as service',
                'po.thumbnail as thumbnail',
                'po.slug as slug'
            )
            ->orderBy('po.updated', 'DESC')
            ->get();

        $feedback = Feedback::where('selected', true)->orderBy('id', 'DESC')->get();
        $slides = Slide::where('status', true)->orderBy('id', 'DESC')->get();


        $articles = Article::where('status', true)
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get();

        foreach ($articles as $article)
            $article->categories = $article->categories->pluck('title', 'id')->toArray();


        $brands = Brand::orderBy('id', 'DESC')->get();

        return view('website.index', compact('services', 'portfolios', 'feedback', 'slides', 'brands', 'articles'));
    }


    public function secrets(Request $request)
    {
        $input = array('email' => $request->cookie('secrets'));

        $validation = Validator::make($input, [
            'email' => 'nullable|string|email|max:100'
        ]);

        $member = Member::where('email', $input['email'])->first();
        $valid = false;

        if ($member) {
            $valid = true;
        }

        return view('website.secrets', compact('valid'));
    }
}
