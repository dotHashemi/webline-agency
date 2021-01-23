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
                    $("#img-preview").attr('src', e.target.result);
                };
    
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        نمونه‌کارها
    </div>

    <a href="{{ route('admin.portfolio.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 

<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        ویرایش {{ $portfolio->title }}
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.portfolio.update', ['portfolio' => $portfolio->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="row">
                        <div class="col-lg-7 form-group">
                            <input name="title" type="text" class="form-control unrounded" placeholder="عنوان" value="{{ $portfolio->title }}">
                        </div>
                        <div class="col-lg-5 form-group">
                            <input name="slug" type="text" class="form-control unrounded" placeholder="Slug" value="{{ $portfolio->slug }}" dir="ltr">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 form-group">
                            <input name="customer" type="text" class="form-control unrounded" placeholder="کارفرما" value="{{ $portfolio->customer }}">
                        </div>
                        <div class="col-lg-5 form-group">
                            <select name="service" class="form-control">
                                <option value="">نوع خدمت</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ $portfolio->service == $service->id ? 'selected': '' }}>{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <input name="link" type="text" class="form-control unrounded" placeholder="Source Link" value="{{ $portfolio->link }}" dir="ltr">
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ $portfolio->body }}</textarea>
                    </div>

                    <div class="form-group">
                        <input name="tags" type="text" class="form-control unrounded" placeholder="برچسب‌ها" value="{{ $portfolio->tags }}">
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
                            <img id="img-preview" src="{{ $portfolio->thumbnail }}" width="100%" class="mt-2"/>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


@endsection

