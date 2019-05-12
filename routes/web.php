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
    return view('/umum/welcome');
});
//Route::get('/', 'Master\kelasControl@sendWA');

Auth::routes();


//Login
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'],function(){

Route::get('/admin', function () {
    return view('/admin/menuawal');
})->name('admin');

Route::prefix('kelas')->group(function (){
    Route::get('/','Master\kelasControl@index')->name('dataKelas');
    Route::get('/dataKelas', 'Master\kelasControl@getData');
    Route::post('/simpanDataKelas', 'Master\kelasControl@insert')->name('insertDataKelas');
    Route::delete('/hapusDataKelas','Master\kelasControl@delete')->name('deleteDataKelas');
    Route::post('/ubahDataKelas','Master\kelasControl@update')->name('updateDataKelas');
});

Route::prefix('siswa')->group(function (){
    Route::get('/','Master\siswaControl@index')->name('dataSiswa');
    Route::get('/dataSiswa','Master\siswaControl@getData')->name('getDataSiswa');
    Route::get('/dataKelas','Master\siswaControl@getDataKelas')->name('getListKelas');
    Route::post('/simpanDataSiswa','Master\siswaControl@insert')->name('insertDataSiswa');
    Route::get('/siswabaru','Master\siswaControl@siswaBaru')->name('siswaBaru');
});


//Route::get('/datakelas', function () {
//    return view('/admin/master/datakelas');
//})->name('datakelas');

//Route::get('/datasiswa', function () {
//    return view('/admin/master/datasiswa');
//})->name('datasiswa');

Route::get('/siswabaru', function () {
    return view('/admin/master/tambahsiswa');
})->name('siswabaru');

Route::get('/dataperusahaan', function () {
    return view('/admin/master/dataperusahaan');
})->name('dataPerusahaan');

});

