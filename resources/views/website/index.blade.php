@extends('website.layouts.master')

@section('content')

@include('website.slider')


<div class="bg-light">
    <div class="container py-5 text-center">

        <div class="mb-5">
            <h2>خدمات ما</h2>
        </div>

        <div class="row">

            @foreach($services as $service)

            <div class="col-lx-3 col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="cart service-cart border border-light-1">
                    <a href="{{ $service->path() }}">
                        <div class="cart-body">

                            <div class="service-cart-icon mt-3">
                                <i class="{{ $service->icon }}"></i>
                            </div>

                            <h5 class="mb-4">
                                {{ $service->title }}
                            </h5>

                            <p class="my-3 text-secondary">
                                {{ $service->description }}
                            </p>

                        </div>
                    </a>
                </div>
            </div>

            @endforeach

        </div>

    </div>
</div>



@if(!$portfolios->isEmpty())
<div class="container py-5">

    <div class="row mb-5">

        <div class="col-lg-8 col-md-8 col-sm-12 text-right mobile-text-center">
            <h2>نمونه‌کارها</h2>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 mobile-text-center m-mobile">
            <a href="{{ route('app.portfolio.index') }}">
                <button class="btn btn-sm btn-webline">مشاهده‌ی نمونه‌کارها</button>
            </a>
        </div>

    </div>

    <div class="row text-center">

        @foreach($portfolios as $portfolio)

        <div class="col-lg-3 col-md-4 mb-4">
            <div class="cart">
                <div class="cart-body bg-light portfolio-cart">

                    <div class="portfolio-cart-image">
                        <a href="{{ route('app.portfolio.show', ['slug' => $portfolio->slug]) }}">

                            <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->title }}"
                                class="portfolio-image" />

                        </a>
                    </div>

                    <div class="pt-2">
                        <a href="{{ route('app.portfolio.show', ['slug' => $portfolio->slug]) }}" class="item-title">
                            {{ $portfolio->title }}
                        </a>
                    </div>

                    <div class="item-subtitle">
                        {{ $portfolio->service }}
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>

</div>
@endif



<div class="container py-5">

    <div class="row mb-5">

        <div class="col-lg-8 col-md-8 col-sm-12 text-right mobile-text-center">
            <h2>آخرین مقاله‌ها</h2>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12 mobile-text-center m-mobile">
            <a href="{{ route('app.blog.index') }}">
                <button class="btn btn-sm btn-webline">مشاهده‌ی مقاله‌ها</button>
            </a>
        </div>

    </div>

    <div class="row text-center">

        @foreach($articles as $article)

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="cart">
                <div class="cart-body">

                    <div class="item-image">
                        <a href="{{ route('app.blog.show', ['slug' => $article->slug]) }}">
                            <img src="{{ $article->thumbnail }}" alt="{{ $article->title }}" />
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



@if(!$feedback->isEmpty())
<div class="bg-light">
    <div class="container py-5">

        <div class="row mb-5">

            <div class="col-lg-8 col-md-8 col-sm-12 text-right mobile-text-center">
                <h2>نظرات مشتریان</h2>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 mobile-text-center m-mobile">
                <button class="btn btn-sm btn-webline">مشاهده‌ی نظرات مشتریان</button>
            </div>

        </div>


        <div class="row">

            @foreach($feedback as $item)

            @php
            $dot = 'dot' . $item->id;
            $more = 'more' . $item->id;
            $btn = 'btn' . $item->id;
            $words = Str::words($item->body, 30, '');
            $after = Str::of($item->body)->after($words);
            $state = $after == ""?'display:none;':'';
            @endphp

            <div class="col-lx-6 col-lg-6 col-md-12 col-sm-12 mb-3">
                <div class="cart">
                    <div class="cart-body customer-cart text-right">

                        <div class="page-body text-right">
                            {!! $words !!}
                            <span id="{{ $dot }}" style="{{ $state }}">...</span>
                            <span id="{{ $more }}" style="display: none;">
                                {!! $after !!}
                            </span>
                            <div class="text-left">
                                <button onclick="readMore({{ $dot }}, {{ $more }}, {{ $btn }})" id="{{ $btn }}"
                                    class="btn btn-sm btn-light" style="{{ $state }}">خواندن بیشتر</button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="customer-cart-image">
                                        <img src="{{ $item->thumbnail }}" alt="{{ $item->customer }}">
                                    </div>
                                    <div class="d-flex flex-column mr-2">
                                        <div class="customer-cart-name">
                                            {{ $item->customer }}
                                        </div>
                                        <div class="customer-cart-job text-muted">
                                            {{ $item->post }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="customer-cart-icon">
                                <i class="fas fa-quote-left display-1 text-light"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>


    </div>
</div>
@endif



@if(false)
<div class="container py-5">

    <div class="text-center mb-5">

        <div>
            <h2>برندهایی که به وبلاین اعتماد کردند</h2>
        </div>

    </div>


    <div class="row">

        @foreach($brands as $brand)

        <div class="col-lg-2 text-center">
            <img src="{{ $brand->thumbnail }}" alt="{{ $brand->name }}">
        </div>

        @endforeach

    </div>

</div>
@endif


@endsection


@section('script')
<script>
    function readMore(dot, more, btn) {
        if (dot.style.display === "none") {
            dot.style.display = "inline";
            btn.innerHTML = "خواندن بیشتر";
            more.style.display = "none";
        } else {
            dot.style.display = "none";
            btn.innerHTML = "خواندن کمتر";
            more.style.display = "inline";
        }
    }

</script>
@endsection