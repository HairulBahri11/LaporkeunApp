<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/layout', function () {

    return view('component/layout_app');
});

Route::get('/kirim-email', [App\Http\Controllers\pengaduanController::class, 'sendemail'])->name('kirim-email');

// authController get login and register

Route::get('/login', [App\Http\Controllers\authController::class, 'login_index'])->name('login');
Route::get('/register', [App\Http\Controllers\authController::class, 'register_index'])->name('register');
Route::post('/register_action', [App\Http\Controllers\authController::class, 'register'])->name('register_action');
Route::post('/login_action', [App\Http\Controllers\authController::class, 'login'])->name('login_action');
Route::post('logout', [\App\Http\Controllers\authController::class, 'logout'])->name('logout');
// get chart
Route::get('/chart', [App\Http\Controllers\homeController::class, 'myChart'])->name('chart');
Route::get('/', [App\Http\Controllers\homeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'role:admin'], function () {
        // data guru
        Route::group(['prefix' => 'data_guru'], function () {
            Route::get('/', [App\Http\Controllers\guruController::class, 'index'])->name('data_guru');
            Route::get('/tambah_guru', [App\Http\Controllers\guruController::class, 'create'])->name('tambah_guru');
            Route::post('/tambah_guru_action', [App\Http\Controllers\guruController::class, 'store'])->name('tambah_guru_action');
            Route::get('/edit_guru/{id}', [App\Http\Controllers\guruController::class, 'edit'])->name('edit_guru');
            Route::post('/edit_guru_action/{id}', [App\Http\Controllers\guruController::class, 'update'])->name('edit_guru_action');
            Route::post('/delete_guru/{id}', [App\Http\Controllers\guruController::class, 'destroy'])->name('delete_guru');
            Route::post('/update_status/{id}', [App\Http\Controllers\guruController::class, 'active'])->name('active_guru');
        });
        Route::group(['prefix' => 'data_siswa'], function () {
            Route::get('/', [App\Http\Controllers\siswaController::class, 'index'])->name('data_siswa');
            Route::get('/tambah_siswa', [App\Http\Controllers\siswaController::class, 'create'])->name('tambah_siswa');
            Route::post('/tambah_siswa_action', [App\Http\Controllers\siswaController::class, 'store'])->name('tambah_siswa_action');
            Route::get('/edit_siswa/{id}', [App\Http\Controllers\siswaController::class, 'edit'])->name('edit_siswa');
            Route::post('/edit_siswa_action/{id}', [App\Http\Controllers\siswaController::class, 'update'])->name('edit_siswa_action');
            Route::post('/delete_siswa/{id}', [App\Http\Controllers\siswaController::class, 'destroy'])->name('delete_siswa');
            Route::post('/update_status/{id}', [App\Http\Controllers\siswaController::class, 'active'])->name('active_siswa');
        });
        //pertanyaan
        Route::group(['prefix' => 'data_pertanyaan'], function () {
            Route::get('/', [App\Http\Controllers\pertanyaanController::class, 'index'])->name('data_pertanyaan');
            Route::get('/tambah_pertanyaan', [App\Http\Controllers\pertanyaanController::class, 'create'])->name('tambah_pertanyaan');
            Route::post('/tambah_pertanyaan_action', [App\Http\Controllers\pertanyaanController::class, 'store'])->name('tambah_pertanyaan_action');
            Route::get('/edit_pertanyaan/{id}', [App\Http\Controllers\pertanyaanController::class, 'edit'])->name('edit_pertanyaan');
            Route::post('/edit_pertanyaan_action/{id}', [App\Http\Controllers\pertanyaanController::class, 'update'])->name('edit_pertanyaan_action');
            Route::post('/delete_pertanyaan/{id}', [App\Http\Controllers\pertanyaanController::class, 'destroy'])->name('delete_pertanyaan');
            Route::post('/update_status/{id}', [App\Http\Controllers\pertanyaanController::class, 'active'])->name('active_pertanyaan');
        });

        Route::group(['prefix' => 'data_jawaban'], function () {
            Route::get('/{id}', [App\Http\Controllers\jawabanController::class, 'index'])->name('data_jawaban');
            Route::get('/tambah_jawaban/{id}', [App\Http\Controllers\jawabanController::class, 'create'])->name('tambah_jawaban');
            Route::post('/tambah_jawaban_action', [App\Http\Controllers\jawabanController::class, 'store'])->name('tambah_jawaban_action');
            Route::post('/delete_jawaban/{id}', [App\Http\Controllers\jawabanController::class, 'destroy'])->name('delete_jawaban');
        });

        Route::group(['prefix' => 'data_sekolah'], function () {
            Route::get('/', [App\Http\Controllers\sekolahController::class, 'index'])->name('data_sekolah');
            Route::get('/tambah_sekolah', [App\Http\Controllers\sekolahController::class, 'create'])->name('tambah_sekolah');
            Route::post('/tambah_sekolah_action', [App\Http\Controllers\sekolahController::class, 'store'])->name('tambah_sekolah_action');
            Route::get('/edit_sekolah/{id}', [App\Http\Controllers\sekolahController::class, 'edit'])->name('edit_sekolah');
            Route::post('/edit_sekolah_action/{id}', [App\Http\Controllers\sekolahController::class, 'update'])->name('edit_sekolah_action');
            Route::post('/delete_sekolah/{id}', [App\Http\Controllers\sekolahController::class, 'destroy'])->name('delete_sekolah');
            Route::post('/update_status/{id}', [App\Http\Controllers\sekolahController::class, 'active'])->name('active_sekolah');
        });
    });
    Route::group(['prefix' => 'data_pengaduan'], function () {
        Route::get('/', [App\Http\Controllers\pengaduanController::class, 'index'])->name('data_pengaduan');
        Route::get('/tambah_pengaduan', [App\Http\Controllers\pengaduanController::class, 'create'])->name('tambah_pengaduan');
        Route::post('/tambah_pengaduan_action', [App\Http\Controllers\pengaduanController::class, 'store'])->name('tambah_pengaduan_action');
        Route::get('/detail_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'show'])->name('detail_pengaduan');
        Route::get('/detail_pengaduan_ajax/{id}', [App\Http\Controllers\pengaduanController::class, 'detail_ajax'])->name('detail_pengaduan_ajax');

        Route::group(['middleware' => 'role:admin|guru'], function () {
            Route::get('/edit_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'edit'])->name('edit_pengaduan');
            Route::post('/edit_pengaduan_action/{id}', [App\Http\Controllers\pengaduanController::class, 'update'])->name('edit_pengaduan_action');
            Route::post('/delete_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'destroy'])->name('delete_pengaduan');
            Route::post('/update_status/{id}', [App\Http\Controllers\pengaduanController::class, 'status'])->name('status_pengaduan');
            Route::post('/proses_laporan/{id}', [App\Http\Controllers\pengaduanController::class, 'proses_laporan'])->name('proses_laporan');
        });
    });

    Route::group(['prefix' => 'data_profil'], function () {
        Route::get('/', [App\Http\Controllers\homeController::class, 'profile'])->name('data_profil');
    });

    Route::group(['middleware' => 'role:siswa'], function () {
        // add routes for siswa role here
    });

    // Route::group(['middleware' => 'role:admin', 'role:guru',], function () {
    //     Route::group(['prefix' => 'data_pengaduan'], function () {
    //         Route::get('/', [App\Http\Controllers\pengaduanController::class, 'index'])->name('data_pengaduan');
    //         Route::get('/tambah_pengaduan', [App\Http\Controllers\pengaduanController::class, 'create'])->name('tambah_pengaduan');
    //         Route::post('/tambah_pengaduan_action', [App\Http\Controllers\pengaduanController::class, 'store'])->name('tambah_pengaduan_action');
    //         Route::get('/detail_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'show'])->name('detail_pengaduan');
    //         Route::get('/edit_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'edit'])->name('edit_pengaduan');
    //         Route::post('/edit_pengaduan_action/{id}', [App\Http\Controllers\pengaduanController::class, 'update'])->name('edit_pengaduan_action');
    //         Route::post('/delete_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'destroy'])->name('delete_pengaduan');
    //         Route::post('/update_status/{id}', [App\Http\Controllers\pengaduanController::class, 'status'])->name('status_pengaduan');
    //         Route::post('/proses_laporan/{id}', [App\Http\Controllers\pengaduanController::class, 'proses_laporan'])->name('proses_laporan');
    //     });
    // });

    // Route::group(['prefix' => 'data_pengaduan'], function () {
    //     Route::get('/', [App\Http\Controllers\pengaduanController::class, 'index'])->name('data_pengaduan');
    //     Route::get('/tambah_pengaduan', [App\Http\Controllers\pengaduanController::class, 'create'])->name('tambah_pengaduan');
    //     Route::post('/tambah_pengaduan_action', [App\Http\Controllers\pengaduanController::class, 'store'])->name('tambah_pengaduan_action');
    //     Route::get('/detail_pengaduan/{id}', [App\Http\Controllers\pengaduanController::class, 'show'])->name('detail_pengaduan');
    //     Route::get('/detail_pengaduan_ajax/{id}', [App\Http\Controllers\pengaduanController::class, 'detail_ajax'])->name('detail_pengaduan_ajax');
    // });

    Route::group(['middleware' => 'role:siswa'], function () {
    });
});
