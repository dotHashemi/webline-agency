@extends('website.layouts.master') @section('content')

<div class="border-bottom page-header-box">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-right d-flex flex-column">
                
                <div class="row">

                    <div class="col-lg-8 col-sm-12">
                        <h2>
                            {{ $portfolio->title }}
                        </h2>
                    </div>

                    @if($portfolio->link)
                    <div class="col-lg-4 col-sm-12 text-left">
                        <a href="{{ $portfolio->link }}" target="blank">
                            <button class="btn btn-webline unrounded">
                                مشاهده‌ی نمونه‌کار
                            </button>
                        </a>
                    </div>
                    @endif

                </div>

                <div class="d-flex flex-column mt-5">

                    <div class="border-bottom d-flex justify-content-between pt-3">
                        <p class="text-secondary">کارفرما:</p>
                        <p class="text-dark">{{ $portfolio->customer }}</p>
                    </div>
                    <div class="border-bottom d-flex justify-content-between pt-3">
                        <p class="text-secondary">نوع خدمت:</p>
                        <p class="text-dark">{{ $portfolio->service()->first()->title }}</p>
                    </div>

                </div>

            </div>

            <div class="col-lg-4 text-left">
                <img
                    src="{{ $portfolio->thumbnail }}"
                    alt="{{ $portfolio->title }}"
                    class="portfolio-page-image shadow-sm"
                />
            </div>
            
        </div>
    </div>

</div>

<div class="bg-white">

    <div class="container portfolio-content-box mt-5 py-3 text-right">

        <div class="page-body">
            {!! $portfolio->body !!}
        </div>

        <div class="d-flex align-items-center page-tags mt-5">
            <span class="ml-2 text-muted">
                برچسب‌ها: 
            </span>
            <ul class="text-muted d-flex flex-list">
                @foreach(explode('،', $portfolio->tags) as $tag)
                <li class="page-tags-item m-1">{{ $tag }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</div>

@endsection
