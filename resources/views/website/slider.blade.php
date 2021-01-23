@php
$settings = request()->get("settings");
@endphp

@if(count($slides) > 0 && isset($settings['set-slider']) && $settings['set-slider'])

<div id="slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @for($i = 0; $i < count($slides); $i++) <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
            class="{{ $i == 0 ? 'active' : '' }}">
            </li>
            @endfor
    </ol>

    <div class="carousel-inner">
        @for($i = 0; $i < count($slides); $i++) <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <a href="{{ $slides[$i]->link }}">
                <img class="d-block w-100" src="{{ $slides[$i]->thumbnail }}" alt="{{ $slides[$i]->title }}" />
            </a>
    </div>
    @endfor
</div>

<a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#slider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>


@endif