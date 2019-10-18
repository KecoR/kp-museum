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
    return redirect('/home');
});

// Auth::routes();

Route::get('/dataPengunjung', 'PengunjungController@dataPengunjung')->name('dataPengunjung');
Route::get('/dataPengunjungNow', 'PengunjungController@dataPengunjungNow')->name('dataPengunjungNow');
Route::get('/inputPengunjung', 'PengunjungController@inputPengunjung')->name('inputPengunjung');
Route::get('/exportToExcel', 'PengunjungController@exporttoExcel')->name('exporttoExcel');
Route::get('/exportToExcelNow', 'PengunjungController@exporttoExcelNow')->name('exporttoExcelNow');

Route::post('/inputPengunjungSave', 'PengunjungController@inputPengunjungSave')->name('inputPengunjungSave');

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
