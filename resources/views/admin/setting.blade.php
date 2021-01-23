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
        تنظیمات
    </div>

</div>

<div class="p-3">

    <form action="{{ route('admin.setting.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-lg-9">

                @include('admin.layouts.error')

                <div class="bg-light p-3 border-bottom mb-3">

                    <div class="d-flex">

                        @if(isset($setting['set-slider']))

                            <button type="button" class="btn btn-secondary btn-sm disabled text-set unrounded">نمایش
                                اسلایدر</button>

                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                <label class="btn btn-info text-set unrounded">
                                    <input type="radio" value="1" name="set-slider" autocomplete="off"
                                        {{ $setting['set-slider']?'checked':'' }}>
                                    بله
                                </label>

                                <label class="btn btn-info text-set unrounded">
                                    <input type="radio" value="0" name="set-slider" autocomplete="off"
                                        {{ $setting['set-slider']?'':'checked' }}>
                                    خیر
                                </label>

                            </div>

                        @endif

                    </div>

                </div>

                <div class="bg-light px-3 pt-3 border-bottom">

                    {{-- <div class="form-group">
                        <textarea name="value" id="editor" class="form-control input-special" rows="10" placeholder="متن"></textarea>
                    </div> --}}

                    <div class="row" dir="ltr">

                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-at"></i></span>
                                </div>
                                <input name="set-email" type="text" class="form-control input-special"
                                    placeholder="Email"
                                    value="{{ isset($setting['set-email'])? $setting['set-email']: '' }}">
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                </div>
                                <input name="set-phone" type="text" class="form-control input-special"
                                    placeholder="Phone"
                                    value="{{ isset($setting['set-phone'])? $setting['set-phone']: '' }}">
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                                </div>
                                <input name="set-social-whatsapp" type="text" class="form-control input-special"
                                    placeholder="Whatsapp with +98"
                                    value="{{ isset($setting['set-social-whatsapp'])? $setting['set-social-whatsapp'] :'' }}">
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                </div>
                                <input name="set-social-instagram" type="text" class="form-control input-special"
                                    placeholder="Instagram Account"
                                    value="{{ isset($setting['set-social-instagram'])? $setting['set-social-instagram']: '' }}">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-3">
                <div class="cart bg-light p-3 border-bottom mb-3">
                    <div class="cart-body">

                        <button type="submit" class="btn btn-sm btn-success btn-block">بروزرسانی</button>

                    </div>
                </div>

                <div class="cart bg-light p-3 border-bottom">
                    <div class="cart-body">

                        <a href="{{ route('admin.setting.reset') }}"
                            class="btn btn-sm btn-block btn-warning">
                            تنظیمات پیش‌فرض دیتابیس
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </form>


</div>

@endsection
