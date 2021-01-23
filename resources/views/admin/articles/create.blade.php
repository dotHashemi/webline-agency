@extends('admin.layouts.master') 

@section('script')
    <script src="/components/ckeditor/ckeditor.js"></script>
    <script src="/components/ckeditor/translations/fa.js"></script>

    <script>
        
        ClassicEditor
            .create(document.querySelector('#editor1'), {
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
       
        ClassicEditor
            .create(document.querySelector('#editor2'), {
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
        مقاله‌ها
    </div>

    <a href="{{ route('admin.articles.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 

<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        افزودن مقاله
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="form-group">
                        <input name="title" type="text" class="form-control input-special" placeholder="عنوان" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <input name="slug" type="text" class="form-control input-special" placeholder="Slug" value="{{ old('slug') }}" dir="ltr">
                    </div>
                    
                    <div class="form-group">
                        <select name="category[]" class="form-control selectpicker" multiple dir="rtl">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 form-group">
                            <select name="type" class="form-control input-special">
                                <option value="">نوع</option>
                                <option value="text">متنی</option>
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <select name="access" class="form-control input-special">
                                <option value="">دسترسی</option>
                                <option value="normal">عادی</option>
                                <option value="newsletter">خبرنامه</option>
                                <option value="register">ثبت‌نام</option>
                                <option value="vip">ویژه</option>
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <select name="status" class="form-control input-special">
                                <option value="">وضعیت</option>
                                <option value="1">فعال</option>
                                <option value="0">غیرفعال</option>
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <input name="time" type="number" class="form-control input-special" placeholder="زمان مطالعه" value="{{ old('time') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="description" id="editor1" class="form-control" placeholder="توضیحات">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="editor2" class="form-control" placeholder="متن">{{ old('body') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input name="pdf" type="text" class="form-control input-special" placeholder="PDF Link" value="{{ old('pdf') }}" dir="ltr">
                    </div>
                    
                    <div class="form-group">
                        <input name="voice" type="text" class="form-control input-special" placeholder="Voice Link" value="{{ old('voice') }}" dir="ltr">
                    </div>

                    <div class="form-group">
                        <input name="tags" type="text" class="form-control input-special" placeholder="برچسب‌ها" value="{{ old('tags') }}">
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
                            <img id="img-preview" src="/media/assets/no_image.png" width="100%" class="mt-2"/>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


@endsection

