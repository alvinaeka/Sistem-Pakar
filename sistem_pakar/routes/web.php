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

// Route::get('/', 'PagesController@Index');

// Route::get('/Diagnosa', 'Diagnosacontroller@diagnosa');

// Route::get('/Penyakit', 'PenyakitController@index');
// Route::get('/Penyakit/Create', 'PenyakitController@Create');
// Route::post('/Penyakit', 'PenyakitController@store');
// Route::delete('/Penyakit/{penyakit}', 'PenyakitController@destroy');
// Route::post('/Penyakit/{penyakit}/edit', 'PenyakitController@edit');
// Route::patch('/Penyakit/{penyakit}', 'PenyakitController@update');
Route::get('/login', 'AuthController@login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@postregister');
Route::get('/Test', 'DiagnosaPenyakitController@test');

Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
    Route::resource('ManageDataPenyakit','PenyakitController');
    Route::resource('ManageDataGejalaPenyakit','PenyakitGejalaController');
    Route::get('/DataPenyakit', 'PenyakitController@indexpakar');
    Route::resource('ManageDataBasisPengPenyakit', 'BasisPengetahuanPenyakitController');
    Route::delete('ManageDataBasisPengPenyakit/{penyakit}/{gejala}', 'BasisPengetahuanPenyakitController@destroy');
    Route::resource('ManageDataLatihPenyakit', 'DataLatihPenyakitController');

    Route::resource('ManageDataHama', 'HamaController');
    Route::resource('ManageDataGejalaHama', 'HamaGejalaController');
    Route::get('/DataHama', 'HamaController@indexpakar');
    Route::resource('ManageDataBasisPengHama', 'BasisPengetahuanHamaController');
    Route::delete('ManageDataBasisPengHama/{hama}/{gejala}', 'BasisPengetahuanHamaController@destroy');
    Route::resource('ManageDataLatihHama', 'DataLatihHamaController');
});
Route::group(['middleware' => ['auth', 'checkrole:member']], function(){
    Route::get('/InfoPenyakit', 'PenyakitController@indexmember');
    Route::get('/DiagnosaPenyakit', 'DiagnosaPenyakitController@index');
    Route::post('/HasilDiagnosaPenyakit', 'DiagnosaPenyakitController@proses');
    
    Route::get('/InfoHama', 'HamaController@indexmember');
    Route::get('/DiagnosaHama', 'DiagnosaHamaController@index');
    Route::post('/HasilDiagnosaHama', 'DiagnosaHamaController@proses');

    Route::get('/RiwayatDiagnosaPenyakit', 'RiwayatController@indexpenyakit');
    Route::get('/RiwayatDiagnosaHama', 'RiwayatController@indexhama');
});
Route::get('/Profile', 'ProfileController@show');


// Route::get('/home', 'HomeController@index')->name('home');
