@extends('admin.layouts.master') 

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
       برندها
    </div>

    <a href="{{ route('admin.brands.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن برند
        </button>
    </a>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-2">
            لوگو
        </div>
        <div class="col-6">
            نام
        </div>
        <div class="col-4">
            ابزار
        </div>
    </div>
</div>


@foreach($brands as $brand)
    
<div class="cart p-3 my-3 border border-light">
    <div class="cart-body unrounded">
        <div class="row">

            <div class="col-2">
                <img src="{{ $brand->thumbnail }}" alt="{{ $brand->name }}" class="feedback-img">
            </div>
            
            <div class="col-6 d-flex align-items-center">
                {{ $brand->name }}
            </div>
    
            <div class="col-4 d-flex align-items-center">
                <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}" class="px-1">
                    <button class="badge btn-primary">ویرایش</button>
                </a>
                <form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="POST" class="px-1">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="badge btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
