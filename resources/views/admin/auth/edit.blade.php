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

<!-- #region Page Title -->
<div class="d-flex justify-content-between my-3">

    <h3>
        ویرایش {{ $service->title }}
    </h3>

    <a href="{{ route('admin.services.index') }}">
        <button class="btn btn-sm btn-secondary unrounded">
            بازگشت
        </button>
    </a>

</div> 
<!-- #endregion -->

<form action="{{ route('admin.services.update', ['service' => $service->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-lg-9">

            @include('admin.layouts.error')

            <div class="bg-light p-3 border-bottom">

                <div class="row">
                    <div class="col-lg-7 form-group">
                        <input name="title" type="text" class="form-control unrounded" placeholder="عنوان" value="{{ $service->title }}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <input name="icon" type="text" class="form-control unrounded text-left" placeholder="Icon" value="{{ $service->icon }}">
                    </div>
                    <div class="col-lg-2 form-group">
                        <input name="order" type="text" class="form-control unrounded" placeholder="ترتیب" value="{{ $service->order }}">
                    </div>
                </div>

                <div class="form-group">
                    <input name="description" type="text" class="form-control unrounded" placeholder="توضیحات" value="{{ $service->description }}">
                </div>

                <div class="form-group">
                    <textarea name="body" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ $service->body }}</textarea>
                </div>

                <div class="form-group">
                    <input name="tags" type="text" class="form-control unrounded" placeholder="برچسب‌ها" value="{{ $service->tags }}">
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

@endsection
