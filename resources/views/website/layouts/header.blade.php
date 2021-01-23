<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
    <div class="container">
        
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{ url('/') }}">آژانس دیجیتال مارکتینگ وبلاین</a>
            <a class="navbar-brand-mobile" href="{{ url('/') }}">آژانس وبلاین</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse text-right" id="navbarCollapse">
            <ul class="navbar-nav mr-auto header-main-menu d-flex align-items-center justify-content-center">

                <li class="nav-item {{ Request::is('/')?'text-red':'' }}">
                    <a class="nav-link" href="{{ url('/') }}">
                        صفحه‌ی نخست
                    </a>
                </li>

                <span class="dot"></span>
                
                <li class="nav-item {{ Request::is('portfolio')?'text-red':'' }}">
                    <a class="nav-link" href="{{ route('app.portfolio.index') }}">
                        نمونه‌کارها
                    </a>
                </li>

                <span class="dot"></span>
                
                <li class="nav-item {{ Request::is('blog')?'text-red':'' }}">
                    <a class="nav-link" href="{{ route('app.blog.index') }}">
                        بلاگ
                    </a>
                </li>
                
                <span class="dot"></span>
                
                <li class="nav-item {{ Request::is('about')?'text-red':'' }}">
                    <a class="nav-link" href="{{ route('app.about') }}">
                        درباره‌ی وبلاین
                    </a>
                </li>
                
                <span class="dot"></span>
                
                <li class="nav-item {{ Request::is('contact')?'text-red':'' }}">
                    <a class="nav-link pl-0" href="{{ route('app.messages.create') }}">
                        ارتباط با ما
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
