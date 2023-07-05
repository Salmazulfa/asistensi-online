<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AslabController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MahasiswaController;

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
//LOGIN//
Route::get('/', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login']);


// ADMIN
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware('auth');

Route::get('/admin/dataAdmin', [AdminController::class, 'dataAdmin'])->middleware('auth');
Route::get('/admin/tambahData', [UserController::class, 'tambahData'])->middleware('auth');
Route::post('/admin/saveData', [UserController::class, 'saveData'])->middleware('auth');
Route::get('/admin/editAdmin/{id}', [AdminController::class, 'editAdmin'])->middleware('auth');
Route::post('/admin/updateAdmin', [AdminController::class, 'updateAdmin'])->middleware('auth');
Route::delete('/admin/hapusAdmin/{id}', [AdminController::class, 'hapusAdmin'])->middleware('auth');

Route::get('/admin/dataDosen', [DosenController::class, 'dataDosen'])->middleware('auth');
Route::get('/admin/editDosen/{id}', [DosenController::class, 'editDosen'])->middleware('auth');
Route::post('/admin/updateDosen', [DosenController::class, 'updateDosen'])->middleware('auth');
Route::delete('/admin/hapusDosen/{id}', [DosenController::class, 'hapusDosen'])->middleware('auth');

Route::get('/admin/dataAslab', [AslabController::class, 'dataAslab'])->middleware('auth');
Route::get('/admin/editAslab/{id}', [AslabController::class, 'editAslab'])->middleware('auth');
Route::post('/admin/updateAslab', [AslabController::class, 'updateAslab'])->middleware('auth');
Route::delete('/admin/hapusAslab/{id}', [AslabController::class, 'hapusAslab'])->middleware('auth');

Route::get('/admin/dataMhs', [MahasiswaController::class, 'dataMhs'])->middleware('auth');
Route::get('/admin/editMhs/{id}', [MahasiswaController::class, 'editMhs'])->middleware('auth');
Route::post('/admin/updateMhs', [MahasiswaController::class, 'updateMhs'])->middleware('auth');
Route::delete('/admin/hapusMhs/{id}', [MahasiswaController::class, 'hapusMhs'])->middleware('auth');

Route::get('/admin/dataMatkul', [MatkulController::class, 'dataMatkul'])->middleware('auth');
Route::post('/admin/saveMatkul', [MatkulController::class, 'saveMatkul'])->middleware('auth');
Route::post('/admin/updateMatkul/{id}', [MatkulController::class, 'updateMatkul'])->middleware('auth');
Route::delete('/admin/hapusMatkul/{id}', [MatkulController::class, 'hapusMatkul'])->middleware('auth');

Route::get('/admin/nilaiMhs', [LaporanController::class, 'index'])->middleware('auth');
Route::get('/admin/detailNilai/{id}', [LaporanController::class, 'detail'])->middleware('auth');


Route::get('/profile/admin', [AdminController::class, 'profile'])->middleware('auth');
Route::post('/updateProfile/admin', [AdminController::class, 'updateProfile'])->middleware('auth');
Route::get('/ubahpw/admin', [AdminController::class, 'ubahpw'])->middleware('auth');
Route::post('/updatepw/admin', [AdminController::class, 'updatePw'])->middleware('auth');

// DOSEN
Route::get('/dosen/dashboard', [DosenController::class, 'index'])->middleware('auth');

Route::get('/profile/dosen', [DosenController::class, 'profile'])->middleware('auth');
Route::post('/updateprofile/dosen', [DosenController::class, 'updateProfile'])->middleware('auth');
Route::get('/ubahpw/dosen', [DosenController::class, 'ubahpw'])->middleware('auth');
Route::post('/updatepw/dosen', [DosenController::class, 'updatePwDosen'])->middleware('auth');

Route::get('/dosen/materi', [MateriController::class, 'materi'])->middleware('auth');
Route::get('/dosen/tambahMateri', [MateriController::class, 'tambahMateri'])->middleware('auth');
Route::get('/dosen/editMateri/{id}', [MateriController::class, 'editMateri'])->middleware('auth');
Route::post('/dosen/updateMateri', [MateriController::class, 'updateMateri'])->middleware('auth');
Route::post('/dosen/saveMateri', [MateriController::class, 'store'])->middleware('auth');
Route::delete('/dosen/hapusMateri/{id}', [MateriController::class, 'hapusMateri'])->middleware('auth');

Route::get('/dosen/nilaiMhs', [LaporanController::class, 'nilai'])->middleware('auth');
Route::get('/dosen/editNilai/{id}', [LaporanController::class, 'editNilai'])->middleware('auth');
Route::post('/dosen/updateNilaiDosen', [LaporanController::class, 'updateNilaiDosen'])->middleware('auth');

// ASLAB
Route::get('/aslab/morris', [AslabController::class, 'morris'])->middleware('auth');
Route::get('/aslab/dashboard', [AslabController::class, 'index'])->middleware('auth');
Route::get('/aslab/materi', [MateriController::class, 'aslabMateri'])->middleware('auth');
Route::get('/aslab/detailMateri/{id}', [MateriController::class, 'aslabDetailMateri'])->middleware('auth');
Route::get('/aslab/nilai', [LaporanController::class, 'aslabNilai'])->middleware('auth');
Route::get('/aslab/penilaian/{id}', [LaporanController::class, 'penilaian'])->middleware('auth');
Route::post('/aslab/penilaian/save', [LaporanController::class, 'savePenilaian'])->middleware('auth');

Route::get('/profile/aslab', [AslabController::class, 'profile'])->middleware('auth');
Route::post('/updateprofile/aslab', [AslabController::class, 'updateProfile'])->middleware('auth');
Route::get('/ubahpw/aslab', [AslabController::class, 'ubahpw'])->middleware('auth');
Route::post('/updatepw/aslab', [AslabController::class, 'updatePwAslab'])->middleware('auth');

// MAHASISWA
Route::get('/mhs/dashboard', [MahasiswaController::class, 'index'])->middleware('auth');

Route::get('/mhs/nilai', [LaporanController::class, 'nilaiMhs'])->middleware('auth');

Route::get('/mk/web', [MateriController::class, 'web'])->middleware('auth');
Route::get('/mk/web/detail/{id}', [MateriController::class, 'detailWeb'])->middleware('auth');
Route::get('/web/laporan', [MateriController::class, 'laporanweb'])->middleware('auth');
Route::post('/web/laporan/save', [LaporanController::class, 'saveWeb'])->middleware('auth');
Route::post('/web/laporan/update', [LaporanController::class, 'updateWeb'])->middleware('auth');

Route::get('/mk/fr', [MateriController::class, 'fr'])->middleware('auth');
Route::get('/mk/fr/detail/{id}', [MateriController::class, 'detailFr'])->middleware('auth');
Route::get('/fr/laporan', [MateriController::class, 'laporanFr'])->middleware('auth');
Route::post('/fr/laporan/save', [LaporanController::class, 'saveFr'])->middleware('auth');
Route::post('/fr/laporan/update', [LaporanController::class, 'updateFr'])->middleware('auth');

Route::get('/mk/si', [MateriController::class, 'si'])->middleware('auth');
Route::get('/mk/si/detail/{id}', [MateriController::class, 'detailSi'])->middleware('auth');
Route::get('/si/laporan', [MateriController::class, 'laporanSi'])->middleware('auth');
Route::post('/si/laporan/save', [LaporanController::class, 'saveSi'])->middleware('auth');
Route::post('/si/laporan/update', [LaporanController::class, 'updateSi'])->middleware('auth');

Route::get('/profile/mhs', [MahasiswaController::class, 'profile'])->middleware('auth');
Route::post('/updateprofile/mhs', [MahasiswaController::class, 'updateProfile'])->middleware('auth');
Route::get('/ubahpw/mhs', [MahasiswaController::class, 'ubahpw'])->middleware('auth');
Route::post('/updatepw/mhs', [MahasiswaController::class, 'updatePwMhs'])->middleware('auth');


//LOGOUT//
Route::post('/logout', [UserController::class, 'logout']);
