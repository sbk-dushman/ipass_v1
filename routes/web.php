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

use App\Http\Controllers\MainController;

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
Route::get('/card-order', 'MainController@Cardorder')->name('cardOrder-URL');

Route::get('/group{group_id?}', 'MainController@group');
Route::get('/search', 'MainController@search');
Route::get('/selected', 'MainController@selected');
Route::get('/group{group_id?}', 'MainController@getTableList');

Route::group(['middleware'=>'auth'],function () { //если забыл пароль админа коментируй эту строчку
// Route::get('/', 'MainController@index');
// Route::get('/print', 'PrintController@getPrint')->name('print-get');

// Route::post('/search', 'SearchController@searchPost')->name('search-post');

// Route::get('/search', 'SearchController@searchGet')->name('search-get');


Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
}); //и эту строчку


