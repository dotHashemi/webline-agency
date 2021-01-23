<div class="card mt-5">
    <div class="card-header">
        محدودیت در دسترسی کامل به این مقاله
    </div>
    <div class="card-body">

        <div>

            <div>
                برای دسترسی کامل به این محتوا و سایر مطالب مفیدی که برایتان آماده کرده‌ایم، فقط کافیست فرم زیر را پر
                کرده و بدون پرداخت هیچ هزینه‌ای از مطالب استفاده و رشد کنید.
            </div>

            <div class="mt-3 mb-4">
                تمامی مطالب همراه با نسخه شنیداری + فایل PDF در اختیار شماست.
            </div>
        </div>

        <form action="{{ route('app.newsletter.join') }}" method="POST">
            @csrf

            <input type="hidden" name="recaptcha" id="recaptcha">

            <div class="row justify-content-center">
                <div class="col-lg-4 form-group">
                    <input name="name" type="text" class="form-control input-special" placeholder="نام (الزامی)"
                        value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <small class="text-danger">
                            {{ $errors->first('name') }}
                        </small>
                    @endif
                </div>

                <div class="col-lg-4 form-group">
                    <input name="email" type="text" class="form-control input-special" placeholder="ایمیل (الزامی)"
                        value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <small class="text-danger">
                            {{ $errors->first('email') }}
                        </small>
                    @endif
                </div>

                <div class="col-lg-4 form-group">
                    <input name="phone" type="text" class="form-control input-special" placeholder="تلفن همراه (الزامی)"
                        value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <small class="text-danger">
                            {{ $errors->first('phone') }}
                        </small>
                    @endif
                </div>
            </div>


            <div class="d-flex align-items-center justify-content-between flex-list">
                <div>
                    @if($errors->has('captcha'))
                        <small class="text-danger">
                            {{ $errors->first('captcha') }}
                        </small>
                    @endif
                </div>

                <button type="submit" class="btn btn-sm btn-dark px-3">ارسال</button>
            </div>

        </form>

    </div>
</div>
