@extends('admin.layouts.master') @section('content')

<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        بازخوردها
    </div>

    <a href="{{ route('admin.feedback.create') }}">
        <button class="btn btn-sm btn-secondary">
            افزودن بازخورد
        </button>
    </a>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-1">
            آواتار
        </div>
        <div class="col-5">
            نویسنده
        </div>
        <div class="col-4">
            سمت
        </div>
        <div class="col-2">
            ابزار
        </div>
    </div>
</div>


@foreach($feedback as $item)
    
<div class="cart border border-light shadow-sm p-3 mb-2">
    <div class="cart-body unrounded">
        <div class="row align-items-center">
            <div class="col-1">
                <img src="{{ $item->thumbnail }}" alt="{{ $item->customer }}" class="list-avatar">
            </div>
            <div class="col-5">
                {{ $item->customer }}
            </div>
            <div class="col-4">
                {{ $item->post }}
            </div>
            <div class="col-2">
                <div class="d-flex">
                    <a href="{{ route('admin.feedback.edit', ['feedback' => $item->id]) }}" class="px-1">
                        <button class="badge btn-primary">ویرایش</button>
                    </a>
                    <form action="{{ route('admin.feedback.destroy', ['feedback' => $item->id]) }}" method="POST" class="px-1">
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
