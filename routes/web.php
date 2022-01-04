<?php

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

Route::get('/', function () {
    return view('front.home');
})->name('front/index');

Auth::routes();

//page
// Route::get('event', 'PageController@event')->name('front/event');
// Route::get('galeri', 'PageController@galeri')->name('front/galeri');
// Route::get('dewan', 'PageController@dewan')->name('front/dewan');
// Route::get('statistik', 'PageController@statistik')->name('front/statistik');
Route::get('laporan', 'PageController@report')->name('front/report');
Route::get('laporan/{report}/download', 'PageController@downloadReport')->name('front/download-report');
// Route::get('bantuan', 'PageController@help')->name('front/help');

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(static function () {
    //survey
    Route::get('surveys', 'SurveyController@index')->name('survey/index');
    Route::get('surveys/{survey:slug}', 'SurveyController@show')->name('survey/show');
    Route::post('surveys/{survey:slug}', 'SurveyController@store')->name('survey/store');

    //user
    Route::get('profile', 'UserController@profile')->name('profile/index');
    Route::post('profile/update/profile', 'UserController@updateProfile')->name('profile/update/profile');
    Route::post('profile/update/security', 'UserController@updateSecurity')->name('profile/update/security');
});

Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('refference')->namespace('Admin')->name('refference/')->group(static function () {
        Route::get('/wilayah', 'RefferenceController@getAllWilayah')->name('wilayah');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('surveys')->name('surveys/')->group(static function () {
            Route::get('/', 'SurveyController@index')->name('index');
            Route::get('/create', 'SurveyController@create')->name('create');
            Route::post('/', 'SurveyController@store')->name('store');
            Route::get('/{survey}/edit', 'SurveyController@edit')->name('edit');
            Route::post('/bulk-destroy', 'SurveyController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{survey}', 'SurveyController@update')->name('update');
            Route::delete('/{survey}', 'SurveyController@destroy')->name('destroy');

            Route::get('/{survey}/results', 'SurveyController@results')->name('results');
            Route::get('/{survey}/questions', 'SurveyController@questions')->name('questions');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('answers')->name('answers/')->group(static function () {
            Route::get('/', 'AnswerController@index')->name('index');
            Route::get('/{answer}', 'AnswerController@show')->name('show');
            Route::post('/bulk-destroy', 'AnswerController@bulkDestroy')->name('bulk-destroy');
            Route::delete('/{answer}', 'AnswerController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('users')->name('users/')->group(static function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
            Route::post('/', 'UserController@store')->name('store');
            Route::get('/{user}/edit', 'UserController@edit')->name('edit');
            Route::post('/bulk-destroy', 'UserController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}', 'UserController@update')->name('update');
            Route::delete('/{user}', 'UserController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('reports')->name('reports/')->group(static function() {
            Route::get('/',                                             'ReportsController@index')->name('index');
            Route::get('/create',                                       'ReportsController@create')->name('create');
            Route::post('/',                                            'ReportsController@store')->name('store');
            Route::get('/{report}/edit',                                'ReportsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReportsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{report}',                                    'ReportsController@update')->name('update');
            Route::delete('/{report}',                                  'ReportsController@destroy')->name('destroy');
        });
    });
});
