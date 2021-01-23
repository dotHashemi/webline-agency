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

<div class="d-flex justify-content-between my-3">

    <h3>
        ویرایش بازخورد {{ $feedback->customer }}
    </h3>

    <a href="{{ route('admin.feedback.index') }}">
        <button class="btn btn-sm btn-secondary unrounded">
            بازگشت
        </button>
    </a>

</div> 


<form action="{{ route('admin.feedback.update', ['feedback' => $feedback->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        
        <div class="col-lg-9">

            @include('admin.layouts.error')

            <div class="bg-light px-3 pt-3 border-bottom">

                <div class="row">
                    <div class="col-lg-6 form-group">
                        <input name="customer" type="text" class="form-control unrounded" placeholder="کارفرما" value="{{ $feedback->customer }}">
                    </div>
                    <div class="col-lg-6 form-group">
                        <input name="post" type="text" class="form-control unrounded" placeholder="سمت" value="{{ $feedback->post }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 form-group">
                        <select name="portfolio" class="form-control">
                            <option value="">نمونه‌کار</option>
                            @foreach ($portfolios as $portfolio)
                                <option value="{{ $portfolio->id }}" {{ $feedback->portfolio == $portfolio->id ? 'selected':''}}>{{ $portfolio->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <select name="selected" class="form-control">
                            <option value="">بازخورد منتخب</option>
                            <option value="1" {{ $feedback->selected ? 'selected':'' }}>بله</option>
                            <option value="0" {{ $feedback->selected ? '':'selected' }}>خیر</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <textarea name="body" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ $feedback->body }}</textarea>
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
                        <img id="img-preview" src="{{ $feedback->thumbnail }}" width="100%" class="mt-2"/>
                    </div>

                </div>
            </div>
        </div>

    </div>

</form>

@endsection

