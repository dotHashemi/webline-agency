@extends('admin.layouts.master') 

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
       پیغامی از طرف {{ $message->name }}
    </div>

    <a href="{{ route('admin.messages.index') }}">
        <button class="btn btn-sm btn-secondary unrounded">
            بازگشت
        </button>
    </a>

</div> 

<div class="my-3">

    <div class="row">

        <div class="col-4">
            <div class="p-3 bg-light d-flex justify-content-between align-items-center">
                <span class="text-muted">ایمیل:</span>
                <span class="h6 m-0">
                    {{ $message->email }}
                </span>
            </div>
        </div>
        
        <div class="col-4">
            <div class="p-3 bg-light d-flex justify-content-between align-items-center">
                <span class="text-muted">تلفن:</span>
                <span class="h6 m-0">
                    {{ $message->phone }}
                </span>
            </div>
        </div>

        <div class="col-4">
            <div class="p-3 bg-light d-flex justify-content-between align-items-center">
                <span class="text-muted">وب‌سایت:</span>
                <span class="h6 m-0">
                    {{ $message->website }}
                </span>
            </div>
        </div>
        
    </div>

    <div class="bg-light mt-2 p-3 page-body">
        {{ $message->body }}
    </div>

</div>


@endsection
