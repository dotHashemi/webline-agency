@extends('admin.layouts.master') @section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        دسته‌ها
    </div>

    <a href="{{ route('admin.categories.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن دسته
        </button>
    </a>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-8">
            عنوان
        </div>
        <div class="col-4">
            ابزار
        </div>
    </div>
</div>


@foreach($categories as $category)
    
<div class="cart shadow-sm p-3 mb-1">
    <div class="cart-body unrounded">
        <div class="row">
            <div class="col-8">
                {{ $category->title }}
            </div>
            <div class="col-4">
                <div class="d-flex">
                    <a href="{{ route('admin.categories.edit', ['category'=>$category->id]) }}" class="px-1">
                        <button class="badge btn-primary">ویرایش</button>
                    </a>
                    <form action="{{ route('admin.categories.destroy', ['category'=>$category->id]) }}" method="POST" class="px-1">
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
