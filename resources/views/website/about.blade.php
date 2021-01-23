@extends('website.layouts.master') @section('content')

<div class="border-bottom bg-light page-header-box">
    
    <div class="container">

        <div class="d-flex justify-content-between">

            <h1>
                درباره‌ی وبلاین
            </h1>

        </div>

    </div>

</div>

<div class="bg-white">

    <div class="container portfolio-content-box mt-5 py-3 text-right">

        <div class="page-body">
            {!! $about->value !!}
        </div>

    </div>

</div>

@endsection
