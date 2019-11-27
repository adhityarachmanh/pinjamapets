<?php
use Illuminate\Http\Request;
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
use App\Barang;

Route::get('/', function () {
    
    $barangs=Barang::orderBy('created_at','DESC')->paginate(10);
    
    return view('welcome')
    ->withBarangs($barangs);
});

Auth::routes();
Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallbackFacebook');
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
Route::get('login/instagram', 'Auth\LoginController@redirectToProviderInstagram');
Route::get('login/instagram/callback', 'Auth\LoginController@handleProviderCallbackInstagram');
Route::resource('barang','BarangController');
 Route::any('/user-pesan/ajax-inbox/sekarang','User\PesanController@ajaxPesanInboxUser');
 Route::any('/chat-pesan/ajax-inbox/sekarang','User\PesanController@ajaLiveChat');
     
Route::get('/g/{status}/{slug}','BarangController@slug')->name('slug.converter');
Route::get('/formsewa/barang/{slug}/{sewa}','SewaController@symSlug')->name('sewa.symslug');

Route::resource('sewa','SewaController');
Route::resource('/profil/user','User\UserController');
Route::resource('pesan','User\PesanController');
Route::get('/pesan_/terkirim','User\PesanController@indexSent')->name('pesan.sent');
Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::resource('/manage-sewa', 'Admin\AdminSewaController');
  Route::get('/manage-sewa/status/{status}', 'Admin\AdminSewaController@indexSewa')->name('manage-sewa.status');
  Route::resource('/manage-kategori', 'Admin\AdminKategoriController');
  Route::resource('/manage-barang', 'Admin\AdminBarangController');
  Route::get('/manage-barang/stock-habis/list', 'Admin\AdminBarangController@stockHabis')->name('manage-barang.stock-habis');
  Route::any('/manage-carisewa','Admin\AdminSewaController@carisewa');
  Route::any('/manage-pencarian-sewa/{slug}','Admin\AdminSewaController@sucPencarian');
  Route::resource('/manage-pesan', 'Admin\AdminPesanController');
  Route::any('/manage-pesan/cariuser/sekarang', 'Admin\AdminPesanController@cariUser');
  Route::any('/manage-pesan/ajax-inbox/sekarang', 'Admin\AdminPesanController@ajaxInbox');
  Route::any('/manage-pesan/chat-live/sekarang', 'Admin\AdminPesanController@ajaxPesanShow');
  Route::any('/manage-pesan/keluar', 'Admin\AdminPesanController@indexKeluar')->name('manage-pesan.keluar');
  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::any('/countdown','SewaController@jangkaUploadStruk')->name('countdown.tester');
Route::any('/usercountdown/user','User\UserController@waktuOnline')->name('countdown.userlogin');