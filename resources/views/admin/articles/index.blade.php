@extends('admin.layouts.master') @section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        مقاله‌ها
    </div>

    <a href="{{ route('admin.articles.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن مقاله
        </button>
    </a>

</div>


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-5">
            عنوان
        </div>
        <div class="col-3">
            بازدید
        </div>
        <div class="col-1 text-center">
            وضعیت
        </div>
        <div class="col-3">
            ابزار
        </div>
    </div>
</div>


@foreach($articles as $article)

    <div class="cart shadow-sm p-3 mb-1">
        <div class="cart-body unrounded">
            <div class="row">
                <div class="col-5">
                    {{ $article->title }}
                </div>
                <div class="col-3">
                    {{ $article->view }}
                </div>
                <div class="col-1 text-center">
                    @if($article->status)
                    فعال
                    @else
                    غیرفعال
                    @endif
                </div>
                <div class="col-3">
                    <div class="d-flex">
                        <a href="{{ route('admin.articles.edit', ['article'=>$article->id]) }}"
                            class="px-1">
                            <button class="badge btn-primary">ویرایش</button>
                        </a>
                        <form
                            action="{{ route('admin.articles.destroy', ['article'=>$article->id]) }}"
                            method="POST" class="px-1">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach

<div class="p-3">
    @include('admin.layouts.paginator', ['paginator' => $articles])
</div>

@endsection
