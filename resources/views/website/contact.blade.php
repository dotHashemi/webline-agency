@php
    $settings = request()->get("settings");
@endphp

@extends('website.layouts.master') 
@section('content')


<div class="border-bottom bg-light page-header-box">
    
    <div class="container text-center">

        <h1>
            ارتباط با ما
        </h1>

    </div>

</div>


<div class="bg-white">

    <div class="container my-5 py-3 text-right">

        <div class="row">

            <div class="col-lg-4 text-left mb-5">

                <p class="h5 mb-5 text-right">
                    وبلاین از ارتباط شما خوشحال می‌شود.
                </p>

                <p class="alert alert-info unrounded text-left py-3">
                    <span class="h5 mx-3">{{ isset($settings['set-phone'])? $settings['set-phone']: '' }}</span>
                    <span class="text-secondary"><i class="fas fa-phone-alt"></i></span>
                </p>
                <p class="alert alert-info unrounded text-left py-3">
                    <span class="h5 mx-3">{{ isset($settings['set-email'])? $settings['set-email']: '' }}</span>
                    <span class="text-secondary"><i class="fas fa-at"></i></span>
                </p>
                <p class="alert alert-info unrounded text-right py-3">
                    <span class="text-secondary"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="h5 mx-3">هرمزگان، قشم</span>
                </p>

                <div class="contact-social mt-5">
                    <ul class="d-flex justify-content-center">
                        <a href="{{ 'https://instagram.com/' . (isset($settings['set-social-instagram'])? $settings['set-social-instagram']: '') }}" target="blank">
                            <li class="px-2 pt-2 bg-light mx-1 h2 social-icon-box">
                                <i class="fab fa-instagram"></i>
                            </li>
                        </a>
                        <a href="{{ 'https://wa.me/' . (isset($settings['set-social-whatsapp'])? $settings['set-social-whatsapp']: '') }}" target="blank">
                            <li class="px-2 pt-2 bg-light mx-1 h2 social-icon-box">
                                <i class="fab fa-whatsapp"></i>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
    
            <div class="col-lg-8">
                <div class="bg-light p-3">
                    <div>
                        @include('admin.layouts.success')
                    </div>
                    @include('website.messages.create')
                </div>
            </div>
    
        </div>

    </div>

</div>


@endsection


@section('script')


<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
</script>


@endsection