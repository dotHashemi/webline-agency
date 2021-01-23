<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Website\AboutController as WebsiteAboutController;
use App\Http\Controllers\Website\AppController;
use App\Http\Controllers\Website\ArticleController as WebsiteArticleController;
use App\Http\Controllers\Website\MemberController as WebsiteMemberController;
use App\Http\Controllers\Website\MessageController as WebsiteMessageController;
use App\Http\Controllers\Website\PortfolioController as WebsitePortfolioController;
use App\Http\Controllers\Website\ServiceController as WebsiteServiceController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CallSettings;
use App\Http\Middleware\reCaptcha;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([CallSettings::class])->group(function () {

    Route::get('/', [AppController::class, 'index'])->name('app.index');

    Route::get('/about', [WebsiteAboutController::class, 'show'])->name('app.about');


    # articles routes
    Route::get('/blog', [WebsiteArticleController::class, 'index'])->name('app.blog.index');
    Route::get('/blog/{slug}', [WebsiteArticleController::class, 'show'])->name('app.blog.show');


    Route::get('/contact', [WebsiteMessageController::class, 'create'])->name('app.messages.create');
    Route::post('/contact', [WebsiteMessageController::class, 'store'])->name('app.messages.store')
        ->middleware([reCaptcha::class]);


    Route::get('/portfolio/{slug}', [WebsitePortfolioController::class, 'show'])->name('app.portfolio.show');
    Route::get('/portfolio', [WebsitePortfolioController::class, 'index'])->name('app.portfolio.index');


    Route::get('/services/{slug}', [WebsiteServiceController::class, 'show'])->name('app.services.show');


    Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.auth.authenticate')
        ->middleware([reCaptcha::class]);


    Route::get('/4secrets', [AppController::class, 'secrets'])->name('app.secrets');


    Route::post('/newsletter', [WebsiteMemberController::class, 'join'])->name('app.newsletter.join')
        ->middleware([reCaptcha::class]);
});


Route::prefix('admin')->middleware([AdminAuth::class])->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

    Route::resource('/services', ServiceController::class, ['as' => 'admin'])
        ->except('show');

    Route::resource('/portfolio', PortfolioController::class, ['as' => 'admin'])
        ->except('show');

    Route::resource('/feedback', FeedbackController::class, ['as' => 'admin'])
        ->except('show');

    Route::resource('/slides', SlideController::class, ['as' => 'admin'])
        ->except('show');

    Route::resource('/messages', MessageController::class, ['as' => 'admin'])
        ->only('index', 'show', 'destroy');

    Route::resource('/brands', BrandController::class, ['as' => 'admin'])
        ->except('show');


    Route::resource('/categories', CategoryController::class, ['as' => 'admin'])
        ->except('show');


    Route::resource('/articles', ArticleController::class, ['as' => 'admin'])
        ->except('show');


    Route::get('/about', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/{option}', [AboutController::class, 'update'])->name('admin.about.update');

    Route::get('/setting', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/setting', [SettingController::class, 'update'])->name('admin.setting.update');
    Route::get('/setting/reset', [SettingController::class, 'reset'])->name('admin.setting.reset');

    # Route for Upload with CKEditor:
    Route::post('/media/upload', [AdminController::class, 'ckeditor'])->name('admin.ckeditor.upload');
});
