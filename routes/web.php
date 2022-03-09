<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
// use App\Http\Controllers\PenyelarasController;
// use App\Http\Controllers\PengawasController;
use App\Http\Controllers\TambahAduanController;
use App\Http\Controllers\TambahRayuanController;
use App\Http\Controllers\BalasAduanController;
use App\Http\Controllers\BalasRayuanController;
use App\Http\Controllers\PermohananController;
use App\Http\Controllers\JadualController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MohonPenilaianController;
use App\Http\Controllers\BanksoalanpengetahuanController;
use App\Http\Controllers\BanksoalankemahiranController;
use App\Http\Controllers\BankjawapanpengetahuanController;
use App\Http\Controllers\BankjawapankemahiranController;
use App\Http\Controllers\BankjawapancalonController;
use App\Http\Controllers\SoalankemahiraninternetController;
use App\Http\Controllers\SoalankemahiranemailController;
use App\Http\Controllers\SoalankemahiranwordController;
use App\Http\Controllers\KemasukanPenilaianController;
use App\Http\Controllers\KeputusanPenilaianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoDanNotaController;
use App\Http\Controllers\SelenggaraKawalanSistemController;
use App\Http\Controllers\NotifikasiEmailController;
use App\Http\Controllers\LamanUtamaController;
use App\Http\Controllers\BanksoalankemahiraninternetController;
use App\Http\Controllers\BanksoalankemahiranwordController;
use App\Http\Controllers\BanksoalankemahiranemailController;
use App\Http\Controllers\KumpulanPenggunaController;
use App\Http\Controllers\MasatamatController;
use App\Http\Controllers\RayuanCalonBlacklistController;
use App\Http\Controllers\PemantauanpenilaianController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/base', function () {
    return view('base');
});
Route::get('/proftem', function () {
    return view('proftem');
});

Route::get('/profil', [ProfilController::class, 'kemaskini']);

Route::get('/kemasukan-id', function () {
    return view('kemasukan_id.index');
});

Route::get('/profil/{id}', [ProfilController::class, 'kemaskiniform']);

Route::post('/profil/{id}/edit', [ProfilController::class, 'kemaskiniprofil']);

Route::resource('/pengurusanpengguna', PenggunaController::class);

// Route::resource('/penyelaraspengguna',PenyelarasController::class);

// Route::resource('/pengawaspengguna',PengawasController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';

Route::resource('/tambahaduans', TambahAduanController::class);

Route::resource('/tambahrayuans', TambahRayuanController::class);

Route::resource('/balasaduans', TambahAduanController::class);

Route::resource('/balasrayuans', TambahRayuanController::class);

Route::resource('/permohanans', PermohananController::class);

Route::resource('/jaduals', JadualController::class);

Route::resource('/mohonpenilaian', MohonPenilaianController::class);

Route::resource('/rayuan_calon_blacklist', RayuanCalonBlacklistController::class);

Route::resource('/bank-soalan-pengetahuan', BanksoalanpengetahuanController::class);
Route::post('/bank-soalan-pengetahuan/fill-in-the-blank', [BanksoalanpengetahuanController::class, 'fillblank']);
Route::post('/bank-soalan-pengetahuan/multiple-choice', [BanksoalanpengetahuanController::class, 'multiplechoice']);
Route::post('/bank-soalan-pengetahuan/ranking', [BanksoalanpengetahuanController::class, 'ranking']);
Route::post('/bank-soalan-pengetahuan/single-choice', [BanksoalanpengetahuanController::class, 'singlechoice']);
Route::post('/bank-soalan-pengetahuan/true-false', [BanksoalanpengetahuanController::class, 'truefalse']);
Route::post('/bank-soalan-pengetahuan/subjective', [BanksoalanpengetahuanController::class, 'subjective']);

// Route::post('/bank-soalan-pengetahuan/{id}/delete', [BanksoalanpengetahuanController::class, 'destroy']);

Route::resource('/bank-soalan-kemahiran', BanksoalankemahiranController::class);
// Route::resource('/bank-soalan-kemahiran', BanksoalankemahiranController::class)->only(['show']);
Route::get('/{soalan}/internet', [BanksoalankemahiraninternetController::class, 'createsoalankemahiraninternet']);
Route::post('/{soalan}/internet/save', [BanksoalankemahiraninternetController::class, 'soalankemahiraninternetsave']);
Route::get('/{soalan}/internet/{internet}', [BanksoalankemahiraninternetController::class, 'editsoalankemahiraninternet']);
Route::post('/{soalan}/internet/{internet}/save', [BanksoalankemahiraninternetController::class, 'updatesoalankemahiraninternetsave']);
Route::post('/{soalan}/internet/{internet}/delete', [BanksoalankemahiraninternetController::class, 'deletesoalankemahiraninternet']);

