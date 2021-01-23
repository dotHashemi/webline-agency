@extends('admin.layouts.master') 


@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        دسته‌ها
    </div>

    <a href="{{ route('admin.categories.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 

<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        ویرایش دسته‌ی {{ $category->title }}
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="row">

                        <div class="col-lg-7 form-group">
                            <input name="title" type="text" class="form-control input-special" placeholder="عنوان" value="{{ $category->title }}">
                        </div>
                        
                        <div class="col-lg-5 form-group">
                            <select name="father" class="form-control input-special">
                                <option value="">دسته‌ی پدر</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ ($category->father == $item->id)? 'selected' : '' }}>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3">

                <div class="cart bg-light p-3 border-bottom mb-3">
                    <div class="cart-body">

                        <div class="text-left">
                            <button type="submit" class="btn btn-sm btn-success btn-block">بروزرسانی</button>
                        </div>

                    </div>
                </div>
                
            </div>

        </div>

    </form>
</div>


@endsection

