@extends('admin.layouts.master') @section('content')

<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        اسلایدها
    </div>

    <a href="{{ route('admin.slides.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن اسلاید
        </button>
    </a>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-1">
            تصویر
        </div>
        <div class="col-5">
            عنوان
        </div>
        <div class="col-2">
            نوع
        </div>
        <div class="col-2">
            وضعیت
        </div>
        <div class="col-2">
            ابزار
        </div>
    </div>
</div>


@foreach($slides as $slide)
    
<div class="cart border border-light shadow-sm p-3 mb-2">
    <div class="cart-body unrounded">
        <div class="row align-items-center">
            <div class="col-1">
                <img src="{{ $slide->thumbnail }}" class="list-avatar">
            </div>
            <div class="col-5">
                {{ $slide->title }}
            </div>
            <div class="col-2">
                {{ $slide->type }}
            </div>
            <div class="col-2">
                {{ $slide->status }}
            </div>
            <div class="col-2">
                <div class="d-flex">
                    <a href="{{ route('admin.slides.edit', ['slide' => $slide->id]) }}" class="px-1">
                        <button class="badge btn-primary">ویرایش</button>
                    </a>
                    <form action="{{ route('admin.slides.destroy', ['slide' => $slide->id]) }}" method="POST" class="px-1">
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

@endsection
