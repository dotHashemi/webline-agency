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
        افزودن اسلاید
    </h3>

    <a href="{{ route('admin.slides.index') }}">
        <button class="btn btn-sm btn-secondary unrounded">
            بازگشت
        </button>
    </a>

</div> 


<form action="{{ route('admin.slides.update', ['slide' => $slide->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-lg-9">

            @include('admin.layouts.error')

            <div class="bg-light px-3 pt-3 border-bottom">

                <div class="row">
                    <div class="col-lg-7 form-group">
                        <input name="title" type="text" class="form-control unrounded" placeholder="عنوان" value="{{ $slide->title }}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <select name="type" class="form-control">
                            <option value="">نوع اسلاید</option>
                            <option value="big" {{ $slide->type == 'big' ? 'selected':'' }}>بزرگ</option>
                            <option value="small" {{ $slide->type == 'small' ? 'selected':'' }}>کوچک</option>
                        </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <select name="status" class="form-control">
                            <option value="1" {{ $slide->status == true ? 'selected':'' }}>فعال</option>
                            <option value="0" {{ $slide->status == false ? 'selected':'' }}>غیر فعال</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <input name="link" type="text" class="form-control unrounded" placeholder="Source Link" value="{{ $slide->link }}" dir="ltr">
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
                        <img id="img-preview" src="{{ $slide->thumbnail }}" width="100%" class="mt-2"/>
                    </div>

                </div>
            </div>
        </div>

    </div>

</form>

@endsection