Route::get('/{soalan}/pemprosesan-perkataan', [BanksoalankemahiranwordController::class, 'soalankemahiranwordcreate']);
Route::post('/{soalan}/pemprosesan-perkataan/save', [BanksoalankemahiranwordController::class, 'soalankemahiranwordsave']);
Route::get('/{soalan}/pemprosesan-perkataan/{word}', [BanksoalankemahiranwordController::class, 'soalankemahiranwordedit']);
Route::post('/{soalan}/pemprosesan-perkataan/{word}/save', [BanksoalankemahiranwordController::class, 'soalankemahiranwordeditsave']);
Route::post('/{soalan}/pemprosesan-perkataan/{word}/delete', [BanksoalankemahiranwordController::class, 'soalankemahiranworddelete']);

Route::get('/{soalan}/emel', [BanksoalankemahiranemailController::class, 'soalankemahiranemailcreate']);
Route::post('/{soalan}/emel/save', [BanksoalankemahiranemailController::class, 'soalankemahiranemailsave']);
Route::get('/{soalan}/emel/{emel}', [BanksoalankemahiranemailController::class, 'soalankemahiranemailedit']);
Route::post('/{soalan}/emel/{emel}/save', [BanksoalankemahiranemailController::class, 'soalankemahiranemaileditsave']);
Route::post('/{soalan}/emel/{emel}/delete', [BanksoalankemahiranemailController::class, 'soalankemahiranemaildelete']);

