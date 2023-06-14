<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ConfigurasiUserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Public\PeminjamanController as PeminjamanPublic;
use App\Models\Kategori;
use App\Exports\PeminjamanExport;
use Maatwebsite\Excel\Facades\Excel;

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
Route::get('/', function(){
    return view('welcome');
})->name('index');
Route::get('/about',function(){
    return view('about');
})->name('about');
Route::get('/faq',function(){
    return view('faq');
})->name('faq');

Route::prefix('peminjaman')->name('peminjaman.')->group(function () {
    Route::get('/', [PeminjamanPublic::class, 'create'])->name('create');
    Route::get('/{kode}', [PeminjamanPublic::class, 'show'])->name('show');
    Route::post('/cek-kode', [PeminjamanPublic::class, 'cek_kode'])->name('cek_kode');
    Route::prefix('get')->name('get.')->group(function () {
        Route::post('/kategori', [PeminjamanPublic::class, 'get_kategori'])->name('kategori');
        Route::post('/sub-categori', [PeminjamanPublic::class, 'get_subcategori'])->name('subcategori');
        Route::post('/produk', [PeminjamanPublic::class, 'get_produk'])->name('produk');
    });
    Route::post('/store', [PeminjamanPublic::class, 'store'])->name('store');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);

    Route::get('edit/sekolah', [App\Http\Controllers\User\SekolahController::class, 'edit'])->name('sekolah.edit.own');
    Route::patch('update/sekolah', [App\Http\Controllers\User\SekolahController::class, 'update'])->name('sekolah.update.own');
    Route::prefix('data-master')->group(function () {
        Route::resource('tahun-ajaran', TahunAjaranController::class);
        Route::resource('kelas', KelasController::class);
        Route::resource('jurusan', JurusanController::class);
    });

    Route::prefix('data-inventaris')->group(function () {
        Route::resource('kategori', KategoriController::class);
        Route::delete('produk/hapus-foto', [ProdukController::class, 'hapus_foto'])->name('produk.hapus_foto');
        Route::resource('produk', ProdukController::class);
        Route::get('produk/{id}/detail', [ProdukController::class, 'detail'])->name('produk.detail');
        Route::post('ruang/tambah-produk', [RuangController::class, 'tambah_produk'])->name('ruang.tambah_produk');
        Route::post('ruang/hapus-produk', [RuangController::class, 'hapus_produk'])->name('ruang.hapus_produk');
        Route::get('ruang/{id}/produk', [RuangController::class, 'get_produk'])->name('ruang.produk');
        Route::resource('ruang', RuangController::class);
    });
    
    Route::middleware(['check_role'])->group(function () {
        Route::name('users.')->prefix('users')->group(function () {
            Route::get('{role}', [UserController::class, 'index'])->name('index');
            Route::post('{role}/list', [UserController::class, 'list'])->name('list');
            Route::get('{role}/create', [UserController::class, 'create'])->name('create');
            Route::post('{role}', [UserController::class, 'store'])->name('store');
            Route::get('{role}/{id}/edit', [UserController::class, 'edit'])->name('edit');
            Route::get('{role}/{id}', [UserController::class, 'show'])->name('shows');
            Route::patch('{role}/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('{role}/{id}', [UserController::class, 'destroy'])->name('destroy');
        });

        // Export dan Import User
        Route::get('/import/users/{role}', [UserController::class, 'import']);
        Route::post('/import/users/{role}', [UserController::class, 'store_import']);
        Route::get('/export/users/{role}', [UserController::class, 'export']);
    });

    Route::resource('sekolah', App\Http\Controllers\SekolahController::class);

     // Profil
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('/', [ConfigurasiUserController::class, 'index'])->name('index');
        Route::get('/edit', [ConfigurasiUserController::class, 'edit'])->name('edit');
        Route::patch('/update', [ConfigurasiUserController::class, 'update'])->name('update');
        Route::get('/ubah-password', [ConfigurasiUserController::class, 'ubahPassword'])->name('ubah-password');
        Route::patch('/reset-password', [ConfigurasiUserController::class, 'reset_password'])->name('reset-password');
    });

    Route::patch('/admin/{id}', [ProfileController::class, 'updateAdmin'])->name('admin.update');
    Route::prefix('sub-kategori')->name('sub-kategori.')->group(function () {
        Route::post('update/{id?}', [KategoriController::class, 'updateSub'])->name('update');
        Route::delete('delete/{id?}', [KategoriController::class, 'deleteSub'])->name('destroy');
    });
    Route::get('getsub/{kategori_id?}', [KategoriController::class, 'getSub'])->name('get.sub');
    Route::get('produk/{sub_id}', [ProdukController::class, 'get'])->name('produk.get');

    Route::post('peminjamans/penagihan', [PeminjamanController::class, 'penagihan'])->name('peminjaman.penagihan');
    Route::resource('peminjamans', PeminjamanController::class);
    // Route::get('ruang/updateLokasiBarang/{id}', [RuangController::class, 'transfer_produk']);
    // Route::patch('ruang/updateLokasiBarang/{id}', [RuangController::class, 'updateLokasiBarang'])->name('ruang.updateLokasiBarang');

    // export peminjanam
    Route::get('/export', [PeminjamanController::class, 'export'])->name('export'); 
});

require __DIR__.'/auth.php';