@extends('website.layouts.master') @section('content')

<div class="border-bottom bg-light page-header-box">
    
    <div class="container">

        <div class="d-flex justify-content-between">

            <h2>
                {{ $service->title }}
            </h2>

            <a href="{{ $service->path() }}" target="blank">
                <button class="btn btn-webline unrounded">
                    مشاهده‌ی نمونه‌کارهای این دسته
                </button>
            </a>

        </div>

    </div>

</div>

<div class="bg-white">

    <div class="container portfolio-content-box mt-5 py-3 text-right">

        <div class="page-body">
            {!! $service->body !!}
        </div>

        <div class="d-flex align-items-center page-tags mt-5">
            <span class="ml-2 text-muted">
                برچسب‌ها: 
            </span>
            <ul class="text-muted d-flex flex-list">
                @foreach(explode('،', $service->tags) as $tag)
                <li class="page-tags-item m-1">{{ $tag }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</div>

@endsection
