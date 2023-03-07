<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GuruController, HomeController, KelasController, MapelController, NilaiController, SiswaController, SessionController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Berikut adalah tempat di mana Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dalam grup yang berisi grup middleware
| "web". Sekarang buatlah sesuatu yang hebat!
|
*/

//not in group
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

//Route Group guest
Route::group(['middleware'=>['isTamu']], function()
{
    Route::get('/login', [SessionController::class,'index'])->name('login');
    Route::get('/register', [SessionController::class, 'register'])->name('register');
    Route::post('/buat', [SessionController::class, 'create']);
    Route::post('/masuk', [SessionController::class,'login']);
});

//Route Application
Route::group(['middleware'=> ['isLogin','checkRole:Admin']], function()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //Halaman Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('profileSiswa');
    Route::get('/siswa/add', [SiswaController::class, 'add'])->name('addSiswa');
    Route::post('/siswa/simpan', [SiswaController::class, 'simpan']);
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('editSiswa');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update']);
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'delete']);

    //Halaman Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas/simpan', [KelasController::class, 'add']);
    Route::put('/kelas/update/{id}', [KelasController::class, 'update']);
    Route::delete('/kelas/delete/{id}', [KelasController::class, 'delete']);

    //Halaman Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/guru/profile/{id}', [GuruController::class, 'profile'])->name('profileguru');
    Route::get('/guru/add', [GuruController::class, 'add'])->name('addGuru');
    Route::post('/guru/simpan', [GuruController::class, 'simpan']);
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('editguru');
    Route::put('/guru/update/{id}', [GuruController::class, 'update']);
    Route::delete('/guru/delete/{id}', [GuruController::class, 'delete']);

    //Halaman Mapel
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::post('/mapel/simpan', [MapelController::class, 'add']);
    Route::put('/mapel/update/{id}', [MapelController::class, 'update']);
    Route::get('/mapel/delete/{id}', [MapelController::class, 'delete']);
    Route::get('/TA-semester', [MapelController::class, 'show'])->name('tahunajar');
    Route::put('/semester/update/{id}', [MapelController::class, 'updateSemester']);

    //NilaiMid
    Route::get('/nilai', [NilaiController::class, 'index'])->name('mid');
    Route::get('/nilai/{id}/lihat', [NilaiController::class, 'berinilai']);
    Route::get('/nilai/{id}/cetak', [NilaiController::class, 'cetak']);
    //Nilai Semester
    Route::get('/nilai-semester', [NilaiController::class, 'show'])->name('semester');
    Route::get('/nilai-semester/{id}/look', [NilaiController::class, 'kasihNilai']);
    Route::get('/nilai-semester/{id}/cetak', [NilaiController::class, 'print']);
});

Route::group(['middleware'=>['isLogin','checkRole: Admin, Guru']], function()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('profileSiswa');

    Route::get('/nilai', [NilaiController::class, 'index'])->name('mid');
    Route::get('/nilai/{id}/lihat', [NilaiController::class, 'berinilai']);

    Route::get('/nilai-semester', [NilaiController::class, 'show'])->name('semester');
    Route::get('/nilai-semester/{id}/look', [NilaiController::class, 'kasihNilai']);
});

Route::group(['middleware'=>'isLogin','checkRole: Guru'], function()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
    Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('profileSiswa');
    //NilaiMid
    Route::get('/nilai', [NilaiController::class, 'index'])->name('mid');
    Route::get('/nilai/{id}/lihat', [NilaiController::class, 'berinilai']);
    Route::post('/nilai/{id}/addNilai', [NilaiController::class, 'addNilai']);
    Route::post('/nilai/{id}/updateNilai', [NilaiController::class, 'updateNilai']);
    Route::get('/nilai/{id}/cetak', [NilaiController::class, 'cetak']);
    Route::post('/nilai/{id}', [NilaiController::class, 'ajax'])->name('ajax');


    //Nilai Semester
    Route::get('/nilai-pengetahuan', [NilaiController::class, 'pengetahuan'])->name('pengetahuan');//Nilai Pengetahuan
    Route::get('/nilai-pengetahuan/{id}/siswa', [NilaiController::class, 'nilai_p']);
    Route::post('/nilai-pengetahuan/{id}/insert', [NilaiController::class, 'insertp']);
    Route::put('/nilai-pengetahuan/{id}/update', [NilaiController::class, 'editp']);

    Route::get('/nilai-keterampilan', [NilaiController::class, 'keterampilan'])->name('keterampilan'); //Nilai keterampilan
    Route::get('/nilai-keterampilan/{id}/siswa', [NilaiController::class, 'nilai_k']);
    Route::put('/nilai-keterampilan/{id}/update', [NilaiController::class, 'editk']);

    Route::post('/nilai-semester/{id}/add',[NilaiController::class,'tambahNilai'])->name('semesterSimpan');
    Route::put('/nilai-semester/{id}/update', [NilaiController::class, 'editNilai']);
    Route::get('/nilai-semester/{id}/cetak', [NilaiController::class, 'print']);

    //Nilai Sikap
    Route::get('/nilai-sikap', [NilaiController::class, 'sikap'])->name('sikap');
    Route::put('/nilai-sikap/{id}/update', [NilaiController::class, 'update']);
});


Route::group(['middleware'=>'isLogin', 'checkRole: Siswa'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/siswa/check-ranking', [SiswaController::class, 'checkRanking'])->name('ranking');
});
Route::group(['middleware' => 'isLogin', 'checkRole: Admin, Guru, Siswa'], function () {
    Route::get('/user/update', [SessionController::class, 'update'])->name('updateAkun');
    Route::post('/update-password', [SessionController::class, 'updateUser'])->name('update-password');
});
