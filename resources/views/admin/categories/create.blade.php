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
        افزودن دسته
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="row">

                        <div class="col-lg-7 form-group">
                            <input name="title" type="text" class="form-control input-special" placeholder="عنوان" value="{{ old('title') }}">
                        </div>
                        
                        <div class="col-lg-5 form-group">
                            <select name="father" class="form-control input-special">
                                <option value="">دسته‌ی پدر</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>


                </div>

            </div>

            <div class="col-lg-3">
                <div class="cart bg-light p-3 border-bottom">
                    <div class="cart-body">

                        <div class="text-left">
                            <button type="submit" class="btn btn-sm btn-success btn-block">ثبت</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


@endsection
