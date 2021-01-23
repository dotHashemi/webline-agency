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
       درباره‌ی ما
    </div>

</div> 

<div class="p-3">

    <form action="{{ route('admin.about.update', ['option' => $about->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            
            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light px-3 pt-3 border-bottom">

                    <div class="form-group">
                        <textarea name="value" id="editor" class="form-control unrounded" rows="10" placeholder="متن">{{ $about->value }}</textarea>
                    </div>

                    <div class="form-group">
                        <input name="tags" type="text" class="form-control unrounded" placeholder="برچسب‌ها" value="{{ $about->tags }}">
                    </div>

                </div>

            </div>

            <div class="col-lg-3">
                <div class="cart bg-light p-3 border-bottom">
                    <div class="cart-body">

                        <div class="text-left">
                            <button type="submit" class="btn btn-sm btn-success btn-block unrounded">بروزرسانی</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>

@endsection
