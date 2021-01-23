<nav class="col-md-2 d-none d-md-block bg-light sidebar text-right">

    <div class="mt-2">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin')?'sidebar-active':'' }}"
                    href="{{ route('admin.index') }}">
                    <i class="fas fa-home"></i>
                    داشبورد
                </a>
            </li>

            <li
                class="nav-item {{ preg_match('#^admin.categories.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                    <i class="fas fa-tags"></i>
                    دسته‌ها
                </a>
            </li>

            <li
                class="nav-item {{ preg_match('#^admin.articles.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.articles.index') }}">
                    <i class="fas fa-pen-fancy"></i>
                    مقاله‌ها
                </a>
            </li>

            <li
                class="nav-item {{ preg_match('#^admin.services.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.services.index') }}">
                    <i class="fas fa-seedling"></i>
                    خدمات
                </a>
            </li>

            <li
                class="nav-item {{ preg_match('#^admin.portfolio.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.portfolio.index') }}">
                    <i class="fas fa-dolly-flatbed"></i>
                    نمونه‌کارها
                </a>
            </li>

            <li
                class="nav-item {{ preg_match('#^admin.slides.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.slides.index') }}">
                    <i class="fas fa-images"></i>
                    اسلایدها
                </a>
            </li>

            <li
                class="nav-item {{ Request::is('admin/about')?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.about.edit') }}">
                    <i class="fas fa-info"></i>
                    درباره‌ی ما
                </a>
            </li>

            <li
                class="nav-item {{ Request::is('admin/setting')?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.setting.edit') }}">
                    <i class="fas fa-ring"></i>
                    تنظیمات
                </a>
            </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>مشتریان</span>
        </h6>

        <ul class="nav flex-column mb-2">
            <li
                class="nav-item {{ preg_match('#^admin.brands.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.brands.index') }}">
                    <i class="fas fa-building"></i>
                    برندها
                </a>
            </li>
            <li
                class="nav-item {{ preg_match('#^admin.feedback.*#', Route::current()->getName())?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.feedback.index') }}">
                    <i class="fas fa-quote-left"></i>
                    بازخوردها
                </a>
            </li>
            <li
                class="nav-item {{ Request::is('admin/messages')?'sidebar-active':'' }}">
                <a class="nav-link" href="{{ route('admin.messages.index') }}">
                    <i class="fas fa-envelope-open-text"></i>
                    پیغام‌ها
                </a>
            </li>
        </ul>

    </div>
</nav>
