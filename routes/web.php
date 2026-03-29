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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'Frontend\HomeController@index')->name('home');

Route::prefix('government')->group(function () {
    Route::get('legislative/officials', 'Frontend\GovernmentController@legislative_officials')->name('gov.legislative.officials');
    Route::get('legislative/ordinances', 'Frontend\GovernmentController@ordinances')->name('gov.legislative.ordinances');
    Route::get('legislative/resolutions', 'Frontend\GovernmentController@resolutions')->name('gov.legislative.resolutions');
    
    Route::get('elected/officials', 'Frontend\GovernmentController@elected_officials')->name('gov.elected.officials');

    //list of ordinances by year and month
    Route::get('legislative/ordinances/{month}/{year}', 'Frontend\GovernmentController@getordinances')->name('gov.legislative.getordinances');
    Route::get('legislative/ordinance/{id}/{title}', 'Frontend\GovernmentController@show_ordinance')->name('gov.legislative.show_ordinance');

    //list of resolutions by year and month
    Route::get('legislative/resolutions/{month}/{year}', 'Frontend\GovernmentController@getresolutions')->name('gov.legislative.getresolutions');
    Route::get('legislative/resolution/{id}/{title}', 'Frontend\GovernmentController@show_resolution')->name('gov.legislative.show_resolution');

    
	Route::get('keyofficials', 'Frontend\GovernmentController@keyofficials')->name('keyofficials');
    Route::get('offices', 'Frontend\GovernmentController@offices')->name('offices');
	Route::get('offices/personnel/{id}/{office}', 'Frontend\GovernmentController@offices_p')->name('offices_p');

    //Tourism
    // Route::get('local/tourism', 'Frontend\GovernmentController@tourism')->name('tourism');
});
//currently use
Route::prefix('transactions')->group(function () {
    Route::get('/businesspermits', 'Frontend\TransactionController@business')->name('bpermit');
});

//currently use
Route::prefix('transparency')->group(function () {
    Route::get('/citizens-charter', 'Frontend\TransparencyController@citizenscharter')->name('citizenscharter');
    Route::get('/fdp-reports', 'Frontend\FdpReportController@index')->name('fdp.index');
});


//currently use
Route::prefix('tourism')->group(function () {
    Route::get('/', 'Frontend\TourismController@tourism')->name('tourism');
    Route::get('/tourist-spot/{name}', 'Frontend\TourismController@tourist_spot')->name('tourism.tourist_spot');
});
//currently use
Route::prefix('barangays')->group(function () {
    Route::get('/', 'Frontend\BarangayController@barangay')->name('barangay');
    // Route::get('/{name}', 'Frontend\BarangayController@barangay')->name('barangay');
});

Route::prefix('about')->group(function () {
    Route::get('/', 'Frontend\AboutController@index')->name('about');
	Route::get('/sogodsouthernleyte/missionvision', 'Frontend\AboutController@missionvision')->name('about.missionvision');
});

Route::prefix('events')->group(function () {
    Route::get('/', 'Frontend\EventsController@showForm')->name('events');
    Route::get('{id}/{event}', 'Frontend\EventsController@showEvent')->name('events.show');
});

//currently use
Route::prefix('posts')->group(function () {
    // Route::get('/', 'Frontend\EventsController@showForm')->name('events');
    Route::get('/{category}/{title}', 'Frontend\AnnouncementsController@showArticle')->name('article.show');
});

Route::prefix('news')->group(function () {
    Route::get('/', 'Frontend\NewsController@index')->name('news');
    // Route::get('/article/{id}/{article}', 'Frontend\NewsController@showArticle')->name('article.show');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
