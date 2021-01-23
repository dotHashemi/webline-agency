@extends('admin.layouts.master') 

@section('script')
    <script>
        
        function preview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    $("#img-preview").attr('src', e.target.result);
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection

@section('content')

<div class="d-flex justify-content-between my-3">

    <h3>
        ویرایش برند {{ $brand->name }}
    </h3>

    <a href="{{ route('admin.brands.index') }}">
        <button class="btn btn-sm btn-secondary unrounded">
            بازگشت
        </button>
    </a>

</div> 


<form action="{{ route('admin.brands.update', ['brand' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-lg-9">

            @include('admin.layouts.error')

            <div class="bg-light px-3 pt-3 border-bottom">

                <div class="col-lg-12 form-group">
                    <input name="name" type="text" class="form-control unrounded" placeholder="عنوان" value="{{ $brand->name }}">
                </div>

            </div>

        </div>

        <div class="col-lg-3">
            <div class="cart bg-light p-3 border-bottom mb-3">
                <div class="cart-body">

                    <div class="text-left">
                        <button type="submit" class="btn btn-sm btn-success btn-block unrounded">ثبت</button>
                    </div>

                </div>
            </div>
            
            <div class="cart bg-light px-3 pt-3 border-bottom mb-3">
                <div class="cart-body">

                    <div class="form-group">
                        <label id="lupload" for="upload"><input type="file" name="thumbnail" onchange="preview(this);" id="upload" accept="image/*">انتخاب تصویر شاخص</label>
                        <img id="img-preview" src="{{ $brand->thumbnail }}" width="100%" class="mt-2"/>
                    </div>

                </div>
            </div>
        </div>

    </div>

</form>

@endsection

