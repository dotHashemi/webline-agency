@extends('admin.layouts.master') 

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
       پیغام‌ها
    </div>

</div> 


<div class="cart bg-light p-3">
    <div class="row">
        <div class="col-6">
            فرستنده
        </div>
        <div class="col-2 text-center">
            وضعیت
        </div>
        <div class="col-4">
            ابزار
        </div>
    </div>
</div>


@foreach($messages as $message)
    
<div class="cart p-3 my-3 border border-light">
    <div class="cart-body unrounded">
        <div class="row">

            <div class="col-6">
                {{ $message->name }}
            </div>

            <div class="col-2 d-flex align-items-center justify-content-center">
            @if($message->isReaded)
                <i class="far fa-envelope-open text-success h5 m-0"></i>
            @else
                <i class="far fa-envelope text-danger h5 m-0"></i>
            @endif
            </div>
    
            <div class="col-4">
                <div class="d-flex">
                    <a href="{{ route('admin.messages.show', ['message' => $message->id]) }}" class="px-1">
                        <button class="badge btn-secondary">مشاهده</button>
                    </a>
                    <form action="{{ route('admin.messages.destroy', ['message'=>$message->id]) }}" method="POST" class="px-1">
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
