@extends('admin.layouts.master') @section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        خدمات
    </div>

    <a href="{{ route('admin.services.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن خدمت
        </button>
    </a>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-1">
            ترتیب
        </div>
        <div class="col-7">
            عنوان
        </div>
        <div class="col-4">
            ابزار
        </div>
    </div>
</div>


@foreach($services as $service)
    
<div class="cart shadow-sm p-3 mb-1">
    <div class="cart-body unrounded">
        <div class="row">
            <div class="col-1">
                {{ $service->order }}
            </div>
            <div class="col-7">
                {{ $service->title }}
            </div>
            <div class="col-4">
                <div class="d-flex">
                    <a href="{{ $service->path() }}" class="px-1">
                        <button class="badge btn-secondary">مشاهده</button>
                    </a>
                    <a href="{{ route('admin.services.edit', ['service'=>$service->id]) }}" class="px-1">
                        <button class="badge btn-primary">ویرایش</button>
                    </a>
                    <form action="{{ route('admin.services.destroy', ['service'=>$service->id]) }}" method="POST" class="px-1">
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
