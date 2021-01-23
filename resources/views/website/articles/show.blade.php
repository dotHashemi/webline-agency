@extends('website.layouts.master', [
    'meta' => $article->title,
    'title' => $article->title
]) 

@section('content')

<div class="border-bottom page-header-box">

    <div class="container">

        <h1 class="page-title">
            {{ $article->title }}
        </h1>

        <div class="d-flex flex-list justify-content-center">

            <div class="article-info">
                <span class="text-muted">
                    دسته:
                </span>
                @php
                    $count = count($article->categories);
                    $i = 0;
                @endphp
                @foreach ($article->categories as $key => $value)
                <span>
                    <a href="{{ route('app.blog.index', ['category' => $key]) }}"
                        target="blank">
                        {{ $value }}
                    </a>
                </span>
                @if(++$i != $count)
                {{ "،" }}
                @endif
                @endforeach
            </div>

            <div class="article-info">
                <span class="text-muted">
                    زمان مطالعه:
                </span>
                <span>
                    {{ $article->time }} دقیقه
                </span>
            </div>

            <div class="article-info">
                {{ $article->date }}
            </div>

        </div>

        <div>
            <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}" class="shadow-sm" />
        </div>

    </div>

</div>

<div class="bg-white">

    <div class="container portfolio-content-box my-5 py-3 text-right">

        <div class="page-body">

            @if($article->voice)
            <div class="voice-box">
                <div class="card mb-5">

                    <div class="card-header">
                        فایل صوتی این مقاله
                    </div>
                    
                    <div class="card-body text-center">
                        @if($valid)
                            <audio controls class="audio-box">
                                <source src="{{ $article->voice }}" type="audio/mpeg">
                            </audio>
                        @else
                            <button class="btn btn-webline" onclick="join()">
                                پخش فایل صوتی
                            </button>
                        @endif
                    </div>

                </div>
            </div>
            @endif

            <div>
                {!! $article->description !!}
            </div>
            @if($valid)
                <div>
                    {!! $article->body !!}
                </div>

                @if($article->pdf)
                <div class="card mt-5">
                    <div class="card-header">
                        فایل PDF این مقاله
                    </div>
                    <div class="card-body text-center">
                        <a href="{{ $article->pdf }}">
                            <button class="btn btn-webline">
                                دانلود فایل
                            </button>
                        </a>
                    </div>
                </div>
                @endif
            @else
                <div id="newsletter">
                    @include('website.articles.newsletter')
                </div>
            @endif
        </div>

    </div>

</div>

@endsection


@if(!$valid)

    @section('script')


    <script
        src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}">
    </script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config("services.recaptcha.sitekey") }}', {
                action: 'contact'
            }).then(function (token) {
                if (token) {
                    document.getElementById('recaptcha').value = token;
                }
            });
        });

        function join() {
            document.getElementById('newsletter').scrollIntoView();
        };

    </script>


    @endsection


@endif
