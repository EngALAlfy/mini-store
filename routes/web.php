<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//Route::get("/test", function () {});

Route::as("deployment.")->group(function () {
    if (app()->isLocal()) {
        Route::get("/migrate", function () {
            Artisan::call("migrate");
            return Artisan::output();
        });
        Route::get("/migrate/fresh", function () {
            Artisan::call("migrate:fresh");
            return Artisan::output();
        });

        Route::get("/storage/link", function () {
            Artisan::call("storage:link");
            return Artisan::output();
        });

        Route::get("/seed", function () {
            Artisan::call("db:seed");
            return Artisan::output();
        });
    }


    Route::get('/cache/clear', function () {
        $title = __('all.clear_cache');

        $output = "";
        Artisan::call('cache:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('view:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('route:clear');
        $output .= "<br/>";
        $output .= Artisan::output();
        Artisan::call('config:clear');
        $output .= "<br/>";
        $output .= Artisan::output();

        return view('deployment.output', compact('output', 'title'));
    })->name("clear-cache");
});

Route::resource('backup', BackupController::class)->except(['edit', 'update', 'store']);
Route::get('/backup/restore/{name}', [BackupController::class, 'restore'])->name('backup.restore');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            // localization middlewares
            'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
            // install check
            // 'installed',
            // licensed check
            //    'licensed',
            // share settings values middleware
            'settings',

        ]
    ],
    function () {

        Route::post("/orders", [OrderController::class, "store"])->name('orders.store');
        Route::get("/orders/{order}/details", [OrderController::class, "details"])->name('orders.details');

        Route::get("/pages/{page}/plain", [PageController::class, "show"])->name('pages.show');

        Route::view('login', 'auth.login-v2')->name('login')->middleware('guest');
        Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
        Route::get('demo-login', [AuthController::class, 'demoLogin'])->name('demoLogin')->middleware('guest');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

        Route::as('website.')->group(function () {
            Route::get('/home', [HomeController::class, 'websiteHome'])->name('home');
            Route::redirect('/', "/home");

            Route::get('/pages/{page}', [PageController::class, 'websiteShow'])->name('pages.show');

            Route::get('/products', [ProductController::class, 'websiteIndex'])->name('products.index');

            Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
            Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
        });

        Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {

            Route::get('/home', [HomeController::class, 'index'])->name('home');
            Route::get('/', [HomeController::class, 'index']);
            Route::get('/search', [HomeController::class, 'search'])->name('search');


            // profile
            Route::get('profile', [ProfileController::class, 'index'])->name('profile');
            Route::post('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
            Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
            // settings
            Route::get('/settings', [SettingController::class, 'index'])->name('settings');
            Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
            Route::delete('/contacts/all', [ContactController::class, 'destroyAll'])->name('contacts.destroyAll');
            Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

            // resources
            Route::resource('users', UserController::class);
            Route::put('users/{user}/update/roles', [UserController::class, 'updateRoles'])->name('users.update-roles');

            Route::resource('categories', CategoryController::class)->only(['index', 'show']);
            Route::resource('sub-categories', SubCategoryController::class)->only(['index', 'show']);
            Route::resource('orders', OrderController::class)->only(['index']);
            Route::resource('products', ProductController::class)->only(['index', 'show']);
            Route::resource('pages', PageController::class)->only(['index', 'create', 'store']);
        });
    }
);
