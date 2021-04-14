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

use App\Http\Controllers\AllController;
use App\Http\Controllers\MainController;



Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
Route::get('/card-order', 'AllController@Cardorder')->name('cardOrder-URL');
Route::post('/card-order', 'AllController@CardorderPost');

Route::group(['middleware'=>'auth'],function () {
    // Route::post('/')
    Route::post('/ajax', 'AllController@ajax');
    Route::get('/workeredit{workerid?}', 'MainController@workerEdit');
    Route::post('/workeredit', 'MainController@workerEditPost');
    Route::get('/', function() {return view('ready.index');});
    Route::get('/group{group_id?}', 'AllController@group')->name('group');
    Route::post('/group{group_id?}', 'AllController@groupAdd');
    Route::get('/workers', 'AllController@workers')->name('workers');
    Route::post('/workers', 'AllController@workersAdd');
    Route::get('/print', 'AllController@getPrint')->name('print');
    Route::get('/search{search?}', 'AllController@search')->name('search');
    Route::post('/search{search?}', 'AllController@searchPost')->name('search');
    Route::get('/getGroupInfo', 'AllController@getGroupInfo');

    Route::get('/print', 'AllController@getPrint')->name('print-get');
    Route::get('/personal', 'MainController@getPersonal')->name('personal');
    Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
    Route::get('/selected', 'AllController@selected')->name('selected');
    Route::post('/selected', 'AllController@selectedPost');
});


