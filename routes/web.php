<?php

use Illuminate\Http\Request;
use App\Http\Controller;
use App\Http\Middleware;

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
    return view('welcome');
});

Route::get('/abp', function(Request $request){
    $nama = $request->nama ?: 'Anonim';
    $userAgent = $request->header('User-Agent');
    
    return $userAgent;  //digunakan untuk mengetahui si user lebih sering menggunakan browser apa -> analisis
    // return 'Welcome to ABP '.$nama .'!!!';
});

Route::get('/mahasiswa/{nim}', 'AbpController@getMahasiswa')->middleware(AgeChecker::class);

Route::get('/mahalama/{nim}', function(){
    return redirect('mahasiswa/12345')->with('pesan', 'mahasiswa lama sudah tidak ada');
});

Route::get('/students', 'MahasiswaController@showAll');
Route::get('/students/{nim}', 'MahasiswaController@showMahasiswa')->name('students.detail');

Route::get('/students_add', 'MahasiswaController@showAdd');

Route::post('/students_add', 'MahasiswaController@simpan');