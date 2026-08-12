<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrangTuaAuthController;

use App\Http\Controllers\Pengguna\DashboardController as PenggunaDashboardController;

use App\Http\Controllers\Admin\KepalaSekolahController;

use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\PpdbController;
use App\Http\Controllers\PendaftaranController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\InformasiSekolahController;

use App\Http\Controllers\SuperAdmin\DashboardController as SuperDashboardController;


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ORANG TUA
|--------------------------------------------------------------------------
*/

// Halaman register orang tua
Route::get('/orangtua/register', [OrangTuaAuthController::class, 'register'])
    ->name('orangtua.register');

// Proses register orang tua
Route::post('/orangtua/register', [OrangTuaAuthController::class, 'store'])
    ->name('orangtua.register.store');

// Halaman login orang tua
Route::get('/orangtua/login', [OrangTuaAuthController::class, 'login'])
    ->name('orangtua.login');

// Proses login orang tua
Route::post('/orangtua/login', [OrangTuaAuthController::class, 'authenticate'])
    ->name('orangtua.authenticate');

// Dashboard orang tua
Route::get('/orangtua/dashboard', [OrangTuaAuthController::class, 'dashboard'])
    ->middleware('auth:orangtua')
    ->name('orangtua.dashboard');

// Logout orang tua
Route::post('/orangtua/logout', [OrangTuaAuthController::class, 'logout'])
    ->name('orangtua.logout');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| WEBSITE PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/profil', function () {
    return redirect()->route('profil.sambutan');
})->name('profil');

Route::get('/profil/sambutan', [ProfilSekolahController::class, 'sambutan'])
    ->name('profil.sambutan');

Route::get('/profil/sejarah', [ProfilSekolahController::class, 'sejarah'])
    ->name('profil.sejarah');

Route::get('/profil/visi-misi', [VisiMisiController::class, 'tampil'])
    ->name('profil.visi-misi');

Route::get('/profil/struktur-organisasi', [StrukturOrganisasiController::class, 'tampil'])
    ->name('profil.struktur-organisasi');


/*
|--------------------------------------------------------------------------
| WEBSITE MENU PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/guru', [GuruController::class, 'tampilGuru'])
    ->name('guru');

Route::get('/fasilitas', [FasilitasController::class, 'tampilFasilitas'])
    ->name('fasilitas');

Route::get('/galeri', function () {
    return redirect()->route('galeri.foto');
})->name('galeri');

Route::get('/galeri/foto', [GaleriController::class, 'foto'])
    ->name('galeri.foto');

Route::get('/berita', [BeritaController::class, 'tampilBerita'])
    ->name('berita');

Route::get('/kontak', [KontakController::class, 'tampilKontak'])
    ->name('kontak');


/*
|--------------------------------------------------------------------------
| PPDB PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/ppdb', [PendaftaranController::class, 'akun'])
    ->name('ppdb.akun');

Route::get('/ppdb/step1', [PendaftaranController::class, 'step1'])
    ->name('ppdb.step1');

Route::post('/ppdb/step1', [PendaftaranController::class, 'storeStep1'])
    ->name('ppdb.storeStep1');


/*
|--------------------------------------------------------------------------
| PPDB PENDAFTARAN
|--------------------------------------------------------------------------
*/

Route::get('/ppdb/step2', [PendaftaranController::class, 'step2'])
    ->name('ppdb.step2');

Route::post('/ppdb/step2', [PendaftaranController::class, 'storeStep2'])
    ->name('ppdb.storeStep2');


Route::get('/ppdb/step3', [PendaftaranController::class, 'step3'])
    ->name('ppdb.step3');

Route::post('/ppdb/step3', [PendaftaranController::class, 'storeStep3'])
    ->name('ppdb.storeStep3');


Route::get('/ppdb/bukti/{id}', [PendaftaranController::class, 'bukti'])
    ->name('ppdb.bukti');


Route::get('/ppdb/pdf/{id}', [PendaftaranController::class, 'downloadPdf'])
    ->name('ppdb.pdf');
/*
|--------------------------------------------------------------------------
| PENGGUNA AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:user'])
    ->prefix('pengguna')
    ->group(function () {

        Route::get('/', [PenggunaDashboardController::class, 'index'])
            ->name('pengguna.dashboard');
    });

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
|
| Dapat diakses oleh:
| - admin
| - super_admin
|
*/

