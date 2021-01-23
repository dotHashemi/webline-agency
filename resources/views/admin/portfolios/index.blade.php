@extends('admin.layouts.master') @section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        نمونه‌کارها
    </div>

    <a href="{{ route('admin.portfolio.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن نمونه‌کار
        </button>
    </a>

</div> 

<div class="p-3">

    <div class="row">
            
        @foreach($portfolios as $portfolio)

        <div class="col-lg-3">

            <div class="cart border border-light shadow-sm mb-2">
                <div class="cart-body unrounded">

                    <div class="portfolio-image">
                        <img src="{{ $portfolio->thumbnail }}" alt="{{ $portfolio->title }}">
                    </div>

                    <div class="p-3 font-weight-bold">
                        {{ $portfolio->title }}
                    </div>

                    <div class="d-flex">
                        <a href="{{ route('app.portfolio.show', ['slug' => $portfolio->slug]) }}" class="col-4 portfolio-tools">
                            <button class="btn btn-sm btn-block btn-secondary unrounded">مشاهده</button>
                        </a>
                        <a href="{{ route('admin.portfolio.edit', ['portfolio'=>$portfolio->id]) }}" class="col-4 portfolio-tools">
                            <button class="btn btn-sm btn-block btn-primary unrounded">ویرایش</button>
                        </a>
                        <form action="{{ route('admin.portfolio.destroy', ['portfolio'=>$portfolio->id]) }}" method="POST" class="col-4 portfolio-tools">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-block btn-danger unrounded">حذف</button>
                        </form>
                    </div>
                
                </div>

            </div>
        
        </div>

        @endforeach
    
    </div>
</div>

@endsection
