@extends('admin.layouts.master') 

@section('script')
    <script src="/components/ckeditor/ckeditor.js"></script>
    <script src="/components/ckeditor/translations/fa.js"></script>

    <script>
        
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: 'fa',

                simpleUpload: {
                    uploadUrl: "{{ route('admin.ckeditor.upload') }}",
                    withCredentials: true,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                }
            })
            .catch(error => {
                console.error(error);
        });

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
        بازخوردها
    </div>

    <a href="{{ route('admin.feedback.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 


<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        افزودن بازخورد
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.feedback.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <input name="customer" type="text" class="form-control unrounded" placeholder="کارفرما" value="{{ old('customer') }}">
                        </div>
                        <div class="col-lg-6 form-group">
                            <input name="post" type="text" class="form-control unrounded" placeholder="سمت" value="{{ old('post') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 form-group">
                            <select name="portfolio" class="form-control">
                                <option value="">نمونه‌کار</option>
                                @foreach ($portfolios as $portfolio)
                                    <option value="{{ $portfolio->id }}">{{ $portfolio->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <select name="selected" class="form-control">
                                <option value="">بازخورد منتخب</option>
                                <option value="1">بله</option>
                                <option value="0">خیر</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ old('body') }}</textarea>
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

