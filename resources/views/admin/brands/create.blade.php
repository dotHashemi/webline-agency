@extends('admin.layouts.master') 

@section('script')
    <script>

        function preview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    var img = $('<img width="100%" class="mt-2"/>').attr('src', e.target.result);
                    $("#lupload").after(img); 
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        برندها
    </div>

    <a href="{{ route('admin.brands.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 

<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        افزودن برند
    </div>
</div>


<div class="p-3">
    <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light pt-3 px-3 border-bottom">

                    <div class="col-lg-12 form-group">
                        <input name="name" type="text" class="form-control unrounded" placeholder="نام" value="{{ old('name') }}">
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
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


@endsection