Route::middleware(['auth', 'role:admin,super_admin'])
    ->prefix('admin')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | SEJARAH SEKOLAH
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/sejarah-sekolah',
            [ProfilSekolahController::class, 'sejarahAdmin']
        )->name('admin.sejarah-sekolah.index');

        Route::get(
            '/sejarah-sekolah/edit',
            [ProfilSekolahController::class, 'editSejarah']
        )->name('admin.sejarah-sekolah.edit');

        Route::put(
            '/sejarah-sekolah',
            [ProfilSekolahController::class, 'updateSejarah']
        )->name('admin.sejarah-sekolah.update');
        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */
        Route::get('/kepala-sekolah', [KepalaSekolahController::class, 'index'])
            ->name('admin.kepala-sekolah.index');

        Route::get('/kepala-sekolah/edit', [KepalaSekolahController::class, 'edit'])
            ->name('admin.kepala-sekolah.edit');

        Route::put('/kepala-sekolah', [KepalaSekolahController::class, 'update'])
            ->name('admin.kepala-sekolah.update');
        /*
        |--------------------------------------------------------------------------
        | DATA SEKOLAH
        |--------------------------------------------------------------------------
        */

        Route::resource('profil', ProfilSekolahController::class);

        Route::resource('visi-misi', VisiMisiController::class);

        Route::resource('guru', GuruController::class);

        Route::resource('fasilitas', FasilitasController::class);

        Route::resource(
            'struktur-organisasi',
            StrukturOrganisasiController::class
        );


        /*
        |--------------------------------------------------------------------------
        | PUBLIKASI
        |--------------------------------------------------------------------------
        */

        Route::resource('galeri', GaleriController::class);

        Route::resource('berita', BeritaController::class);


        /*
        |--------------------------------------------------------------------------
        | PPDB
        |--------------------------------------------------------------------------
        */

        Route::resource('ppdb', PpdbController::class);


        /*
        |--------------------------------------------------------------------------
        | KONTAK
        |--------------------------------------------------------------------------
        */

        Route::resource('kontak', KontakController::class);


        /*
        |--------------------------------------------------------------------------
        | DATA PENDAFTARAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pendaftaran',
            [PendaftaranController::class, 'indexAdmin']
        )->name('admin.pendaftaran.index');

        Route::get(
            '/pendaftaran/{id}',
            [PendaftaranController::class, 'showAdmin']
        )->name('admin.pendaftaran.show');

        Route::get(
            '/pendaftaran/{id}/edit',
            [PendaftaranController::class, 'editAdmin']
        )->name('admin.pendaftaran.edit');

        Route::put(
            '/pendaftaran/{id}',
            [PendaftaranController::class, 'updateAdmin']
        )->name('admin.pendaftaran.update');

        Route::delete(
            '/pendaftaran/{id}',
            [PendaftaranController::class, 'destroyAdmin']
        )->name('admin.pendaftaran.destroy');


        /*
        |--------------------------------------------------------------------------
        | INFORMASI SEKOLAH
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/informasi-sekolah',
            [InformasiSekolahController::class, 'index']
        )->name('admin.informasi.index');

        Route::get(
            '/informasi-sekolah/create',
            [InformasiSekolahController::class, 'create']
        )->name('admin.informasi.create');

        Route::post(
            '/informasi-sekolah',
            [InformasiSekolahController::class, 'store']
        )->name('admin.informasi.store');

        Route::get(
            '/informasi-sekolah/{id}',
            [InformasiSekolahController::class, 'show']
        )->name('admin.informasi.show');

        Route::get(
            '/informasi-sekolah/{id}/edit',
            [InformasiSekolahController::class, 'edit']
        )->name('admin.informasi.edit');

        Route::put(
            '/informasi-sekolah/{id}',
            [InformasiSekolahController::class, 'update']
        )->name('admin.informasi.update');

        Route::delete(
            '/informasi-sekolah/{id}',
            [InformasiSekolahController::class, 'destroy']
        )->name('admin.informasi.destroy');

        Route::post(
            '/informasi-sekolah/{id}/kirim-email',
            [InformasiSekolahController::class, 'kirimEmail']
        )->name('admin.informasi.kirim-email');
    });



/*
|--------------------------------------------------------------------------
| SUPER ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:super_admin'])
    ->prefix('super-admin')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD SUPER ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/', [SuperDashboardController::class, 'index'])
            ->name('super.dashboard');


        /*
        |--------------------------------------------------------------------------
        | MANAJEMEN USER
        |--------------------------------------------------------------------------
        */

        Route::resource('users', UserManagementController::class)
            ->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/logs',
            [ActivityLogController::class, 'index']
        )->name('super.logs');
    });
