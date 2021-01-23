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

    </script>
@endsection

@section('content')


<div class="d-flex justify-content-between align-items-center p-3 text-light bg-dark">

    <div class="page-title">
        خدمات
    </div>

    <a href="{{ route('admin.services.index') }}">
        <button class="btn btn-sm btn-secondary">
            بازگشت
        </button>
    </a>

</div> 

<div class="cart bg-light p-3 text-center">
    <div class="page-sub-title">
        افزودن خدمت
    </div>
</div>


<div class="p-3">

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="row">
                    
                        <div class="col-lg-10 form-group">
                            <input name="title" type="text" class="form-control unrounded" placeholder="عنوان" value="{{ old('title') }}">
                        </div>
                    
                        <div class="col-lg-2 form-group">
                            <input name="order" type="text" class="form-control unrounded" placeholder="ترتیب" value="{{ old('order') }}">
                        </div>
                
                    </div>

                    <div class="row">
                
                        <div class="col-lg-7 form-group">
                            <input name="slug" type="text" class="form-control unrounded" placeholder="Slug" value="{{ old('slug') }}" dir="ltr">
                        </div>
                
                        <div class="col-lg-5 form-group">
                            <input name="icon" type="text" class="form-control unrounded text-left" placeholder="Icon" value="{{ old('icon') }}">
                        </div>
                    
                    </div>

                    <div class="form-group">
                        <input name="description" type="text" class="form-control unrounded" placeholder="توضیحات" value="{{ old('description') }}">
                    </div>

                    <div class="form-group">
                        <textarea name="body" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ old('body') }}</textarea>
                    </div>

                    <div class="form-group">
                        <input name="tags" type="text" class="form-control unrounded" placeholder="برچسب‌ها" value="{{ old('tags') }}">
                    </div>

                </div>

            </div>

            <div class="col-lg-3">
                <div class="cart bg-light p-3 border-bottom">
                    <div class="cart-body">

                        <div class="text-left">
                            <button type="submit" class="btn btn-sm btn-success btn-block unrounded">ثبت</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>
</div>


@endsection
