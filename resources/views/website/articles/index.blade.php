@extends('website.layouts.master') 

@section('content')


<div class="border-bottom bg-light page-header-box">
    
    <div class="container">

        <div class="text-center">
            
            <div class="row justify-content-md-center">
                <div class="col-lg-6">

                    <div class="text-right text-secondary h5 my-4">
                        آیا به دنبال مقاله یا موضوع خاصی هستید؟
                    </div>

                    <div class="form-group">
                        <form action="{{ route("app.blog.index") }}" method="GET">
                            <input name="search" type="text" class="form-control search-input" placeholder="عنوان مورد نظر را جستجو کنید ...">
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<div class="container py-5">

    <div class="row text-center">

        @foreach($articles as $article)
            
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="cart">
                <div class="cart-body">
                    
                    <div class="item-image">
                        <a href="{{ route('app.blog.show', ['slug' => $article->slug]) }}">
                            <img
                                src="{{ $article->thumbnail }}"
                                alt="{{ $article->title }}"
                                {{-- class="portfolio-image" --}}
                            />
                        </a>
                    </div>

                    <div class="item-title text-right">
                        <a href="{{ route('app.blog.show', ['slug' => $article->slug]) }}">
                            {{ $article->title }}
                        </a>
                    </div>

                    <div class="item-subtitle text-right">
                        @php
                        $count = count($article->categories);
                        $i = 0;
                        @endphp
                        @foreach ($article->categories as $key => $value)
                        <a href="{{ route('app.blog.index', ['category' => $key]) }}">
                            {{ $value }}
                        </a>
                        @if(++$i != $count)
                        {{ "،" }}
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>


@endsection
