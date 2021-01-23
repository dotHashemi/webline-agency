<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticleController extends AdminController
{
    public function index(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'search' => 'nullable|string|max:30'
        ]);

        $articles = Article::orderBy('id', 'DESC')->paginate(10);

        return view("admin.articles.index", compact("articles"));
    }


    public function create()
    {
        $categories = Category::orderBy("title")->get();

        return view("admin.articles.create", compact("categories"));
    }


    public function store(ArticleRequest $request)
    {
        $inputs = $request->only(
            'category',
            'access',
            'type',
            'title',
            'thumbnail',
            'pdf',
            'voice',
            'description',
            'body',
            'tags',
            'slug',
            'status',
            'time'
        );

        $user = $request->get("user");

        $image = $this->upload($request->file('thumbnail'), 'articles');

        if (!$image['status'])
            return redirect()->route('admin.articles.create');

        $inputs['thumbnail'] = $image['url'];

        $article = $user->articles()->create($inputs);
        $article->categories()->attach($inputs['category']);

        alert()->success($this->alerts['create']);
        return redirect()->route('admin.articles.index');
    }


    public function edit(Article $article)
    {
        $categories = Category::orderBy('title')->get();

        return view('admin.articles.edit', compact('article', 'categories'));
    }


    public function update(ArticleRequest $request, Article $article)
    {
        $inputs = $request->only(
            'category',
            'access',
            'type',
            'title',
            'thumbnail',
            'pdf',
            'voice',
            'description',
            'body',
            'tags',
            'slug',
            'status',
            'time'
        );

        if ($request->file('thumbnail')) {
            $image = $this->upload($request->file('thumbnail'), 'articles');

            if (!$image['status'])
                return redirect()->route('admin.articles.create')->withErrors(["upload" => "خطا در بارگذاری."]);

            $inputs['thumbnail'] = $image['url'];
        }

        $inputs['updated'] = Carbon::now();

        $article->update($inputs);
        $article->categories()->sync($inputs['category']);

        alert()->success($this->alerts['update']);
        return redirect()->route('admin.articles.index');
    }


    public function destroy(Article $article)
    {
        try {
            $article->delete();
            alert()->success($this->alerts['delete']);
            return redirect()->route('admin.articles.index');
        } catch (Exception $e) {
            return redirect()->route('admin.articles.index')
                ->withErrors(['database' => 'نظراتی برای این مقاله ثبت شده‌است.']);
        }
    }
}
