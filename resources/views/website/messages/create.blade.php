<div>

    <form method="POST">
        @csrf

        <input type="hidden" name="recaptcha" id="recaptcha">

        <div class="row">
            <div class="col-lg-6 form-group">
                <input name="name" type="text" class="form-control input-special" placeholder="نام (الزامی)" value="{{ old('title') }}">
                @if($errors->has('name'))
                <small class="text-danger">
                    {{ $errors->first('name') }}
                </small>      
                @endif
            </div>
            <div class="col-lg-6 form-group">
                <input name="email" type="text" class="form-control input-special" placeholder="ایمیل (الزامی)" value="{{ old('title') }}">
                @if($errors->has('email'))
                <small class="text-danger">
                    {{ $errors->first('email') }}
                </small>      
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 form-group">
                <input name="phone" type="text" class="form-control input-special" placeholder="تلفن تماس (الزامی)" value="{{ old('title') }}">
                @if($errors->has('phone'))
                <small class="text-danger">
                    {{ $errors->first('phone') }}
                </small>      
                @endif
            </div>
            <div class="col-lg-6 form-group">
                <input name="website" type="text" class="form-control input-special" placeholder="وب‌سایت" value="{{ old('title') }}">
            </div>
        </div>

        <div class="form-group">
            <textarea name="body" class="form-control input-special" rows="10" placeholder="متن پیام (الزامی)">{{ old('body') }}</textarea>
            @if($errors->has('body'))
            <small class="text-danger">
                {{ $errors->first('body') }}
            </small>      
            @endif
        </div>

        <div class="text-left">
            <button type="submit" class="btn btn-sm btn-dark px-3">ارسال</button>
        </div>

    </form>

</div>