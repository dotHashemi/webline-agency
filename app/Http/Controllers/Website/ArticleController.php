<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\Jalalian;

class ArticleController extends AppController
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'search'   => 'nullable|string|max:30',
            'category' => 'nullable|string|exists:categories,id'
        ]);

        if ($validation->fails()) {
            return redirect()->route("admin.articles.index");
        }

        $search = "%" . $request->search . "%";
        $category = $request->category;

        if ($category) {
            $categories = (Category::find($category))->articles->pluck('id')->toArray();
            $articles = Article::whereIn('id', $categories)
                ->where('status', true)
                ->select(
                    'id',
                    'title',
                    'thumbnail',
                    'slug'
                )
                ->orderBy('id', 'DESC')
                ->paginate(10);

            foreach ($articles as $article)
                $article->categories = $article->categories->pluck('title', 'id')->toArray();
        } else {
            $articles = Article::where('status', true)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            foreach ($articles as $article)
                $article->categories = $article->categories->pluck('title', 'id')->toArray();
        }

        return view('website.articles.index', compact('articles'));
    }


    public function show(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->first();

        if (!$article)
            return redirect()->route("app.articles.index");

        $article->view = $article->view + 1;
        $article->save();

        $article->date = Jalalian::fromCarbon(new Carbon($article->created))->format('%d %B %y');

        $valid = false;
        if ($article->access == "normal") {
            $valid = true;
        } else if ($article->access == "newsletter") {
            $input = array('phone' => $request->cookie('newsletter'));

            $validation = Validator::make($input, [
                'phone' => 'required|string|min:10|max:15'
            ]);

            if (!$validation->fails()) {
                $member = Member::where('phone', $input['phone'])->exists();
                if ($member)
                    $valid = true;
            }

        } else {
            #TODO; add for register and vip articles
        }

        $article->categories = $article->categories->pluck('title', 'id')->toArray();

        return view("website.articles.show", compact("article", "valid"));
    }
}
