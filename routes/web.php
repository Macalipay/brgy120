<?php

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
    return view('auth.login');
});


// BARANGAY
Route::group(['prefix' => 'dashboard'], function (){
    Route::get          ('/',                            'DashboardController@index'                          )->name('reason');
    Route::get          ('/data',                        'DashboardController@data'                           )->name('reason');
}); 

// CERTIFICATION
Route::group(['prefix' => 'certification'], function (){
    Route::get          ('/',                            'CertificateController@index'                          )->name('reason');
    Route::post         ('/save',                        'CertificateController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'CertificateController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'CertificateController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CertificateController@destroy'                        )->name('reason_update');
    Route::get          ('/template/{id}',               'CertificateController@template'                        )->name('reason_update');
});

// PARTICIPANT
Route::group(['prefix' => 'certificate'], function (){
    Route::get          ('/',                            'ParticipantController@index'                          )->name('reason');
    Route::post         ('/save',                        'ParticipantController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'ParticipantController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'ParticipantController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ParticipantController@destroy'                        )->name('reason_update');
});

// PARTICIPANT
Route::group(['prefix' => 'participant'], function (){
    Route::get          ('/',                            'ParticipantController@index'                          )->name('reason');
    Route::post         ('/save',                        'ParticipantController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'ParticipantController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'ParticipantController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ParticipantController@destroy'                        )->name('reason_update');
});

// SEMINAR
Route::group(['prefix' => 'seminar'], function (){
    Route::get          ('/',                            'SeminarController@index'                          )->name('reason');
    Route::post         ('/save',                        'SeminarController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'SeminarController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'SeminarController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'SeminarController@destroy'                        )->name('reason_update');
});

// SUGGESTION
Route::group(['prefix' => 'suggestion'], function (){
    Route::get          ('/',                            'SuggestionController@index'                          )->name('reason');
    Route::post         ('/save',                        'SuggestionController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'SuggestionController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'SuggestionController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'SuggestionController@destroy'                        )->name('reason_update');
});

// YOUTH
Route::group(['prefix' => 'youth'], function (){
    Route::get          ('/',                            'YouthController@index'                          )->name('reason');
    Route::post         ('/save',                        'YouthController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'YouthController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'YouthController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'YouthController@destroy'                        )->name('reason_update');
});

// STREET
Route::group(['prefix' => 'street'], function (){
    Route::get          ('/',                            'StreetController@index'                          )->name('reason');
    Route::post         ('/save',                        'StreetController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'StreetController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'StreetController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'StreetController@destroy'                        )->name('reason_update');
});

// STREET
Route::group(['prefix' => 'case'], function (){
    Route::get          ('/',                            'CaseTypeController@index'                          )->name('reason');
    Route::post         ('/save',                        'CaseTypeController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'CaseTypeController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'CaseTypeController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CaseTypeController@destroy'                        )->name('reason_update');
});

// CICL
Route::group(['prefix' => 'cicl'], function (){
    Route::get          ('/',                            'CiclController@index'                          )->name('reason');
    Route::post         ('/save',                        'CiclController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'CiclController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'CiclController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CiclController@destroy'                        )->name('reason_update');
});

// PWD
Route::group(['prefix' => 'pwd_list'], function (){
    Route::get          ('/',                            'PwdListController@index'                          )->name('reason');
    Route::post         ('/save',                        'PwdListController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'PwdListController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'PwdListController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'PwdListController@destroy'                        )->name('reason_update');
});

// PWD
Route::group(['prefix' => 'pwd'], function (){
    Route::get          ('/',                            'PwdController@index'                          )->name('reason');
    Route::post         ('/save',                        'PwdController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'PwdController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'PwdController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'PwdController@destroy'                        )->name('reason_update');
});

// PWD
Route::group(['prefix' => 'calendar'], function (){
    Route::get          ('/',                            'CalendarController@index'                          )->name('reason');
    Route::post         ('/save',                        'CalendarController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'CalendarController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'CalendarController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CalendarController@destroy'                        )->name('reason_update');
});

// COUNCIL
Route::group(['prefix' => 'council'], function (){
    Route::get          ('/',                            'CouncilController@index'                          )->name('reason');
    Route::post         ('/save',                        'CouncilController@store'                          )->name('reason');
    Route::get          ('/edit/{id}',                   'CouncilController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'CouncilController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'CouncilController@destroy'                        )->name('reason_update');
});

// COUNCIL
Route::group(['prefix' => 'project'], function (){
    Route::get          ('/',                            'ProjectController@index'                          )->name('reason');
    Route::post         ('/save',                        'ProjectController@store'                          )->name('reason');
    Route::get          ('/show/{id}',                   'WebsiteController@show'                           )->name('reason');
    Route::get          ('/edit/{id}',                   'ProjectController@edit'                           )->name('reason');
    Route::post         ('/update/{id}',                 'ProjectController@update'                         )->name('reason_update');
    Route::get          ('/destroy/{id}',                'ProjectController@destroy'                        )->name('reason_update');
});

Route::get('glide/{path}', function($path){
    $server = \League\Glide\ServerFactory::create([
        'source' => app('filesystem')->disk('public')->getDriver(),
    'cache' => storage_path('glide'),
    ]);
    return $server->getImageResponse($path, Input::query());
})->where('path', '.+');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
