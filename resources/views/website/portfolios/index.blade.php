@extends('website.layouts.master') 

@section('content')


<div class="border-bottom bg-light page-header-box">
    
    <div class="container">

        <div class="text-center">
            <h1>
                نمونه‌کارها
            </h1>
        </div>

    </div>

</div>

<div class="container py-5">


    <div class="text-center mb-5 portfolio-category">
        <ul class="d-flex flex-list justify-content-center">
            <a href="{{ route('app.portfolio.index') }}">
                <li class="{{ request()->service ? 'btn-light': 'btn-webline' }} px-3 py-2 m-1 text-but">
                    همه
                </li>
            </a>
            @foreach($services as $service)
            <a href="{{ route('app.portfolio.index', ['service' => $service->id]) }}">
                <li class="{{ request()->service == $service->id ? 'btn-webline': 'btn-light' }} px-3 py-2 m-1 text-but">
                    {{ $service->title }}
                </li>
            </a>
            @endforeach
        </ul>
    </div>



    <div class="row text-center">

        @foreach($portfolios as $portfolio)
            
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="cart">
                <div class="cart-body bg-light portfolio-cart">
                    
                    <div class="portfolio-cart-image">
                        <a href="{{ route('app.portfolio.show', ['slug' => $portfolio->slug]) }}">
                            <img
                                src="{{ $portfolio->thumbnail }}"
                                alt="{{ $portfolio->title }}"
                                class="portfolio-image"
                            />
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


@endsection