Route::get('/soalan-kemahiran-internet/{id_penilaian}', [SoalankemahiraninternetController::class, 'index']);
Route::get('/soalan-kemahiran-internet/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'page1']);
Route::post('/soalan-kemahiran-internet-page1/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'savepage1']);
// Route::post('/soalan-kemahiran-internet/{soalan}/page2', [SoalankemahiraninternetController::class, 'page2']);
Route::post('/soalan-kemahiran-internet-page3/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'savepage2']);
Route::post('/soalan-kemahiran-internet-page4/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'page3']);
Route::post('/soalan-kemahiran-internet-page5/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'page4']);
Route::post('/soalan-kemahiran-internet-page6/{id_penilaian}/{soalan}', [SoalankemahiraninternetController::class, 'page5']);

Route::get('/soalan-kemahiran-word', function () {
    return view('proses_penilaian.soalan_kemahiran.mic_word2');
});
Route::get('/soalan-kemahiran-word/{id_penilaian}', [SoalankemahiranwordController::class, 'index']);
Route::get('/soalan-kemahiran-word/{id_penilaian}/{id_soalan_word}', [SoalankemahiranwordController::class, 'show']);
Route::post('/soalan-kemahiran-word/{id_penilaian}/{id_soalan_word}/save', [SoalankemahiranwordController::class, 'store']);
Route::get('/soalan-kemahiran-word-page2/{id_penilaian}', [SoalankemahiranwordController::class, 'test']);

Route::get('/soalan-kemahiran-email/{id_penilaian}', [SoalankemahiranemailController::class, 'index']);
Route::get('/soalan-kemahiran-email/{id_penilaian}/{id_soalan_email}', [SoalankemahiranemailController::class, 'show']);
Route::post('/soalan-kemahiran-email/{id_penilaian}/{soalan}/save', [SoalankemahiranemailController::class, 'savepage1']);
Route::get('/soalan-kemahiran-email-page2/{id_penilaian}', [SoalankemahiranemailController::class, 'test']);
// Route::get('/soalan-kemahiran-email', function () {
//     return view('proses_penilaian.soalan_kemahiran.email2');
// });

Route::resource('/keputusan_penilaian', KeputusanPenilaianController::class);
Route::resource('/semak_jawapan', BankjawapanpengetahuanController::class);

Route::resource('/videodannota', VideoDanNotaController::class);
Route::resource('/selenggara_kawalan_sistem', SelenggaraKawalanSistemController::class);
Route::resource('/notifikasi_email', NotifikasiEmailController::class);
Route::resource('/laman_utama', LamanUtamaController::class);
Route::resource('/kebenaran_pengguna', KumpulanPenggunaController::class);
Route::get('/kebenaran_pengguna/{id_kumpulan}/{menu_id}', [KumpulanPenggunaController::class, 'edit_menu']);
Route::post('/kebenaran_pengguna/kemaskini/{id_kumpulan}/{menu_id}', [KumpulanPenggunaController::class, 'update_kebenaran']);

Route::get('/tamat-penilaian', function () {
    return view('proses_penilaian.tamat_penilaian');
});
Route::get('/tamat-penilaian/{id_penilaian}', [KeputusanPenilaianController::class, 'markah_semua']);
// Route::post('/tamat-penilaian', [SoalankemahiranemailController::class, 'kira_jumlah_markah_kemahiran']);

Route::get('/papar-keputusan', function () {
    return view('proses_penilaian.keputusan_penilaian');
});
Route::get('/penilaian_tamat/{ic}/{id_penilaian}', [MasatamatController::class, 'display_tamat_penilaian']);
Route::post('/masa_tamat/{ic}/{id_penilaian}', [MasatamatController::class, 'kira_markah']);
// Route::get('/masa_tamat', function () {
//     return view('kemasukan_id.masa_tamat');
// });

// Route::get('change-password', 'ChangePasswordController@index');

// Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

Route::resource('/change-password', ChangePasswordController::class);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// require __DIR__ . '/auth.php';

// custom action najhan
Route::post('/jadual/kemaskini_status/{id}', [JadualController::class, 'kemaskini_status']);
Route::post('/mohonpenilaian/penyelaras/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual']);
Route::post('/mohonpenilaian/penyelaras/pilih_calon', [MohonPenilaianController::class, 'pilih_calon']);
Route::post('/mohonpenilaian/calon/kemaskini_maklumat_calon', [MohonPenilaianController::class, 'kemaskini_maklumat_calon']);
Route::post('/mohonpenilaian/calon/pilih_jadual', [MohonPenilaianController::class, 'pilih_jadual_calon']);
Route::post('/mohonpenilaian/penjadualan_semula', [MohonPenilaianController::class, 'penjadualan_semula']);
Route::post('/mohonpenilaian/permohonan_penilaian', [MohonPenilaianController::class, 'jadual_dashboard']);
Route::post('/mohonpenilaian/daftar_permohonan_calon', [MohonPenilaianController::class, 'daftar_permohonan_calon']);

Route::post('/kemasukan_id/check_id', [KemasukanPenilaianController::class, 'kemasukan_id']);
Route::get('/kemasukan_penilaian/{id_penilaian}/{soalan}', [KemasukanPenilaianController::class, 'kemasukan_penilaian']);
Route::post('/penilaian/{id_penilaian}', [KemasukanPenilaianController::class, 'penilaian']);
Route::post('/kemasukan_penilaian/{id_penilaian}/jawapan_calon', [BankjawapanpengetahuanController::class, 'jawapan_calon']);

Route::get('/pengurusan_penilaian/pemilihan_soalan_pengetahuan', [BanksoalanpengetahuanController::class, 'pemilihan']);
Route::get('/pengurusan_penilaian/pemilihan_soalan_pengetahuan/{id}', [BanksoalanpengetahuanController::class, 'kemaskini']);
Route::post('/kemaskini_pemilihan_soalan/{id}', [BanksoalanpengetahuanController::class, 'simpan']);
Route::post('/pengurusan_penilaian/pemilihan_soalan_pengetahuan/tambah_kategori_pemilihan', [BanksoalanpengetahuanController::class, 'tambah_kategori_pemilihan']);

Route::get('/cetak_surat/{id}', [MohonPenilaianController::class, 'cetak_surat']);
Route::get('/slip_keputusan/{ic}/{id_penilaian}', [KeputusanPenilaianController::class, 'slip_keputusan']);
Route::get('/sijil_penilaian/{ic}/{id_penilaian}', [KeputusanPenilaianController::class, 'sijil_isac']);
Route::get('/semak_keputusan/{ic}/{id_penilaian}', [KeputusanPenilaianController::class, 'semak_keputusan']);
Route::get('/senarai_penilaian/{ic}', [BankjawapanpengetahuanController::class, 'senarai_penilaian']);
Route::get('/semak_jawapan/{ic}/{id}', [BankjawapanpengetahuanController::class, 'check_jawapan']);

Route::get('/senarai_sijil', [KeputusanPenilaianController::class, 'senarai_sijil']);
Route::get('/semakan_keputusan_calon', [KeputusanPenilaianController::class, 'senarai_penilaian_calon']);

Route::resource('/pemantauan-penilaian', PemantauanpenilaianController::class);
Route::get('/pemantauan-kamera', [PemantauanpenilaianController::class, 'terima_data']);
Route::post('/set_semula_senarai', [PemantauanpenilaianController::class, 'set_semula']);

Route::post('/notifikasi_email/penyelia', [NotifikasiEmailController::class, 'penyelia']);

//laporan
Route::get('/laporan/penilaian-isac-mengikut-kementerian', [LaporanController::class, 'laporan_penilaian_isac_mengikut_kementerian']);
Route::get('/laporan/senarai-keputusan-penilaian', [LaporanController::class, 'senarai_keputusan_penilaian']);
Route::get('/laporan/statistik-penilaian-mengikut-klasifikasi-gred-jawatan', [LaporanController::class, 'statistik_penilaian_gred_jawatan']);
Route::get('/laporan/statistik-keseluruhan', [LaporanController::class, 'statistik_keseluruhan']);
Route::get('/laporan/statistik-keseluruhan-pencapaian-penilaian-isac-mengikut-bulan', [LaporanController::class, 'statistik_keseluruhan_pencapaian_penilaian_isac_ikut_bulan']);
Route::get('/laporan/statistik-isac-mengikut-kategori-calon', [LaporanController::class, 'statistik_isac_kategori_calon']);
Route::get('/laporan/keseluruhan-penilaian-isac-mengikut-iac', [LaporanController::class, 'keseluruhan_penilaian_isac_iac']);
Route::get('/laporan/aduan', [LaporanController::class, 'laporan_aduan']);
Route::get('/laporan/rayuan', [LaporanController::class, 'laporan_rayuan']);

Route::get('/test_webcam', function () {
    return view('test_webcam');
});

// Route::redirect('/','login');