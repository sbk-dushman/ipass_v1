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

Route::get('/selected', 'AllController@selected');
Route::post('/selected', 'AllController@selectedPost');

Route::get('/group{group_id?}', 'AllController@group');
Route::post('/group{group_id?}', 'AllController@groupAdd');

Route::get('/workers', 'AllController@workers');
Route::post('/workers', 'AllController@workersAdd');



Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
Route::get('/card-order', 'MainController@Cardorder')->name('cardOrder-URL');
Route::get('/', 'MainController@group');
// Route::get('/group{group_id?}', 'MainController@group');
// Route::get('/search', 'MainController@search');
// Route::get('/selected', 'MainController@selected')->name('selecteds');
// Route::post('/selected', 'MainController@postSelected');
// Route::get('/group{group_id?}', 'MainController@getTableList');
Route::get('/workeredit{workerid?}', 'MainController@workerEdit');
// Route::post('/group{group_id?}', 'MainController@postTableList');
Route::post('/workeredit', 'MainController@workerEditPost');
// Route::group(['middleware'=>'auth'],function () { //если забыл пароль админа коментируй эту строчку
// // Route::get('/', 'MainController@index');
    Route::get('/print', 'MainController@getPrint')->name('print-get');

    Route::post('/search', 'MainController@searchPost')->name('search-post');

    Route::get('/search', 'MainController@searchGet')->name('search-get');
Route::get('/personal', 'MainController@getPersonal')->name('personal');

    Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
// }); //и эту строчку


