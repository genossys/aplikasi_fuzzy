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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function () {
    return view('/admin/menuawal');
})->name('admin');

Route::prefix('kelas')->group(function (){
    Route::get('/','Master\kelasControl@index')->name('dataKelas');
    Route::get('/dataKelas', 'Master\kelasControl@getData')->name('getDataKelas');
    Route::post('/simpanDataKelas', 'Master\kelasControl@insert')->name('insertDataKelas');
    Route::delete('/hapusDataKelas','Master\kelasControl@delete')->name('deleteDataKelas');
    Route::post('/ubahDataKelas','Master\kelasControl@update')->name('updateDataKelas');
    Route::get('/s','Master\kelasControl@index')->name('dataKelass');
});

Route::prefix('siswa')->group(function (){
    Route::get('/','Master\siswaControl@index')->name('dataSiswa');
    Route::get('/dataSiswa','Master\siswaControl@getData')->name('getDataSiswa');
    Route::get('/dataKelas','Master\siswaControl@getDataKelas')->name('getListKelas');
    Route::post('/simpanDataSiswa','Master\siswaControl@insert')->name('insertDataSiswa');
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

<<<<<<< HEAD
tes dancuk i weee
=======
tesasu
>>>>>>> e7ae2d1e05112adff67451d057404ab5b5c3ef42
