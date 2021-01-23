@php
    $settings = request()->get("settings");
@endphp


<div class="bg-red text-light py-5">
    <div class="container">
        <div class="row pb-3 mb-3">

            <div class="col-lg-8">
                <ul class="d-flex align-items-center flex-list">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            صفحه‌ی نخست
                        </a>
                    </li>

                    <span class="footer-dot"></span>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.portfolio.index') }}">
                            نمونه‌کارها
                        </a>
                    </li>

                    <span class="footer-dot"></span>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            فرصت‌های شغلی
                        </a>
                    </li>

                    <span class="footer-dot"></span>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.about') }}">
                            درباره‌ی وبلاین
                        </a>
                    </li>

                    <span class="footer-dot"></span>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('app.messages.create') }}">
                            ارتباط با ما
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 text-center">
                @if(false)
                    <img src="{{ isset($settings['set-footer-logo']) ? $settings['set-footer-logo'] : '' }}"
                        alt="آژانس دیجیتال مارکتینگ وبلاین" />
                @endif
            </div>
        </div>

        <hr />

        <div class="row d-flex align-items-center">

            <div class="col-lg-8 col-md-12 col-sm-12 text-copyright text-right text-center-mobile">
                تمامی حقوق برای 
                <a href="{{ url('/') }}">
                    <b>آژانس دیجیتال مارکتینگ وبلاین</b>
                </a>
                 محفوظ است.
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12 text-center-mobile m-mobile">
                <a href="{{ 'https://instagram.com/' . (isset($settings['set-social-instagram']) ? $settings['set-social-instagram'] : '') }}"
                    target="blank">
                    <i class="fab fa-instagram footer-social-icon"></i>
                </a>
                <a href="{{ 'https://wa.me/' . (isset($settings['set-social-whatsapp']) ? $settings['set-social-whatsapp'] : '') }}"
                    target="blank">
                    <i class="fab fa-whatsapp footer-social-icon"></i>
                </a>
            </div>

        </div>
    </div>
</div>

<div class="bg-purple py-1"></div>
